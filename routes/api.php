<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\RealEstateController;
use App\Http\Controllers\Api\RealEstatePropertyController;
use App\Http\Controllers\Api\RequestFormController;
use App\Http\Controllers\Api\ReviewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\RoutePath;

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
Route::post('/user', [UserController::class, 'store'])->name('user.store');

// private routes
// User's API
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/logout', [AuthController::class, 'logout']);

    Route::controller(UserController::class)->group(function () {
        Route::get('/user',                 'index');
        Route::get('/user/{id}',            'show');
        Route::put('/user/{id}',            'update')->name('user.update');
        Route::put('/user/email/{id}',      'email')->name('user.email');
        Route::put('/user/password/{id}',   'password')->name('user.password');
        Route::delete('/user/{id}',         'destroy');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings',             'index')->name('bookings.index');
        Route::get('/bookings/{id}',        'show')->name('bookings.show');
        Route::post('/bookings',            'store')->name('bookings.store');
        Route::put('/bookings/{id}',        'update')->name('bookings.update');
        Route::delete('/bookings/{id}',     'destroy')->name('bookings.destroy');
    });

    Route::controller(RequestFormController::class)->group(function () {
        Route::get('/request_form',               'index')->name('request_form.index');
        Route::post('/request_form',              'store')->name('request_form.store');
        Route::get('/request_form/{id}',          'show')->name('request_form.show');
        Route::put('/request_form/{id}',          'update')->name('request_form.update');
        Route::delete('/request_form/{id}',       'destroy')->name('request_form.destroy');
    });


    Route::post('/reviews', [ReviewsController::class, 'store'])->name('review.store');
    Route::get('/reviews/{id}', [ReviewsController::class, 'show'])->name('review.show');


    //Admin's API
    Route::controller(RealEstatePropertyController::class)->group(function () {
        Route::post('/real-estate-properties', [RealEstatePropertyController::class, 'store'])->name('real_estate_properties.store');
        Route::get('/real-estate-properties/{id}', [RealEstatePropertyController::class, 'show'])->name('real_estate_properties.show');
        Route::put('/real-estate-properties/{id}', [RealEstatePropertyController::class, 'update'])->name('real_estate_properties.update');
        Route::delete('/real-estate-properties/{id}', [RealEstatePropertyController::class, 'destroy'])->name('real_estate_properties.destroy');
    });

    Route::controller(RealEstateController::class)->group(function () {
        Route::post('/real-estates', [RealEstateController::class, 'store'])->name('real_estate.store');
        Route::get('/real-estates/{id}', [RealEstateController::class, 'show'])->name('real_estate.show');
        Route::put('/real-estates/{id}', [RealEstateController::class, 'update'])->name('real_estate.update');
        Route::delete('/real-estates/{id}', [RealEstateController::class, 'destroy'])->name('real_estate.destroy');
    });
});
