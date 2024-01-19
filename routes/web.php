<?php

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
 *  Admin routes
 */

Route::prefix('system')->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard',                 [HomeController::class, 'index'])->name('system.home');
    });
});

//Route::get('/user', [HomeCont::class, 'index']);
