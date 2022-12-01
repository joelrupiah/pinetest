<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetAdminPasswordController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutHistoryController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminFaqController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactSettingController;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeeController;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth:api')->prefix('admin')->group(function () {
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::get('/', function(){
        return view('admin.admin');
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('grade', GradeController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('category', CategoryController::class);
    Route::delete('delete-category/{id}', [CategoryController::class, 'destroy']);
    // Route::resource('event', EventController::class);
    Route::get('get-admin-grade', [GradeController::class, 'getAdminGrades']);

    Route::get('search-about', [AboutUsController::class, 'searchAbouts']);

    Route::get('all-admins', [AdminController::class, 'getAllAdmins']);
    Route::post('create-admin', [AdminController::class, 'store']);
    Route::post('edit-admin/{id}', [AdminController::class, 'update']);
    Route::delete('delete-admin/{id}', [AdminController::class, 'destroy']);

    Route::post('edit-role/{id}', [RoleController::class, 'update']);

    Route::post('/edit-permission/{id}', [PermissionController::class, 'update']);

    Route::post('edit-grade/{id}', [GradeController::class, 'update']);

    Route::get('get-admin-categories', [CategoryController::class, 'getAdminCategories']);
    Route::post('create-category', [CategoryController::class, 'store']);
    Route::post('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('get-single-category/{id}', [CategoryController::class, 'show']);

    Route::get('get-all-applications', [ApplicationController::class, 'index']);
    Route::get('get-application/{id}', [ApplicationController::class, 'getSingleApplication']);
    Route::post('update-application/{id}', [ApplicationController::class, 'update']);
    Route::delete('delete-application/{id}', [ApplicationController::class, 'destroy']);

    Route::get('get-gallery/{id}', [GalleryController::class, 'show']);
    Route::post('edit-gallery/{id}', [GalleryController::class, 'update']);
    Route::delete('delete-gallery/{id}', [GalleryController::class, 'destroy']);

    Route::get('get-faqs', [InboxController::class, 'index']);
    Route::get('get-asked-question/{id}', [InboxController::class, 'getAdminQuestion']);
    Route::post('reply-asked-question/{id}', [InboxController::class, 'replyQuestion']);

    Route::post('create-about', [AboutController::class, 'store']);
    Route::get('get-all-admin-about-data', [AboutController::class, 'index']);
    Route::get('get-about-data/{id}', [AboutController::class, 'show']);
    Route::post('update-about-us/{id}', [AboutController::class, 'update']);
    Route::delete('delete-about/{id}', [AboutController::class, 'destroy']);

    Route::post('create-about-history', [AboutHistoryController::class, 'store']);
    Route::get('get-admin-about-history', [AboutHistoryController::class, 'index']);
    Route::get('get-about-history/{id}', [AboutHistoryController::class, 'show']);
    Route::post('update-about-history/{id}', [AboutHistoryController::class, 'update']);

    Route::post('create-faq', [AdminFaqController::class, 'store']);
    Route::get('get-all-admin-faqs', [AdminFaqController::class, 'index']);
    Route::get('get-admin-faq/{id}', [AdminFaqController::class, 'show']);
    Route::post('update-admin-faq/{id}', [AdminFaqController::class, 'update']);

    Route::get('get-admin-events', [EventController::class, 'index']);
    Route::post('create-event', [EventController::class, 'store']);
    Route::get('get-event/{id}', [EventController::class, 'show']);
    Route::post('edit-event/{id}', [EventController::class, 'update']);
    Route::delete('delete-event/{id}', [EventController::class, 'destroy']);

    Route::post('create-carousel', [CarouselController::class, 'store']);
    Route::get('get-admin-carousels', [CarouselController::class, 'index']);
    Route::post('edit-carousel/{id}', [CarouselController::class, 'update']);
    Route::get('get-carousel/{id}', [CarouselController::class, 'show']);

    Route::get('get-site-settings', [ContactSettingController::class, 'index']);
    Route::post('create-site-setting', [ContactSettingController::class, 'store']);
    Route::get('get-site-setting/{id}', [ContactSettingController::class, 'show']);
    Route::post('update-site-settings/{id}', [ContactSettingController::class, 'update']);

    Route::get('get-admin-chooses', [ChooseController::class, 'index']);
    Route::post('create-choose-data', [ChooseController::class, 'store']);
    Route::get('get-choose/{id}', [ChooseController::class, 'show']);
    Route::post('edit-choose/{id}', [ChooseController::class, 'update']);
    Route::delete('delete-admin-choose/{id}', [ChooseController::class, 'destroy']);

    Route::get('get-fee-requests', [FeeController::class, 'index']);
    Route::get('get-fee-request/{id}', [FeeController::class, 'getFeeRequest']);

    Route::post('send-fee-request-email/{id}', [FeeController::class, 'sendFeeEmail']);

});

Route::get('get-user-about', [AboutController::class, 'getUserAbout']);
Route::get('get-about-history', [AboutHistoryController::class, 'getAboutHistory']);
Route::get('get-galleries', [GalleryController::class, 'getGalleries']);
Route::get('get-grades', [GradeController::class, 'getGrades']);
Route::post('send-question', [FaqController::class, 'askQuestion']);
Route::get('get-admin-faqs', [AdminFaqController::class, 'getAdminFaqs']);
Route::get('get-user-events', [EventController::class, 'userEvents']);
Route::get('get-user-faqs', [FaqController::class, 'getUserFaq']);
Route::get('get-user-carousels', [CarouselController::class, 'getUserCarousel']);
Route::get('get-event-detail/{eventSlug}', [EventController::class, 'eventDetails']);
Route::get('get-user-grades', [GradeController::class, 'getGrades']);
Route::get('get-user-chooses', [ChooseController::class, 'getUserChooses']);
Route::get('get-user-categories', [CategoryController::class, 'getUserCategories']);
Route::get('get-site-settings', [ContactSettingController::class, 'getSiteSettings']);

Route::get('get-all-galleries', [GalleryController::class, 'getAllGalleries']);
Route::get('get-sport-gallery', [GalleryController::class, 'getSportGallery']);
Route::get('get-agriculture-gallery', [GalleryController::class, 'getAgricultureGallery']);
Route::get('get-education-gallery', [GalleryController::class, 'educationGalleries']);
Route::get('get-socialevents-gallery', [GalleryController::class, 'getSocialEventsGallery']);
Route::get('get-infrastructure-gallery', [GalleryController::class, 'getInfrastructureGallery']);

Route::post('subscribe-newsletter', [SubscriptionController::class, 'store']);
Route::post('send-message', [InboxController::class, 'store']);

Route::post('submit-application', [ApplicationController::class, 'store']);

Route::post('track-application', [ApplicationController::class, 'trackApplication']);

Route::post('request-fees', [FeeController::class, 'store']);

Route::prefix('admin')->group(function(){
    Route::post('reset-admin-password', [ResetAdminPasswordController::class, 'resetAdminPassword']);
});

Route::get('/', function(){
    return view('user.user');
});

Route::get('/admin', function(){
    return view('admin.admin');
});

Route::get('/{any}', function(){
    return view('user.user');
});

Route::get('/admin/{any}', function(){
    return view('admin.admin');
});

Route::get('/{any}/{path}', function(){
    return view('user.user');
});

Route::get('/admin/{any}/{path}', function(){
    return view('admin.admin');
});