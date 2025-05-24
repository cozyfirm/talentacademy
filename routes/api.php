<?php

use App\Http\Controllers\API\Auth\AuthController;
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
Route::prefix('user')->group(function () {
    Route::post('/',                         [AuthController::class, 'auth'])->name('api.auth');
});
