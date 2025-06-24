<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Common\CountriesController;
use App\Http\Controllers\API\Common\PagesController;
use App\Http\Controllers\API\PublicPart\AttendeesController;
use App\Http\Controllers\API\PublicPart\BlogController;
use App\Http\Controllers\API\PublicPart\LocationsController;
use App\Http\Controllers\API\PublicPart\PresentersController;
use App\Http\Controllers\API\Schedule\SchedulerController;
use App\Http\Controllers\API\Users\ChatController;
use App\Http\Controllers\API\Users\InboxController;
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
    Route::post('/fetch-my-info',                      [UsersController::class, 'fetchMyInfo'])->name('api.users.fetch-my-info');

    /** Update basic data */
    Route::post('/update-basic-data',                  [UsersController::class, 'updateBasicData'])->name('api.users.update-basic-data');
    /** Change user password */
    Route::post('/change-password',                    [UsersController::class, 'changePassword'])->name('api.users.change-password');
    /** Upload photo */
    Route::post('/upload-photo',                       [UsersController::class, 'uploadPhoto'])->name('api.users.upload-photo');
    /** Delete profile */
    Route::post('/delete-profile',                     [UsersController::class, 'deleteProfile'])->name('api.users.delete-profile');

    /**
     *  Notifications and messaging system
     */
    Route::prefix('dashboard')->group(function () {
        /** Fetch notifications (inbox messages) */
        Route::prefix('inbox')->group(function () {
            Route::post('/',                                      [InboxController::class, 'fetch'])->name('api.users.dashboard.inbox');
            Route::post('/preview',                               [InboxController::class, 'preview'])->name('api.users.dashboard.inbox.preview');
        });

        /** Conversations */
        Route::prefix('chat')->group(function () {
            Route::post('/',                                      [ChatController::class, 'fetch'])->name('api.users.dashboard.chat');
            Route::post('/preview',                               [ChatController::class, 'preview'])->name('api.users.dashboard.chat.preview');
            Route::post('/send-message',                          [ChatController::class, 'sendMessage'])->name('api.users.dashboard.chat.send-message');

            /** Fetch chat if exists, if not create the new one */
            Route::post('/get-or-create',                         [ChatController::class, 'getOrCreate'])->name('api.users.dashboard.chat.get-or-create');
        });
    });

    /** Notifications centre */
    Route::post('/notifications-info',                            [UsersController::class, 'notificationsInfo'])->name('api.users.notifications-info');
});

/**
 *  Common routes:
 *      1. Fetch countries
 *      2. Pages
 */
Route::prefix('common-routes')->middleware('api-auth')->group(function () {
    /** Countries */
    Route::prefix('countries')->group(function () {
        Route::post('/fetch',                           [CountriesController::class, 'fetch'])->name('api.common-routes.countries.fetch');
        Route::post('/fetch-by-id',                     [CountriesController::class, 'fetchByID'])->name('api.common-routes.countries.fetch-by-id');
    });

    /** Get pages */
    Route::prefix('pages')->middleware('api-auth')->group(function () {
        Route::post('/privacy-policy',                           [PagesController::class, 'privacy'])->name('api.common-routes.pages.privacy');
        Route::post('/terms-and-conditions',                     [PagesController::class, 'terms'])->name('api.common-routes.pages.terms');
        Route::post('/cookies',                                  [PagesController::class, 'cookies'])->name('api.common-routes.pages.cookies');
        Route::post('/important-numbers',                        [PagesController::class, 'importantNumbers'])->name('api.common-routes.pages.important-numbers');
    });
});


/**
 *  Schedule:
 *
 *      1. Fetch schedule
 *      2. Sessions
 */
Route::prefix('schedule')->middleware('api-auth')->group(function () {
    Route::post('/fetch',                               [SchedulerController::class, 'fetch'])->name('api.schedule.fetch');

    /* Fetch sessions */
    Route::prefix('sessions')->middleware('api-auth')->group(function () {
        Route::post('/fetch',                           [SchedulerController::class, 'fetchSession'])->name('api.schedule.sessions.fetch');
    });
});

/**
 *  Public part, which includes:
 *
 *      1. Locations
 *      2. Blog
 *      3. Presenters
 */
Route::prefix('public-part')->middleware('api-auth')->group(function () {
    /** Locations */
    Route::prefix('locations')->middleware('api-auth')->group(function () {
        Route::post('/',                                [LocationsController::class, 'fetch'])->name('api.public-part.locations');
        /** Preview single location */
        Route::post('/preview',                         [LocationsController::class, 'preview'])->name('api.public-part.locations.preview');
    });

    Route::prefix('blog')->middleware('api-auth')->group(function () {
        Route::post('/',                                [BlogController::class, 'fetch'])->name('api.public-part.blog');
        /** Preview single post */
        Route::post('/preview',                         [BlogController::class, 'preview'])->name('api.public-part.blog.preview');
    });

    /**
     *  Presenters && Attendees
     */

    Route::prefix('presenters')->middleware('api-auth')->group(function () {
        Route::post('/',                                [PresentersController::class, 'fetch'])->name('api.public-part.presenters');
        /** Preview single lecturer */
        Route::post('/preview',                         [PresentersController::class, 'preview'])->name('api.public-part.presenters.preview');
    });
    Route::prefix('attendees')->middleware('api-auth')->group(function () {
        Route::post('/',                                [AttendeesController::class, 'fetch'])->name('api.public-part.attendees');
        /** Preview single lecturer */
        Route::post('/preview',                         [AttendeesController::class, 'preview'])->name('api.public-part.attendees.preview');
    });
});
