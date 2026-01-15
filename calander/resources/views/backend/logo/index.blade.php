@extends('backend.layout.app')
@section('content')
    <style>
        /* *, *::before, *::after { box-sizing: border-box; }
                                            :root { color-scheme: light; }

                                            body {
                                                font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
                                                background: #f7f7fb;
                                                color: #111827;
                                                margin: 0;
                                                padding: 24px;
                                            } */
    </style>



    <div class="container">
        <h1>Settings</h1>

        @if (session('success'))
            <div class="msg msg-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="msg msg-error">Please fix the errors and try again.</div>
        @endif

        @php
            $settings = $settings ?? [];
            $sliders = $sliders ?? [];

            $get = function (string $key, string $fallback = '') use ($settings) {
                return old($key, $settings[$key] ?? $fallback);
            };
            // `imageUrls` and `sliderInitialUrls` are prepared by the controller.
            $imageUrls = $imageUrls ?? [];
            $sliderInitialUrls = $sliderInitialUrls ?? [];
        @endphp

        <form action="{{ route('admin.events.logo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid">
                <div class="section">
                    <div class="section-title">Basic Info</div>

                    <div class="field">
                        <label for="site_name">Name</label>
                        <input id="site_name" type="text" name="site_name" value="{{ $get('site_name') }}"
                            placeholder="Website / Company name">
                        @error('site_name')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="contact_phone">Contact Phone</label>
                        <input id="contact_phone" type="text" name="contact_phone" value="{{ $get('contact_phone') }}"
                            placeholder="Phone number">
                        @error('contact_phone')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="contact_email">Contact Email</label>
                        <input id="contact_email" type="email" name="contact_email" value="{{ $get('contact_email') }}"
                            placeholder="Email address">
                        @error('contact_email')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="contact_address">Contact Address</label>
                        <input id="contact_address" type="text" name="contact_address"
                            value="{{ $get('contact_address') }}" placeholder="Address">
                        @error('contact_address')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="section">
                    <div class="section-title">Logo</div>

                    <div class="field">
                        <label for="logo_color">Logo Color</label>
                        <input id="logo_color" type="color" name="logo_color"
                            value="{{ $get('logo_color', '#000000') }}">
                        @error('logo_color')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="logo_color_hex">Logo Color (Hex)</label>
                        <input id="logo_color_hex" type="text" name="logo_color_hex"
                            value="{{ $get('logo_color_hex', $get('logo_color', '#000000')) }}" placeholder="#000000">
                        @error('logo_color_hex')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="field">
                        <label>Logo Image</label>
                        <input type="hidden" name="remove_logo_image" value="0">
                        <div class="dropify" data-initial-url="{{ $imageUrls['logo_image'] ?? '' }}">
                            <input class="dropify-input js-dropify" type="file" name="logo_image" accept="image/*"
                                data-remove-target="remove_logo_image">
                            <div class="dropify-inner">
                                <div class="dropify-preview" aria-hidden="true">
                                    <img alt="" />
                                </div>
                                <div class="dropify-meta">
                                    <div class="dropify-title">Drop an image here or click to upload</div>
                                    <div class="dropify-hint">Allowed: JPG/PNG/WEBP up to 4MB</div>
                                    <div class="dropify-controls">
                                        <button type="button" class="btn-lite js-dropify-browse">Choose file</button>
                                        <button type="button" class="btn-lite btn-danger js-dropify-clear">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('logo_image')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="section" style="margin-top: 16px;">
                <div class="section-title">Ad Sliders</div>

                <div class="actions" style="margin-top: 0; margin-bottom: 12px;">
                    <button type="button" class="btn-lite" id="addSliderBtn">Add Slider</button>
                </div>

                <div class="grid" id="slidersGrid">
                    @php
                        $existingSliderNumbers = [];
                        foreach ($sliders ?? [] as $k => $v) {
                            if (preg_match('/^slider(\d+)$/', (string) $k, $m)) {
                                $existingSliderNumbers[] = (int) $m[1];
                            }
                        }
                        $existingSliderNumbers = array_values(array_unique($existingSliderNumbers));
                        sort($existingSliderNumbers);
                    @endphp

                    @forelse ($existingSliderNumbers as $n)
                        @php $key = 'slider' . $n; @endphp
                        <div class="field js-slider-field" data-slider-number="{{ $n }}">
                            <label>Slider {{ $n }}</label>
                            <input type="hidden" name="remove_{{ $key }}" value="0">
                            <div class="dropify" data-initial-url="{{ $sliderInitialUrls[$key] ?? '' }}">
                                <input class="dropify-input js-dropify" type="file" name="{{ $key }}"
                                    accept="image/*" data-remove-target="remove_{{ $key }}">
                                <div class="dropify-inner">
                                    <div class="dropify-preview" aria-hidden="true"><img alt="" /></div>
                                    <div class="dropify-meta">
                                        <div class="dropify-title">Drop an image here or click to upload</div>
                                        <div class="dropify-hint">Allowed: JPG/PNG/WEBP up to 4MB</div>
                                        <div class="dropify-controls">
                                            <button type="button" class="btn-lite js-dropify-browse">Choose
                                                file</button>
                                            <button type="button"
                                                class="btn-lite btn-danger js-dropify-clear">Remove</button>
                                            <button type="button" class="btn-lite btn-danger js-slider-remove">Remove
                                                field</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error($key)
                                <div class="error-text">{{ $message }}</div>
                            @enderror
                        </div>
                    @empty
                        {{-- No sliders yet. Admin can add using the button. --}}
                    @endforelse
                </div>
            </div>

            <div class="actions">
                <button type="submit">Save Settings</button>
            </div>
        </form>
    </div>
    @push('scripts')
        <script>
            (function() {
                function initDropify(wrapper) {
                    const fileInput = wrapper.querySelector('input[type="file"].js-dropify');
                    if (!fileInput) return;

                    const initialUrl = wrapper.getAttribute('data-initial-url') || '';
                    setPreview(wrapper, initialUrl);

                    const browseBtn = wrapper.querySelector('.js-dropify-browse');
                    const clearBtn = wrapper.querySelector('.js-dropify-clear');
                    const removeTarget = fileInput.getAttribute('data-remove-target');
                    const removeHidden = removeTarget ? document.querySelector('input[name="' + removeTarget + '"]') : null;

                    if (browseBtn) {
                        browseBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            fileInput.click();
                        });
                    }

                    // Click anywhere on the dropify (except controls) to browse
                    wrapper.addEventListener('click', function(e) {
                        if (e.target && e.target.closest && e.target.closest('.dropify-controls')) return;
                        // ignore if clicking an input/label/button
                        if (e.target && (e.target.tagName === 'BUTTON' || e.target.tagName === 'INPUT' || e.target
                                .tagName === 'LABEL')) return;
                        fileInput.click();
                    });

                    if (clearBtn) {
                        clearBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            clearInput(fileInput);
                            setPreview(wrapper, '');
                            if (removeHidden) removeHidden.value = '1';
                        });
                    }

                    fileInput.addEventListener('change', function() {
                        if (removeHidden) removeHidden.value = '0';
                        const file = fileInput.files && fileInput.files[0];
                        if (!file) {
                            setPreview(wrapper, initialUrl);
                            return;
                        }
                        const url = URL.createObjectURL(file);
                        setPreview(wrapper, url);
                    });

                    // Drag & drop
                    ['dragenter', 'dragover'].forEach(function(evt) {
                        wrapper.addEventListener(evt, function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            wrapper.classList.add('is-dragover');
                        });
                    });

                    ['dragleave', 'drop'].forEach(function(evt) {
                        wrapper.addEventListener(evt, function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            wrapper.classList.remove('is-dragover');
                        });
                    });

                    wrapper.addEventListener('drop', function(e) {
                        const dt = e.dataTransfer;
                        if (!dt || !dt.files || !dt.files.length) return;
                        const file = dt.files[0];
                        if (!file.type || !file.type.startsWith('image/')) return;

                        const transfer = new DataTransfer();
                        transfer.items.add(file);
                        fileInput.files = transfer.files;

                        if (removeHidden) removeHidden.value = '0';
                        const url = URL.createObjectURL(file);
                        setPreview(wrapper, url);
                    });
                }

                function setPreview(wrapper, url) {
                    const img = wrapper.querySelector('.dropify-preview img');
                    if (!img) return;
                    if (url) {
                        img.src = url;
                        img.style.display = 'block';
                    } else {
                        img.removeAttribute('src');
                        img.style.display = 'none';
                    }
                }

                function clearInput(fileInput) {
                    try {
                        fileInput.value = '';
                    } catch (e) {}
                }


                // Init all existing dropify widgets
                document.querySelectorAll('.dropify').forEach(function(wrapper) {
                    initDropify(wrapper);
                });

                function getNextSliderNumber() {
                    const numbers = Array.from(document.querySelectorAll('.js-slider-field'))
                        .map(function(el) {
                            return parseInt(el.getAttribute('data-slider-number') || '0', 10);
                        })
                        .filter(function(n) {
                            return !isNaN(n) && n > 0;
                        });
                    const max = numbers.length ? Math.max.apply(null, numbers) : 0;
                    return max + 1;
                }

                function createSliderField(n) {
                    const key = 'slider' + n;
                    const wrapper = document.createElement('div');
                    wrapper.className = 'field js-slider-field';
                    wrapper.setAttribute('data-slider-number', String(n));

                    wrapper.innerHTML = '' +
                        '<label>Slider ' + n + '</label>' +
                        '<input type="hidden" name="remove_' + key + '" value="0">' +
                        '<div class="dropify" data-initial-url="">' +
                        '  <input class="dropify-input js-dropify" type="file" name="' + key +
                        '" accept="image/*" data-remove-target="remove_' + key + '">' +
                        '  <div class="dropify-inner">' +
                        '    <div class="dropify-preview" aria-hidden="true"><img alt="" /></div>' +
                        '    <div class="dropify-meta">' +
                        '      <div class="dropify-title">Drop an image here or click to upload</div>' +
                        '      <div class="dropify-hint">Allowed: JPG/PNG/WEBP up to 4MB</div>' +
                        '      <div class="dropify-controls">' +
                        '        <button type="button" class="btn-lite js-dropify-browse">Choose file</button>' +
                        '        <button type="button" class="btn-lite btn-danger js-dropify-clear">Remove</button>' +
                        '        <button type="button" class="btn-lite btn-danger js-slider-remove">Remove field</button>' +
                        '      </div>' +
                        '    </div>' +
                        '  </div>' +
                        '</div>';

                    const dropify = wrapper.querySelector('.dropify');
                    if (dropify) initDropify(dropify);

                    return wrapper;
                }

                const addBtn = document.getElementById('addSliderBtn');
                const slidersGrid = document.getElementById('slidersGrid');

                if (addBtn && slidersGrid) {
                    addBtn.addEventListener('click', function() {
                        const n = getNextSliderNumber();
                        const field = createSliderField(n);
                        slidersGrid.appendChild(field);
                    });
                }

                // Remove slider field behavior
                document.addEventListener('click', function(e) {
                    const btn = e.target && e.target.closest ? e.target.closest('.js-slider-remove') : null;
                    if (!btn) return;
                    e.preventDefault();
                    e.stopPropagation();

                    const field = btn.closest('.js-slider-field');
                    if (!field) return;

                    // If it maps to a saved key, mark remove_key=1 so DB deletes it
                    const number = parseInt(field.getAttribute('data-slider-number') || '0', 10);
                    const key = 'slider' + number;
                    const removeHidden = field.querySelector('input[name="remove_' + key + '"]');
                    const fileInput = field.querySelector('input[type="file"][name="' + key + '"]');
                    const hasInitial = !!(field.querySelector('.dropify') && field.querySelector('.dropify')
                        .getAttribute('data-initial-url'));
                    const hasSelected = !!(fileInput && fileInput.files && fileInput.files.length);

                    if (hasInitial || hasSelected) {
                        if (removeHidden) removeHidden.value = '1';
                        if (fileInput) clearInput(fileInput);
                        const dropify = field.querySelector('.dropify');
                        if (dropify) setPreview(dropify, '');
                        field.style.display = 'none';
                    } else {
                        field.remove();
                    }
                });

                // Sync logo color picker <-> hex input
                (function syncLogoColor() {
                    const picker = document.getElementById('logo_color');
                    const hex = document.getElementById('logo_color_hex');
                    if (!picker || !hex) return;

                    function normalize(v) {
                        if (!v) return '';
                        v = String(v).trim();
                        if (!v.startsWith('#')) v = '#' + v;
                        if (/^#([0-9a-fA-F]{6})$/.test(v)) return v.toLowerCase();
                        return '';
                    }

                    picker.addEventListener('input', function() {
                        hex.value = picker.value;
                    });

                    hex.addEventListener('input', function() {
                        const n = normalize(hex.value);
                        if (n) picker.value = n;
                    });

                    // initial normalize
                    const initial = normalize(hex.value) || normalize(picker.value) || '#000000';
                    picker.value = initial;
                    hex.value = initial;
                })();
            })();
        </script>
    @endpush
@endsection
