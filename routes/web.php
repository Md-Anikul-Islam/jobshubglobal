<?php


use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\company\CompanyRegistrationController;
use App\Http\Controllers\company\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

//Account Manage
Route::get('/company-registration', [CompanyRegistrationController::class, 'showCompanyRegistrationForm'])->name('company.registration');
Route::post('/company-registration-store', [CompanyRegistrationController::class, 'storeCompanyRegisterInfo'])->name('company.registration.store');
Route::get('/company-verify', [CompanyRegistrationController::class, 'showVerificationForm'])->name('company.verification');
Route::post('/company-verify-complete', [CompanyRegistrationController::class, 'verify'])->name('company.verify.complete');


Route::middleware(['auth', 'company'])->group(callback: function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');
    //News Section
    Route::get('/news-section', [NewsController::class, 'index'])->name('news.section');
    Route::post('/news-store', [NewsController::class, 'store'])->name('news.store');
    Route::put('/news-update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    //Slider Section
    Route::get('/slider-section', [SliderController::class, 'index'])->name('slider.section');
    Route::post('/slider-store', [SliderController::class, 'store'])->name('slider.store');
    Route::put('/slider-update/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::get('/slider-delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');

    //Category Section
    Route::get('/category-section', [CategoryController::class, 'index'])->name('category.section');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/category-update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //Location Section
    Route::get('/location-section', [LocationController::class, 'index'])->name('location.section');
    Route::post('/location-store', [LocationController::class, 'store'])->name('location.store');
    Route::put('/location-update/{id}', [LocationController::class, 'update'])->name('location.update');
    Route::get('/location-delete/{id}', [LocationController::class, 'destroy'])->name('location.destroy');

    //review Section
    Route::get('/review-section', [ReviewController::class, 'index'])->name('review.section');
    Route::post('/review-store', [ReviewController::class, 'store'])->name('review.store');
    Route::put('/review-update/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::get('/review-delete/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');


    //Job Section
    Route::get('/job-section', [JobController::class, 'index'])->name('job.section');
    Route::post('/job-store', [JobController::class, 'store'])->name('job.store');
    Route::put('/job-update/{id}', [JobController::class, 'update'])->name('job.update');
    Route::get('/job-delete/{id}', [JobController::class, 'destroy'])->name('job.destroy');

    //Company Manage
    Route::get('/company-list', [CompanyController::class, 'index'])->name('company.section');
    Route::post('/company-store', [CompanyController::class, 'store'])->name('company.store');
    Route::put('/company-update/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('/company-delete/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');

    Route::get('/company-under-posted-job/{id}', [CompanyController::class, 'companyUnderPostedJob'])->name('company.under.posted.job');
    Route::post('/company-under-job-store', [CompanyController::class, 'store'])->name('company.under.job.store');
    Route::put('/company-under-job-update/{id}', [CompanyController::class, 'update'])->name('company.under.job.update');
    Route::get('/company-under-job-delete/{id}', [CompanyController::class, 'destroy'])->name('company.under.job.destroy');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Site Setting
    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');

    //Site About
    Route::get('/about', [AboutController::class, 'index'])->name('about.section');
    Route::post('/about-update/{id?}', [AboutController::class, 'createOrUpdateAbout'])->name('about.createOrUpdate');
});

require __DIR__.'/auth.php';
