<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\HomePageContentController;
use App\Http\Controllers\Admin\GalleryController as GalleryAdminController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\CoursesController as CoursesAdminController;
use App\Http\Controllers\Admin\ResourcePersonController as ResourcePersonAdminController;
use App\Http\Controllers\Admin\InfrastructureController as InfrastructureAdminController;
use App\Http\Controllers\Admin\NoticeController as NoticeAdminController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\MandatoryDisclosureController as MandatoryDisclosureAdminController;
use App\Http\Controllers\Admin\DisclosureDocumentsController;
use App\Http\Controllers\Admin\HomePageBannerController;
use App\Http\Controllers\Admin\AffiliationsController;
use App\Http\Controllers\Admin\StudentsController;
use App\Http\Controllers\Admin\BiometricController as BiometricAdminController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ResourcePersonController;
use App\Http\Controllers\StudentPortalController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\MandatoryDisclosureController;
use App\Http\Controllers\BiometricController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('courses', [CoursesController::class, 'index']);
Route::get('gallery', [GalleryController::class, 'index']);
Route::get('resource-person', [ResourcePersonController::class, 'index']);
Route::get('student-portal', [StudentPortalController::class, 'index']);
Route::post('student-portal/get-session-data', [StudentPortalController::class, 'getSessionDataAjax']);
Route::get('infrastructure', [InfrastructureController::class, 'index']);
Route::get('mandatory-disclosure', [MandatoryDisclosureController::class, 'index']);
Route::get('biometric', [BiometricController::class, 'index']);
Route::post('biometric/get-report-data', [BiometricController::class, 'getReportDataAjax']);
Route::get('notice', [NoticeController::class, 'index']);
Route::get('events', [EventController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/submit-request', [ContactController::class, 'sendContactMail']);

Route::get('admin', [AdminAuthController::class, 'getLogin']);

Route::group(['prefix' => 'admin'], function () {

    Route::get('logout', [AdminAuthController::class, 'logout'])->name('adminLogout');

    Route::group(['middleware' => ['adminauth']], function () {
        Route::get('login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
        Route::post('login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    });

    Route::group(['middleware' => ['adminAfterLogin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('change-password', [AdminController::class, 'changePassword'])->name('changePassword');
        Route::post('reset-password', [AdminController::class, 'resetPassword'])->name('resetPassword');

        Route::get('home-page', [HomePageContentController::class, 'index']);
        Route::post('save-home-page', [HomePageContentController::class, 'savePageContent']);

        Route::model('home-page-banners', 'App\Models\HomePageBanners');
        Route::resource('home-page-banners', 'App\Http\Controllers\Admin\HomePageBannerController');
        Route::post('home-page-banners/get-list', [HomePageBannerController::class, 'banner_list_ajax']);
        Route::get('home-page-banners/delete/{id}', [HomePageBannerController::class, 'destroy']);

        Route::get('courses', [CoursesAdminController::class, 'index'])->name('courses');
        Route::post('save-courses', [CoursesAdminController::class, 'saveCoursesInfo']);

        Route::model('gallery', 'App\Models\Gallery');
        Route::resource('gallery', 'App\Http\Controllers\Admin\GalleryController');
        Route::post('gallery/get-list', [GalleryAdminController::class, 'gallery_list_ajax']);
        Route::get('gallery/delete/{id}', [GalleryAdminController::class, 'destroy']);

        Route::model('gallery-category', 'App\Models\GalleryCategory');
        Route::resource('gallery-category', 'App\Http\Controllers\Admin\GalleryCategoryController');
        Route::post('gallery-category/get-list', [GalleryCategoryController::class, 'categories_list_ajax']);
        Route::get('gallery-category/delete/{id}', [GalleryCategoryController::class, 'destroy']);

        Route::model('resource-person', 'App\Models\ResourcePerson');
        Route::resource('resource-person', 'App\Http\Controllers\Admin\ResourcePersonController');
        Route::post('resource-person/get-list', [ResourcePersonAdminController::class, 'person_list_ajax']);
        Route::get('resource-person/delete/{id}', [ResourcePersonAdminController::class, 'destroy']);

        Route::model('students', 'App\Models\Students');
        Route::resource('students', 'App\Http\Controllers\Admin\StudentsController');
        Route::post('students/get-list', [StudentsController::class, 'students_list_ajax']);
        Route::get('students/delete/{id}', [StudentsController::class, 'destroy']);

        Route::get('infrastructure', [InfrastructureAdminController::class, 'index'])->name('infrastructure');
        Route::post('save-infrastructure', [InfrastructureAdminController::class, 'saveInfrastructureInfo']);

        Route::get('mandatory-disclosure', [MandatoryDisclosureAdminController::class, 'index'])->name('mandatoryDisclosure');
        Route::post('save-mandatory-disclosure', [MandatoryDisclosureAdminController::class, 'saveMandatoryDisclosureInfo']);

        Route::group(['prefix' => 'mandatory-disclosure'], function () {
            Route::model('documents', 'App\Models\MandatoryDisclosureDocuments');
            Route::resource('documents', 'App\Http\Controllers\Admin\DisclosureDocumentsController');
            Route::post('documents/get-list', [DisclosureDocumentsController::class, 'document_list_ajax']);
            Route::get('documents/delete/{id}', [DisclosureDocumentsController::class, 'destroy']);
        });

        Route::model('biometric', 'App\Models\Biometric');
        Route::resource('biometric', 'App\Http\Controllers\Admin\BiometricController');
        Route::post('biometric/get-list', [BiometricAdminController::class, 'biometric_list_ajax']);
        Route::get('biometric/delete/{id}', [BiometricAdminController::class, 'destroy']);

        Route::model('notice', 'App\Models\Notice');
        Route::resource('notice', 'App\Http\Controllers\Admin\NoticeController');
        Route::post('notice/get-list', [NoticeAdminController::class, 'notice_list_ajax']);
        Route::get('notice/delete/{id}', [NoticeAdminController::class, 'destroy']);

        Route::model('event', 'App\Models\Event');
        Route::resource('event', 'App\Http\Controllers\Admin\EventController');
        Route::post('event/get-list', [EventAdminController::class, 'event_list_ajax']);
        Route::get('event/delete/{id}', [EventAdminController::class, 'destroy']);

        Route::model('affiliations', 'App\Models\Affiliations');
        Route::resource('affiliations', 'App\Http\Controllers\Admin\AffiliationsController');
        Route::post('affiliations/get-list', [AffiliationsController::class, 'affiliations_list_ajax']);
        Route::get('affiliations/delete/{id}', [AffiliationsController::class, 'destroy']);

        Route::get('site-info', [SiteInfoController::class, 'siteInfo'])->name('siteInfo');
        Route::post('save-site-info', [SiteInfoController::class, 'saveSiteInfo']);
    });
});
