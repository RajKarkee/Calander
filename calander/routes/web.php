<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
