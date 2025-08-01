<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PublicPart\Archive\ArchiveController;
use App\Http\Controllers\PublicPart\Archive\ArchiveLecturersController;
use App\Http\Controllers\PublicPart\BlogController;
use App\Http\Controllers\PublicPart\ContactUsController;
use App\Http\Controllers\PublicPart\Dashboard\ChatController;
use App\Http\Controllers\PublicPart\Dashboard\PublicUserController;
use App\Http\Controllers\PublicPart\HomeController as HomepageController;
use App\Http\Controllers\PublicPart\LecturersController;
use App\Http\Controllers\PublicPart\LocationsController;
use App\Http\Controllers\PublicPart\ProgramsController;
use App\Http\Controllers\System\Admin\Archive\GalleryController as ArchiveGalleryController;
use App\Http\Controllers\System\Admin\HomeController;
use App\Http\Controllers\System\Admin\Other\BlogController as AdminBlogController;
use App\Http\Controllers\System\Admin\Other\Chat\GroupChatsController;
use App\Http\Controllers\System\Admin\Other\Inbox\BulkMessagesController;
use App\Http\Controllers\System\Admin\Other\LocationsController as AdminLocationsController;
use App\Http\Controllers\System\Admin\Other\OtherController;
use App\Http\Controllers\System\Admin\Programs\ProgramsController as AdminProgramsController;
use App\Http\Controllers\System\Admin\Users\UsersController;
use Illuminate\Support\Facades\Route;

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
    Route::get ('/verify-account/{token}',        [AuthController::class, 'verifyAccount'])->name('auth.verify-account');

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
        Route::get ('/preview',                          [ProgramsController::class, 'preview'])->name('public-part.programs.preview');
        Route::get ('/preview-program/{id}',             [ProgramsController::class, 'preview'])->name('public-part.programs.preview-program');
        Route::get ('/preview-program/{id}/{date}',      [ProgramsController::class, 'preview'])->name('public-part.programs.preview-program-date');
        Route::get ('/sneak-and-peek/{id}/{page}',       [ProgramsController::class, 'sneakAndPeak'])->name('public-part.programs.sneak-and-peak');
        Route::get ('/more-about/{id}',                  [ProgramsController::class, 'moreAbout'])->name('public-part.programs.more-about');

        /* Load sessions over AJAX */
        Route::post('/get-ajax-private-sessions',        [ProgramsController::class, 'getAjaxPrivateSessions'])->name('public-part.programs.get-ajax-private-sessions');
        Route::post('/get-ajax-lecturer-sessions',       [ProgramsController::class, 'getAjaxLecturerSessions'])->name('public-part.programs.get-ajax-lecturer-sessions');

        Route::post('/fetch-sessions-data',              [ProgramsController::class, 'fetchSessions'])->name('public-part.programs.fetch-sessions-data');
        Route::get ('/preview-session/{id}',             [ProgramsController::class, 'preview_session'])->name('public-part.programs.preview-session');

        /* Session notes */
        Route::post('/save-session-note',                [ProgramsController::class, 'saveSessionNote'])->name('public-part.programs.save-session-note');
        Route::post('/delete-session-note',              [ProgramsController::class, 'deleteSessionNote'])->name('public-part.programs.delete-session-note');

        /* Apply for scholarship */
        Route::get ('/apply-for-scholarship/{id}',       [ProgramsController::class, 'applyForScholarship'])->name('public-part.programs.apply-for-scholarship');
        Route::post('/update-scholarship',               [ProgramsController::class, 'updateScholarship'])->name('public-part.programs.update-scholarship');

        Route::get ('cancel-scholarship/{program_id}',       [ProgramsController::class, 'cancelScholarship'])->name('public-part.programs.cancel-scholarship');
        Route::get ('submit-for-scholarship/{program_id}',   [ProgramsController::class, 'submitForScholarship'])->name('public-part.programs.submit-for-scholarship');
    });

    /*
     *  Contact US
     */
    Route::prefix('contact-us')->group(function () {
        Route::post('/send-us-a-message',                   [ContactUsController::class, 'sendUsAMessage'])->name('public-part.contact-us.send-us-a-message');

        Route::get ('/remove-my-profile',                   [ContactUsController::class, 'removeMyProfile'])->name('public-part.contact-us.remove-my-profile');
    });

    /*
     * Locations
     */

    Route::prefix('locations')->group(function () {
        Route::get('/',                       [LocationsController::class, 'locations'])->name('public-part.locations.locations');
        Route::get('/{id}',                   [LocationsController::class, 'single_location'])->name('public-part.locations.single-location');
    });

    /*
     *  Lecturers
     */
    Route::prefix('lecturers')->group(function () {
        Route::get ('/',                                 [LecturersController::class, 'lecturers'])->name('public-part.lecturers.lecturers');
        Route::get ('/filter/{program_id}',              [LecturersController::class, 'filter'])->name('public-part.lecturers.filter');
        Route::get ('/preview/{id}',                     [LecturersController::class, 'single_lecturer'])->name('public-part.lecturers.single-lecturer');
        Route::get ('/preview/{id}/{date}',              [LecturersController::class, 'single_lecturer'])->name('public-part.lecturers.single-lecturer-date');
        Route::get ('/sneak-and-peek/{id}/{page}',       [LecturersController::class, 'sneakAndPeak'])->name('public-part.lecturers.single-lecturer.sneak-and-peek');
        Route::post('/load-more',                        [LecturersController::class, 'loadMore'])->name('public-part.lecturers.load-more');
        Route::post('/filter-by-name',                   [LecturersController::class, 'filterByName'])->name('public-part.lecturers.filter-by-name');
    });

    /*
     *  Blog
     */
    Route::prefix('blog')->group(function () {
        Route::get ('/',                       [BlogController::class, 'blog'])->name('public-part.blog.blog');
        Route::get ('/{id}',                   [BlogController::class, 'single_blog'])->name('public-part.blog.single-blog');
        Route::get ('preview/{id}',            [BlogController::class, 'preview'])->name('public-part.blog.preview');
        Route::post ('/load-more',             [BlogController::class, 'loadMore'])->name('public-part.blog.load-more');

        /* Fetch images */
        Route::post ('/fetch-images',          [BlogController::class, 'fetchImages'])->name('public-part.blog.fetch-images');
    });

    Route::prefix('alumni')->group(function () {
        Route::get ('/',                       [BlogController::class, 'alumni'])->name('public-part.alumni');
        Route::get ('preview/{id}',            [BlogController::class, 'alumniPreview'])->name('public-part.alumni.preview');
        Route::post ('/load-more',             [BlogController::class, 'alumniLoadMore'])->name('public-part.alumni.load-more');

        /* Fetch images */
        Route::post ('/fetch-images',          [BlogController::class, 'alumniFetchImages'])->name('public-part.alumni.fetch-images');
    });

    /*
     *  Other single pages
     */
    Route::get ('/scholarship',                              [HomepageController::class, 'scholarship'])->name('public-part.scholarship');
    Route::get ('/how-to-apply',                             [HomepageController::class, 'howToApply'])->name('public-part.how-to-apply');
    Route::get ('/about-us',                                 [HomepageController::class, 'aboutUs'])->name('public-part.about-us');
    Route::get ('/how-to-reach-us',                          [HomepageController::class, 'hotToReachUs'])->name('public-part.how-to-reach-us');

    Route::get ('/privacy-policy',                           [HomepageController::class, 'privacy'])->name('public-part.privacy');
    Route::get ('/terms-and-conditions',                     [HomepageController::class, 'terms'])->name('public-part.terms');
    Route::get ('/cookies',                                  [HomepageController::class, 'cookies'])->name('public-part.cookies');

    Route::get ('/critical-thinking',                        [HomepageController::class, 'criticalThinking'])->name('public-part.critical-thinking');
    Route::get ('/critical-thinking-preview/{id}',           [HomepageController::class, 'criticalThinkingPreview'])->name('public-part.critical-thinking.preview');
    /**
     *  Archive
     */
    Route::prefix('archive')->group(function () {
        Route::get ('/',                       [ArchiveController::class, 'home'])->name('public-part.archive');

        Route::prefix('lecturers')->group(function () {
            Route::get ('/',                       [ArchiveLecturersController::class, 'lecturers'])->name('public-part.archive.lecturers.lecturers');
            Route::get ('/filter/{program_id}',    [ArchiveLecturersController::class, 'filter'])->name('public-part.archive.lecturers.filter');
            Route::get ('/preview/{id}',           [ArchiveLecturersController::class, 'single_lecturer'])->name('public-part.archive.lecturers.single-lecturer');
            Route::get ('/preview/{id}/{page}',    [ArchiveLecturersController::class, 'single_lecturer'])->name('public-part.archive.lecturers.single-lecturer.page');
            Route::post('/load-more',              [ArchiveLecturersController::class, 'loadMore'])->name('public-part.archive.lecturers.load-more');
            Route::post('/filter-by-name',         [ArchiveLecturersController::class, 'filterByName'])->name('public-part.archive.lecturers.filter-by-name');
        });

        Route::prefix('critical-thinking')->group(function () {
            Route::get ('/',                       [ArchiveController::class, 'criticalThinking'])->name('public-part.archive.critical-thinking');
            Route::get ('/preview/{id}',           [ArchiveController::class, 'criticalThinkingPreview'])->name('public-part.archive.critical-thinking.preview');
        });

        Route::prefix('photo-gallery')->group(function () {
            Route::get ('/',                       [ArchiveController::class, 'gallery'])->name('public-part.archive.photo-gallery');
            Route::post('/load-more',              [ArchiveController::class, 'loadMoreImages'])->name('public-part.archive.photo-gallery.load-more');
            Route::post('/fetch-image',            [ArchiveController::class, 'fetchImage'])->name('public-part.archive.photo-gallery.fetch-image');
        });
    });
});

/**
 *  User routes / Public part routes for classic users
 */
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get ('/my-profile',                              [PublicUserController::class, 'myProfile'])->name('dashboard.my-profile');
    Route::get ('/welcome',                                 [PublicUserController::class, 'welcome'])->name('dashboard.welcome');
    Route::get ('/latest-news',                             [PublicUserController::class, 'latestNews'])->name('dashboard.latest-news');
    Route::get ('/latest-new/{id}',                         [PublicUserController::class, 'latestNew'])->name('dashboard.latest-new');
    Route::get ('/edit-links/{link}',                       [PublicUserController::class, 'editLinks'])->name('dashboard.edit-links');
    Route::get ('/change-password',                         [PublicUserController::class, 'changePassword'])->name('dashboard.change-password');
    Route::post('/update-profile',                          [PublicUserController::class, 'updateProfile'])->name('dashboard.update-profile');
    Route::post('/update-profile-image',                    [PublicUserController::class, 'updateProfileImage'])->name('dashboard.update-profile-image');

    /*
     *  Presenter routes
     */
    Route::get ('/preview-sessions',                        [PublicUserController::class, 'previewSessions'])->name('dashboard.preview-sessions');
    Route::get ('/preview-session/{id}',                    [PublicUserController::class, 'previewSession'])->name('dashboard.preview-session');
    Route::post('/update-sessions',                         [PublicUserController::class, 'updateSessions'])->name('dashboard.update-sessions');

    Route::prefix('sessions')->group(function () {
        Route::get ('/add-new-file/{session_id}',               [PublicUserController::class, 'addNewFile'])->name('dashboard.sessions.add-new-file');
        Route::post('/save-new-file',                           [PublicUserController::class, 'saveNewFile'])->name('dashboard.sessions.save-new-file');
        Route::get ('/remove-file/{id}',                        [PublicUserController::class, 'removeSessionFile'])->name('dashboard.sessions.remove-file');

        Route::get ('/add-new-link/{session_id}',               [PublicUserController::class, 'addNewLink'])->name('dashboard.sessions.add-new-link');
        Route::post('/save-new-link',                           [PublicUserController::class, 'saveNewLink'])->name('dashboard.sessions.save-new-link');
        Route::get ('/remove-link/{id}',                        [PublicUserController::class, 'removeSessionLink'])->name('dashboard.sessions.remove-link');
    });

    /*
     *  User routes
     */
    Route::get ('/apply-for-scholarship',                   [PublicUserController::class, 'applyForScholarship'])->name('dashboard.apply-for-scholarship');
    Route::get ('/inbox',                                   [PublicUserController::class, 'inbox'])->name('dashboard.inbox');
    Route::post('/mark-message-as-read',                    [PublicUserController::class, 'markMessageAsRead'])->name('dashboard.mark-message-as-read');
    Route::get ('/my-schedule',                             [PublicUserController::class, 'mySchedule'])->name('dashboard.my-schedule');
    Route::get ('/my-schedule/{date}',                      [PublicUserController::class, 'mySchedule'])->name('dashboard.my-schedule-by-date');

    /* Notes */
    Route::prefix('my-notes')->group(function () {
        Route::get ('/',                                        [PublicUserController::class, 'myNotes'])->name('dashboard.my-notes');
        Route::post('/remove-my-note',                          [PublicUserController::class, 'removeMyNote'])->name('dashboard.remove-my-note');
    });

    Route::get ('/department',                              [PublicUserController::class, 'department'])->name('dashboard.department');
    Route::get ('/preview-user/{username}',                 [PublicUserController::class, 'previewUser'])->name('dashboard.preview-user');

    /* Evaluations */
    Route::prefix('my-evaluations')->group(function () {
        Route::get ('/',                                        [PublicUserController::class, 'myEvaluations'])->name('dashboard.my-evaluations');
        Route::get ('/check/{session_id}',                      [PublicUserController::class, 'checkMyEvaluation'])->name('dashboard.my-evaluations.check');
        Route::post('/update-evaluation',                       [PublicUserController::class, 'updateEvaluation'])->name('dashboard.update-evaluation');

//        Route::post('/remove-my-note',                          [PublicUserController::class, 'removeMyNote'])->name('dashboard.remove-my-note');
    });

    /**
     *  Chat routes
     */
    Route::prefix('chat')->group(function () {
        /* Default route for preview chat conversations */
        Route::get ('/',                                         [ChatController::class, 'chat'])->name('dashboard.chat');
        Route::get ('/conversation/{hash}',                      [ChatController::class, 'chat'])->name('dashboard.chat.conversation-with-user');

        Route::post('/start-conversation',                       [ChatController::class, 'startConversation'])->name('dashboard.start-conversation');
        Route::post('/send-message',                             [ChatController::class, 'sendMessage'])->name('dashboard.send-message');

        Route::post('/fetch-old-messages',                       [ChatController::class, 'fetchOldMessages'])->name('dashboard.fetch-old-messages');
    });

    /** Sign out */
    Route::get ('/sign-out',                                     [PublicUserController::class, 'signOut'])->name('dashboard.sing-out');
    /** Update online user status */
    Route::post('/update-online-status',                         [PublicUserController::class, 'updateOnlineStatus'])->name('dashboard.update-online-status');
});

/**
 *  Admin routes
 */

Route::prefix('system')->middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('isAdmin')->group(function (){
        Route::get('/dashboard',                 [HomeController::class, 'index'])->name('system.home');

        /**
         *  Users routes;
         */
        Route::prefix('users')->middleware('auth')->group(function () {
            Route::get ('/',                          [UsersController::class, 'index'])->name('system.admin.users');
            Route::get ('/create',                    [UsersController::class, 'create'])->name('system.admin.users.create');
            Route::post('/save',                      [UsersController::class, 'save'])->name('system.admin.users.save');
            Route::get ('/preview/{username}',        [UsersController::class, 'preview'])->name('system.admin.users.preview');
            Route::get ('/edit/{username}',           [UsersController::class, 'edit'])->name('system.admin.users.edit');
            Route::post('/update',                    [UsersController::class, 'update'])->name('system.admin.users.update');
            Route::post('/update-profile-image',      [UsersController::class, 'updateProfileImage'])->name('system.admin.users.update-profile-image');

            // Generate new password; Used only for presenters
            Route::get ('/generate-new-password/{username}',           [UsersController::class, 'generateNewPassword'])->name('system.admin.users.generate-new-password');
        });

        /**
         *  Locations routes
         */
        Route::prefix('locations')->middleware('auth')->group(function () {
            Route::get ('/',                          [AdminLocationsController::class, 'index'])->name('system.admin.locations');
            Route::get ('/create',                    [AdminLocationsController::class, 'create'])->name('system.admin.locations.create');
            Route::post('/save',                      [AdminLocationsController::class, 'save'])->name('system.admin.locations.save');
            Route::get ('/preview/{id}',              [AdminLocationsController::class, 'preview'])->name('system.admin.locations.preview');
            Route::get ('/edit/{id}',                 [AdminLocationsController::class, 'edit'])->name('system.admin.locations.edit');
            Route::post('/update',                    [AdminLocationsController::class, 'update'])->name('system.admin.locations.update');
            Route::get ('/delete/{id}',               [AdminLocationsController::class, 'delete'])->name('system.admin.locations.delete');

            /* Location images */
            Route::get ('/change-image/{id}/{what}',               [AdminLocationsController::class, 'changeImage'])->name('system.admin.locations.change-image');
            Route::post('/update-image',                           [AdminLocationsController::class, 'updateImage'])->name('system.admin.locations.update-image');
        });

        /**
         *  Programs
         */
        Route::prefix('programs')->middleware('auth')->group(function () {
            Route::get ('/',                          [AdminProgramsController::class, 'index'])->name('system.admin.programs');
            Route::get ('/create',                    [AdminProgramsController::class, 'create'])->name('system.admin.programs.create');
            Route::post('/save',                      [AdminProgramsController::class, 'save'])->name('system.admin.programs.save');
            Route::get ('/preview/{id}',              [AdminProgramsController::class, 'preview'])->name('system.admin.programs.preview');
            Route::get ('/edit/{id}',                 [AdminProgramsController::class, 'edit'])->name('system.admin.programs.edit');
            Route::post('/update',                    [AdminProgramsController::class, 'update'])->name('system.admin.programs.update');
            Route::get ('/delete/{id}',               [AdminProgramsController::class, 'delete'])->name('system.admin.programs.delete');

            Route::get ('/upload-image/{id}',                      [AdminProgramsController::class, 'uploadImage'])->name('system.admin.programs.upload-image');
            Route::post('/save-image',                             [AdminProgramsController::class, 'saveImage'])->name('system.admin.programs.save-image');


            Route::get ('/all-applications',                       [AdminProgramsController::class, 'allApplications'])->name('system.admin.programs.all-applications');
            Route::get ('/preview-application/{id}',               [AdminProgramsController::class, 'previewApplication'])->name('system.admin.programs.preview-application');
            Route::get ('/edit-application/{id}',                  [AdminProgramsController::class, 'editApplication'])->name('system.admin.programs.edit-application');
            Route::post('/update-applications',                    [AdminProgramsController::class, 'updateApplication'])->name('system.admin.programs.update-application');
            Route::get ('/download-file/{id}',                     [AdminProgramsController::class, 'downloadFile'])->name('system.admin.programs.download-file');

            Route::get ('/evaluations',                            [AdminProgramsController::class, 'evaluations'])->name('system.admin.programs.evaluations');
            /**
             *  Sessions
             */
            Route::prefix('sessions')->middleware('auth')->group(function () {
                Route::get ('/create/{program_id}',            [AdminProgramsController::class, 'createSession'])->name('system.admin.programs.sessions.create');
                Route::post('/save',                           [AdminProgramsController::class, 'saveSession'])->name('system.admin.programs.sessions.save');
                Route::get ('/preview/{id}',                   [AdminProgramsController::class, 'previewSession'])->name('system.admin.programs.sessions.preview');
                Route::get ('/edit/{id}',                      [AdminProgramsController::class, 'editSession'])->name('system.admin.programs.sessions.edit');
                Route::post('/update',                         [AdminProgramsController::class, 'updateSession'])->name('system.admin.programs.sessions.update');
                Route::get ('/delete/{id}',                    [AdminProgramsController::class, 'deleteSession'])->name('system.admin.programs.sessions.delete');

                Route::get ('/upload-file/{session_id}',               [AdminProgramsController::class, 'uploadFile'])->name('system.admin.programs.sessions.upload-file');
                Route::post('/save-session-file',                      [AdminProgramsController::class, 'saveSessionFile'])->name('system.admin.programs.sessions.save-session-file');
                Route::get ('/remove-session-file/{id}',               [AdminProgramsController::class, 'removeSessionFile'])->name('system.admin.programs.sessions.remove-file');

                Route::get ('/insert-link/{session_id}',               [AdminProgramsController::class, 'insertLink'])->name('system.admin.programs.sessions.insert-session-link');
                Route::post('/save-session-link',                      [AdminProgramsController::class, 'saveLink'])->name('system.admin.programs.sessions.save-session-link');
                Route::get ('/remove-session-link/{id}',               [AdminProgramsController::class, 'ProgramSessionLink'])->name('system.admin.programs.sessions.remove-session-link');
            });
        });

        /**
         *  Single pages
         */
        Route::prefix('pages')->middleware('auth')->group(function () {
            Route::get ('/',                          [OtherController::class, 'index'])->name('system.admin.pages');
            Route::get ('/edit/{id}',                 [OtherController::class, 'edit'])->name('system.admin.pages.edit');
            Route::post('/update',                    [OtherController::class, 'update'])->name('system.admin.pages.update');
            Route::post('/update-image',              [OtherController::class, 'updateImage'])->name('system.admin.pages.update-image');
        });

        /**
         *  FAQs section
         */
        Route::prefix('faq')->middleware('auth')->group(function () {
            Route::get ('/',                               [OtherController::class, 'faqIndex'])->name('system.admin.faq');
            Route::get ('/create',                         [OtherController::class, 'faqCreate'])->name('system.admin.faq.create');
            Route::post('/save',                           [OtherController::class, 'faqSave'])->name('system.admin.faq.save');
            Route::get ('/edit/{id}',                      [OtherController::class, 'faqEdit'])->name('system.admin.faq.edit');
            Route::post('/update',                         [OtherController::class, 'faqUpdate'])->name('system.admin.faq.update');
            Route::get ('/delete/{id}',                    [OtherController::class, 'faqDelete'])->name('system.admin.faq.delete');
        });

        /**
         *  Inbox
         */
        Route::prefix('inbox')->middleware('auth')->group(function () {
            /*
             *  Bulk messages
             */
            Route::prefix('bulk-messages')->middleware('auth')->group(function () {
                Route::get ('/',                               [BulkMessagesController::class, 'index'])->name('system.admin.inbox.bulk-messages');
                Route::get ('/create',                         [BulkMessagesController::class, 'create'])->name('system.admin.inbox.bulk-messages.create');
                Route::post('/save',                           [BulkMessagesController::class, 'save'])->name('system.admin.inbox.bulk-messages.save');
                Route::get ('/preview/{id}',                   [BulkMessagesController::class, 'preview'])->name('system.admin.inbox.bulk-messages.preview');
                // Route::post('/update',                         [BulkMessagesController::class, 'faqUpdate'])->name('system.admin.inbox.bulk-messages.update');
                Route::get ('/delete/{id}',                    [BulkMessagesController::class, 'delete'])->name('system.admin.inbox.bulk-messages.delete');
            });
        });

        Route::prefix('chat')->middleware('auth')->group(function () {
            /*
             *  Group chats
             */
            Route::prefix('group-chats')->middleware('auth')->group(function () {
                Route::get ('/',                               [GroupChatsController::class, 'index'])->name('system.admin.chat.group-chats');
                Route::get ('/create',                         [GroupChatsController::class, 'create'])->name('system.admin.chat.group-chats.create');
                Route::post('/save',                           [GroupChatsController::class, 'save'])->name('system.admin.chat.group-chats.save');
                Route::get ('/preview/{id}',                   [GroupChatsController::class, 'preview'])->name('system.admin.chat.group-chats.preview');
                Route::get ('/delete/{id}',                    [GroupChatsController::class, 'delete'])->name('system.admin.chat.group-chats.delete');

                /* Add participants */
                Route::get ('/add-participant/{id}',           [GroupChatsController::class, 'addParticipant'])->name('system.admin.chat.group-chats.add-participant');
                Route::post('/save-participant',               [GroupChatsController::class, 'saveParticipant'])->name('system.admin.chat.group-chats.save-participant');
                Route::get ('/delete-participant/{id}',        [GroupChatsController::class, 'deleteParticipant'])->name('system.admin.chat.group-chats.delete-participant');
            });
        });

        /**
         *  Blog
         */
        Route::prefix('blog')->middleware('auth')->group(function () {
            Route::get ('/',                               [AdminBlogController::class, 'index'])->name('system.admin.blog');
            Route::get ('/create',                         [AdminBlogController::class, 'create'])->name('system.admin.blog.create');
            Route::post('/save',                           [AdminBlogController::class, 'save'])->name('system.admin.blog.save');
            Route::get ('/preview/{id}',                   [AdminBlogController::class, 'preview'])->name('system.admin.blog.preview');
            Route::get ('/edit/{id}',                      [AdminBlogController::class, 'edit'])->name('system.admin.blog.edit');
            Route::post('/update',                         [AdminBlogController::class, 'update'])->name('system.admin.blog.update');
            Route::get ('/delete/{id}',                    [AdminBlogController::class, 'delete'])->name('system.admin.blog.delete');

            /*
             *  Work with images
             */
            Route::post('/add-to-gallery',                 [AdminBlogController::class, 'addToGallery'])->name('system.admin.blog.add-to-gallery');
            Route::get ('/delete-from-gallery/{id}',       [AdminBlogController::class, 'deleteFromGallery'])->name('system.admin.blog.delete-from-gallery');

            Route::get ('/edit-image/{id}/{what}',         [AdminBlogController::class, 'editImage'])->name('system.admin.blog.edit-image');
            Route::post('/update-image',                   [AdminBlogController::class, 'updateImage'])->name('system.admin.blog.update-image');
        });

        /**
         *  Archive
         */
        Route::prefix('archive')->middleware('auth')->group(function () {
            /**
             *  Gallery
             */
            Route::prefix('gallery')->group(function () {
                Route::get ('/',                               [ArchiveGalleryController::class, 'index'])->name('system.admin.archive.gallery');
                Route::get ('/create',                         [ArchiveGalleryController::class, 'create'])->name('system.admin.archive.gallery.create');
                Route::post('/save',                           [ArchiveGalleryController::class, 'save'])->name('system.admin.archive.gallery.save');
                Route::get ('/delete/{id}',                    [ArchiveGalleryController::class, 'delete'])->name('system.admin.archive.gallery.delete');
            });
        });
    });
});
