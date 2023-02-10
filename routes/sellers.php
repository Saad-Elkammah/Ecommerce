<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerAuth\PasswordController;
use App\Http\Controllers\SellerAuth\NewPasswordController;
use App\Http\Controllers\SellerAuth\VerifyEmailController;
use App\Http\Controllers\SellerAuth\RegisteredUserController;
use App\Http\Controllers\SellerAuth\PasswordResetLinkController;
use App\Http\Controllers\SellerAuth\ConfirmablePasswordController;
use App\Http\Controllers\SellerAuth\AuthenticatedSessionController;
use App\Http\Controllers\SellerAuth\EmailVerificationPromptController;
use App\Http\Controllers\SellerAuth\EmailVerificationNotificationController;

Route::prefix('sellers')->name('sellers.')->group(function () {
    Route::middleware('guest:seller')->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                    ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
    });

    Route::middleware(['auth:seller'])->group(function () {
        Route::get('home', function () {
            return view('seller');
        })->name('home')->middleware('verified');


        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                    ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                    ->middleware(['signed', 'throttle:6,1'])
                    ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware('throttle:6,1')
                    ->name('verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
    });
});
