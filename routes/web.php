<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PublicPart\ContactUsController;
use App\Http\Controllers\PublicPart\LecturersController;
use App\Http\Controllers\PublicPart\LocationsController;
use App\Http\Controllers\PublicPart\ProgramsController;
use App\Http\Controllers\PublicPart\Dashboard\PublicUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\Admin\HomeController;
use App\Http\Controllers\PublicPart\HomeController as HomepageController;

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

/**
 *  Auth routes
 */

Route::prefix('auth')->group(function () {
    Route::get ('/',                              [AuthController::class, 'auth'])->name('auth');
    Route::post('/authenticate',                  [AuthController::class, 'authenticate'])->name('auth.authenticate');
    Route::get ('/logout',                        [AuthController::class, 'logout'])->name('auth.logout');

    /* Create an account */
    Route::get ('/create-account',                [AuthController::class, 'createAccount'])->name('auth.create-account');
    Route::post('/save-account',                  [AuthController::class, 'saveAccount'])->name('auth.save-account');

    /* Restart password */
    Route::get ('/restart-password',              [AuthController::class, 'restartPassword'])->name('auth.restart-password');
    Route::post('/generate-restart-token',        [AuthController::class, 'generateRestartToken'])->name('auth.generate-restart-token');
    Route::get ('/new-password/{token}',          [AuthController::class, 'newPassword'])->name('auth.new-password');
    Route::post('/generate-new-password',         [AuthController::class, 'generateNewPassword'])->name('auth.generate-new-password');
});

/**
 *  Public routes
 */
Route::prefix('')->group(function () {
    Route::get ('/',                              [HomepageController::class, 'home'])->name('public-part.home');


    /*
     *  Programs
     */
    Route::prefix('programs')->group(function () {
        Route::get ('/preview',                   [ProgramsController::class, 'preview'])->name('public-part.programs.preview');
    });

    /*
     *  Programs
     */
    Route::prefix('contact-us')->group(function () {
        Route::post('/send-us-a-message',                   [ContactUsController::class, 'sendUsAMessage'])->name('public-part.contact-us.send-us-a-message');
    });

    /*
     * Locations
     */

    Route::prefix('locations')->group(function () {
        Route::get('/',                   [LocationsController::class, 'locations'])->name('public-part.locations.locations');
        Route::get('/{id}',                   [LocationsController::class, 'single_location'])->name('public-part.locations.single-location');
    });

    /*
     *  Lecturers
     */
    Route::prefix('lecturers')->group(function () {
        Route::get('/',                   [LecturersController::class, 'lecturers'])->name('public-part.lecturers.lecturers');
        Route::get('/{id}',                   [LecturersController::class, 'single_lecturer'])->name('public-part.lecturers.single-lecturer');
    });
});

/**
 *  User routes / Public part routes for classic users
 */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get ('/my-profile',                              [PublicUserController::class, 'myProfile'])->name('dashboard.my-profile');
    Route::post('/update-profile',                          [PublicUserController::class, 'updateProfile'])->name('dashboard.update-profile');

    /* Sign out */
    Route::get ('/sign-out',                                [PublicUserController::class, 'signOut'])->name('dashboard.sing-out');
});

/**
 *  Admin routes
 */

Route::prefix('system')->middleware('auth')->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('/dashboard',                 [HomeController::class, 'index'])->name('system.home');
    });
});

//Route::get('/user', [HomeCont::class, 'index']);
