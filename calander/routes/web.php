<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::match(['get','post'], '/admin', [CalendarController::class, 'adminIndex'])->name('calendar.admin.index');
Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/admin/load-event', [CalendarController::class, 'loadEvents'])->name('calendar.admin.loadEvents');
Route::match(['get','post'], '/admin/add-month-data/{month}', [CalendarController::class, 'addMonthData'])->name('add.month.data');
Route::get('/admin/api/show-month-data/{month}', [CalendarController::class, 'showMonthData'])->name('show.month.data.api');
Route::get('/calendar/data/{year}/{month}', [CalendarController::class, 'getCalendarData'])->name('calendar.data');
