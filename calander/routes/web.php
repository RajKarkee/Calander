<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::match(['get','post'], '/admin', [CalendarController::class, 'adminIndex'])->name('calendar.admin.index');
Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/admin/load-event', [CalendarController::class, 'loadEvents'])->name('calendar.admin.loadEvents');
