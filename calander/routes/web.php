<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;




Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'np'])) {
        abort(400);
    }
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');

Route::prefix('calendar')->name('calendar.')->group(function () {
    Route::get('/{year?}/{month?}', [CalendarController::class, 'index'])->name('index')
    ->where(['year' => '\d{4}', 'month' => '0?[1-9]|1[0-2]']);
    Route::get('/data/{year}/{month}', [CalendarController::class, 'getCalendarData'])->name('data');
    Route::get('/days/{bsDate}', [CalendarController::class, 'getDayDetails'])->name('day.details');
});

Route::prefix('news')->name('news.')->group(function () {
    Route::get('/{id}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'adminLoginForm'])->name('login.form');
        Route::post('/login/submit', [AdminAuthController::class, 'adminLoginSubmit'])->name('login.submit');
    });
});

Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::match(['get', 'post'], '/', [CalendarController::class, 'adminIndex'])->name('index');
    Route::get('/stats/{year}', [CalendarController::class, 'getStatsByYear'])->name('stats.by.year');
    Route::get('/load-event', [CalendarController::class, 'loadEvents'])->name('load.events');
    Route::post('/logout', [AdminAuthController::class, 'adminLogout'])->name('logout');
    Route::match(['get', 'post'], '/add-month-data/{month}', [CalendarController::class, 'addMonthData'])->name('month.data.edit');
    Route::get('/months-data/{year}', [CalendarController::class, 'getMonthsDataByYear'])->name('months.data.by.year');
    Route::get('/api/month-data/{month}', [CalendarController::class, 'showMonthData'])->name('month.data.show');

    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/logo', [SettingController::class, 'index'])->name('logo');
        Route::post('/logo', [SettingController::class, 'store'])->name('logo.store');
    });

    Route::prefix('announcements')->name('announcements.')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('index');
        Route::post('/', [AnnouncementController::class, 'store'])->name('store');
        Route::put('/{announcement}', [AnnouncementController::class, 'update'])->name('update');
        Route::delete('/{announcement}', [AnnouncementController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::post('/', [NewsController::class, 'store'])->name('store');
        Route::put('/{news}', [NewsController::class, 'update'])->name('update');
        Route::delete('/{news}', [NewsController::class, 'destroy'])->name('destroy');
        Route::post('/fetch-api', [NewsController::class, 'fetchFromApi'])->name('fetch-api');
    });
});

