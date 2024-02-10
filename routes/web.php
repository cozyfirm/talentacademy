<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\Admin\HomeController;

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
Route::get('/test', function () {
    return view('admin.home');
});

/**
 *  Auth routes
 */

Route::prefix('auth')->group(function () {
    Route::get ('/',                              [AuthController::class, 'auth'])->name('auth');

    /* Create an account */
    Route::get ('/create-account',                [AuthController::class, 'createAccount'])->name('auth.create-account');
    Route::post('/save-account',                  [AuthController::class, 'saveAccount'])->name('auth.save-account');
});

/**
 *  Admin routes
 */

Route::prefix('system')->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard',                 [HomeController::class, 'index'])->name('system.home');
    });
});

//Route::get('/user', [HomeCont::class, 'index']);
