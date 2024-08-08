<?php

use App\Http\Controllers\FightController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);

Route::resource('/dashboard/players', PlayerController::class)->except('show');
Route::resource('/dashboard/fights', FightController::class)->except('show');
