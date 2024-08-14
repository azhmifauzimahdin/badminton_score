<?php

use App\Http\Controllers\FightController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SkorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/fights', [HomepageController::class, 'historyFight'])->name('fight.history');
Route::get('/fights/{id}', [HomepageController::class, 'show'])->name('fight.detail');

Route::resource('/dashboard/players', PlayerController::class)->except('show');
Route::resource('/dashboard/fights', FightController::class)->except('show');
Route::resource('/dashboard/skors', SkorController::class)->except('show');
Route::resource('/dashboard/galleries', GalleryController::class)->except('show');
Route::get('/galleries', [GalleryController::class, 'galleries'])->name('gallery');

Route::get('/liveskor/{id}', [HomepageController::class, 'liveSkor'])->name('liveskor');
Route::get('/liveskor', [HomepageController::class, 'liveskorNow'])->name('liveskornow');
