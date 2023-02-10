<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\HomeController;


Route::get('/',[HomeController::class,'__invoke'])->name('users.home');
