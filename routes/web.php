<?php

use App\Http\Controllers\FightController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SkorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('homepage');
Route::get('/fights', [HomepageController::class, 'historyFight'])->name('fight.history');
Route::get('/fights/{id}', [HomepageController::class, 'show'])->name('fight.detail');

Route::get('/liveskor/{id}', [HomepageController::class, 'liveSkor'])->name('liveskor');
Route::get('/liveskor', [HomepageController::class, 'liveskorNow'])->name('liveskornow');

Route::resource('/dashboard/players', PlayerController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/fights', FightController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/skors', SkorController::class)->except('show')->middleware('auth');
Route::resource('/dashboard/galleries', GalleryController::class)->except('show')->middleware('auth');
Route::get('/galleries', [GalleryController::class, 'galleries'])->name('gallery')->middleware('auth');

Route::controller(LoginController::class)->group(function () {
  Route::get('/login', 'index')->name('login.index')->middleware('guest');
  Route::post('/login', 'authenticate')->name('login.authenticate')->middleware('guest');
  Route::post('/logout', 'logout')->name('logout');
});

Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('/forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('password.reset.post');
