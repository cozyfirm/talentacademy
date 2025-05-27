<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Common\CountriesController;
use App\Http\Controllers\API\Users\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 *  Authentication routes:
 *      1. Auth
 *      2. Register
 */
Route::prefix('auth')->group(function () {
    Route::post('/',                         [AuthController::class, 'auth'])->name('api.auth');
});

/**
 *  User routes:
 *      1. Fetch user info
 *      2. Update user profile
 */
Route::prefix('users')->middleware('api-auth')->group(function () {
    Route::post('/fetch-info',                         [UsersController::class, 'fetchInfo'])->name('api.users.fetch-info');

    /** Update basic data */
    Route::post('/update-basic-data',                  [UsersController::class, 'updateBasicData'])->name('api.users.update-basic-data');

    /** Change user password */
    Route::post('/change-password',                    [UsersController::class, 'changePassword'])->name('api.users.change-password');

    /** Upload photo */
    Route::post('/upload-photo',                       [UsersController::class, 'uploadPhoto'])->name('api.users.upload-photo');
});

/**
 *  Common routes:
 *      1. Fetch countries
 */
Route::prefix('common-routes')->middleware('api-auth')->group(function () {
    /** Countries */
    Route::prefix('countries')->group(function () {
        Route::post('/fetch',                           [CountriesController::class, 'fetch'])->name('api.common-routes.countries.fetch');
        Route::post('/fetch-by-id',                     [CountriesController::class, 'fetchByID'])->name('api.common-routes.countries.fetch-by-id');
    });
});
