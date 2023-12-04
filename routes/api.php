<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\RequestFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// public routes

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UserController::class, 'store'])->name('user.store');;

// private routes

Route::middleware(['auth:sanctum'])->group(function () {

    // logout
    Route::get('/logout', [AuthController::class, 'logout']);
    // users route
    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::delete('/user/{id}',         'destroy');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings',             'index');
        Route::get('/bookings/{id}',        'show');
        Route::post('/bookings',            'store');
        Route::put('/bookings/{id}',        'update');
        Route::delete('/bookings/{id}',     'destroy');
    });

    Route::controller(RequestFormController::class)->group(function () {
        Route::get('/request_form',               'index')->name('request_form.index');
        Route::post('/request_form',              'store')->name('request_form.store');
        Route::get('/request_form/{id}',          'show')->name('request_form.show');
        Route::put('/request_form/{id}',          'update')->name('request_form.update');
        Route::delete('/request_form/{id}',       'destroy')->name('request_form.destroy');
    });
});
