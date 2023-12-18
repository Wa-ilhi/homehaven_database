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


// Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('login.google');
// Route::get('auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
// Route::get('logout', [GoogleAuthController::class, 'logout']);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
