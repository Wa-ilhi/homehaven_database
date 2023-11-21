<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GoogleAuthController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
Route::get('logout', [GoogleAuthController::class, 'logout']);
