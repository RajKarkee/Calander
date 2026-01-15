<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;
class SettingController extends Controller
{
    public function __construct()
    {
        // no-op constructor — ImageManager and GD removed per requirements
    }

    /* ===============================
     * SHOW SETTINGS PAGE
     * =============================== */
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        $sliders = array_filter(
            $settings,
            fn ($v, $k) => preg_match('/^slider\d+$/', $k),
            ARRAY_FILTER_USE_BOTH
        );

        uksort($sliders, fn ($a, $b) =>
            (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT)
            <=>
            (int) filter_var($b, FILTER_SANITIZE_NUMBER_INT)
        );

        // Build public URLs for any stored images so the view can render previews.
        $disk = \Illuminate\Support\Facades\Storage::disk('public');
        $base = request()->getSchemeAndHttpHost();
        $imageUrls = [];
        foreach ($settings as $k => $v) {
            if (!$v) {
                $imageUrls[$k] = '';
                continue;
            }
            $publicPath = ltrim($v, '/');
            // Build URL using the current request host so previews work when accessing by IP
            $imageUrls[$k] = $base . '/storage/' . $publicPath;
        }

        $sliderInitialUrls = [];
        foreach ($sliders as $k => $v) {
            if (!$v) {
                $sliderInitialUrls[$k] = '';
                continue;
            }
            $publicPath = ltrim($v, '/');
            $sliderInitialUrls[$k] = $base . '/storage/' . $publicPath;
        }

        return view('backend.logo.index', compact('settings', 'sliders', 'imageUrls', 'sliderInitialUrls'));
    }

    /* ===============================
     * SAVE SETTINGS
     * =============================== */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_email' => 'nullable|email|max:255',
            'contact_address' => 'nullable|string|max:255',

            'logo_color' => 'nullable|regex:/^#([0-9a-fA-F]{6})$/',
            'logo_color_hex' => 'nullable|regex:/^#([0-9a-fA-F]{6})$/',

            'logo_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'remove_logo_image' => 'nullable|boolean',
        ]);

        foreach (['site_name', 'contact_phone', 'contact_email', 'contact_address'] as $key) {
            Setting::setValue($key, $validated[$key] ?? null);
        }

        $color = $validated['logo_color'] ?? $validated['logo_color_hex'] ?? null;
        Setting::setValue('logo_color', $color);
        Setting::setValue('logo_color_hex', $color);

        // Invalidate caches first, we'll repopulate after changes.
        Cache::forget('settings');
        Cache::forget('sliders');

        try {
            $this->handleLogo($request);
            $this->handleSliders($request);

            // Rebuild caches for quick access elsewhere in the app
            $settingsArr = Setting::pluck('value', 'key')->toArray();
            Cache::put('settings', $settingsArr);

            $sliders = array_filter(
                $settingsArr,
                fn ($v, $k) => preg_match('/^slider\d+$/', $k),
                ARRAY_FILTER_USE_BOTH
            );
            uksort($sliders, fn ($a, $b) =>
                (int) filter_var($a, FILTER_SANITIZE_NUMBER_INT)
                <=>
                (int) filter_var($b, FILTER_SANITIZE_NUMBER_INT)
            );
            Cache::put('sliders', $sliders);
        } catch (\RuntimeException $e) {
            return redirect()
                ->route('admin.events.logo')
                ->withErrors(['image' => $e->getMessage()])
                ->withInput();
        }

        return redirect()
            ->route('admin.events.logo')
            ->with('success', 'Settings saved successfully');
    }

    /* ===============================
     * LOGO HANDLER
     * =============================== */
    private function handleLogo(Request $request): void
    {
        $key = 'logo_image';
        $existing = Setting::getValue($key);

        if ($request->boolean('remove_logo_image')) {
            if ($existing) Storage::disk('public')->delete($existing);
            Setting::setValue($key, null);
            Cache::forget('settings');
            return;
        }

        if (!$request->hasFile($key)) return;

        if ($existing) Storage::disk('public')->delete($existing);

        $path = $this->processImage($request->file($key));

        Setting::setValue($key, $path);
        // cache will be rebuilt by caller
    }

    /* ===============================
     * SLIDER HANDLER
     * =============================== */
    private function handleSliders(Request $request): void
    {
        $allSettings = Setting::pluck('value', 'key')->toArray();
        $keys = [];

        foreach (array_merge(array_keys($request->all()), array_keys($request->allFiles())) as $key) {
            if (preg_match('/^(remove_)?slider\d+$/', $key)) {
                $keys[] = str_replace('remove_', '', $key);
            }
        }

        $keys = array_unique($keys);

        $rules = [];
        foreach ($keys as $key) {
            $rules[$key] = 'nullable|image|mimes:jpg,jpeg,png|max:4096';
            $rules['remove_' . $key] = 'nullable|boolean';
        }

        Validator::make($request->all(), $rules)->validate();

        foreach ($keys as $key) {
            $existing = $allSettings[$key] ?? null;

            if ($request->boolean('remove_' . $key)) {
                if ($existing) Storage::disk('public')->delete($existing);
                Setting::deleteKey($key);
                continue;
            }

            if (!$request->hasFile($key)) continue;

            if ($existing) Storage::disk('public')->delete($existing);

            $path = $this->processImage($request->file($key));

            Setting::setValue($key, $path);
        }

        $this->compactSliders();
        // cache will be rebuilt by caller
    }

    /* ===============================
     * DEPLOYMENT-SAFE IMAGE HANDLER
     * (GD only | PNG fallback if JPEG not supported)
     * =============================== */
    private function processImage($file): string
    {
        // Simplified: store uploaded file as-is under `settings/` on the public disk.
        // This removes the need for Intervention/Image and GD extensions.
        if (!$file || !$file->isValid()) {
            throw new \RuntimeException('Uploaded file is invalid');
        }

        $ext = $file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg';
        $filename = uniqid('s_') . '.' . $ext;
        $path = 'settings/' . $filename;

        // Store file in public disk
        Storage::disk('public')->putFileAs('settings', $file, $filename);

        return $path;
    }

    /* ===============================
     * COMPACT SLIDERS (slider1..N)
     * =============================== */
    private function compactSliders(): void
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $sliders = [];

        foreach ($settings as $key => $value) {
            if (preg_match('/^slider(\d+)$/', $key, $m)) {
                $sliders[(int) $m[1]] = $value;
            }
        }

        ksort($sliders);

        foreach ($settings as $key => $_) {
            if (preg_match('/^slider\d+$/', $key)) {
                Setting::deleteKey($key);
            }
        }

        $i = 1;
        foreach ($sliders as $path) {
            if ($path) {
                Setting::setValue('slider' . $i, $path);
                $i++;
            }
        }
    }
}
