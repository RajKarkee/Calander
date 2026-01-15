<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;

//language ko lagi

Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale,['en','np'])) {
        abort(400);
    }
    session()->put('locale',$locale);
    return redirect()->back();
})->name('lang.switch');

Route::get('/admin/login', [AdminAuthController::class, 'adminLoginForm'])->name('calendar.admin.login.form');
Route::post('/admin/login/submit', [AdminAuthController::class, 'adminLoginSubmit'])->name('admin.login.submit');

// Protected admin routes
Route::middleware(['admin'])->name('admin.')->group(function () {
    Route::match(['get','post'], '/admin', [CalendarController::class, 'adminIndex'])->name('index');
    Route::get('/admin/load-event', [CalendarController::class, 'loadEvents'])->name('loadEvents');
    Route::match(['get','post'], '/admin/add-month-data/{month}', [CalendarController::class, 'addMonthData'])->name('add.month.data');
    Route::get('/admin/api/show-month-data/{month}', [CalendarController::class, 'showMonthData'])->name('show.month.data.api');
    Route::get('/events/logo', [SettingController::class, 'index'])->name('events.logo');
    Route::post('/events/logo', [SettingController::class, 'store'])->name('events.logo.store');
    Route::get('/admin/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::put('/admin/announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('/admin/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
});

Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/data/{year}/{month}', [CalendarController::class, 'getCalendarData'])->name('calendar.data');
Route::get('/calendar/days/{bsDate}', [CalendarController::class, 'getDayDetails'])->name('calendar.day.details');

