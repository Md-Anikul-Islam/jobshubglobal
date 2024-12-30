<?php


use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\JoinCategoryController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\ReviewController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\TrainingCategoryController;
use App\Http\Controllers\admin\TrainingController;
use App\Http\Controllers\admin\VisaMigrationController;
use App\Http\Controllers\ApplyJobController;
use App\Http\Controllers\company\CompanyRegistrationController;
use App\Http\Controllers\company\JobController;
use App\Http\Controllers\ElearningController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\JobManageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\user\EducationController;
use App\Http\Controllers\user\ExperienceController;
use App\Http\Controllers\user\SkillController;
use App\Http\Controllers\user\UserAccountController;
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

//User Account
Route::get('/user-registration', [UserAccountController::class, 'showUserRegistrationForm'])->name('user.registration');
Route::post('/user-registration-store', [UserAccountController::class, 'storeUserRegisterInfo'])->name('user.registration.store');
Route::get('/user-verify', [UserAccountController::class, 'showVerificationFormUser'])->name('user.verification');
Route::post('/user-verify-complete', [UserAccountController::class, 'verifyUser'])->name('user.verify.complete');

//Apply Job
Route::get('/jobs/apply/{job}', [ApplyJobController::class, 'applyJob'])->name('jobs.apply');

//home
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/all-jobs', [JobManageController::class, 'searchJobs'])->name('all.jobs');

Route::get('/job-details/{id}', [JobManageController::class, 'jobDetails'])->name('job.details');

Route::get('/about-us', [AboutUsController::class, 'about'])->name('about');
Route::get('/e-learning', [ElearningController::class, 'eLearning'])->name('eLearning');
Route::get('learning-details/{id}', [ElearningController::class, 'detailsTraining'])->name('eLearning.details');
Route::get('visa-migration-details/{id}', [ElearningController::class, 'detailsVisaMigration'])->name('visa.migration.details');

Route::middleware(['auth', 'company'])->group(callback: function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');

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


    //Join Category Section
    Route::get('/join-category-section', [JoinCategoryController::class, 'index'])->name('join.category.section');
    Route::post('/join-category-store', [JoinCategoryController::class, 'store'])->name('join.category.store');
    Route::put('/join-category-update/{id}', [JoinCategoryController::class, 'update'])->name('join.category.update');
    Route::get('/join-category-delete/{id}', [JoinCategoryController::class, 'destroy'])->name('join.category.destroy');


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

    //Training Category Section
    Route::get('/training-category-section', [TrainingCategoryController::class, 'index'])->name('training.category.section');
    Route::post('/training-category-store', [TrainingCategoryController::class, 'store'])->name('training.category.store');
    Route::put('/training-category-update/{id}', [TrainingCategoryController::class, 'update'])->name('training.category.update');
    Route::get('/training-category-delete/{id}', [TrainingCategoryController::class, 'destroy'])->name('training.category.destroy');

    //Company Manage
    Route::get('/training-list', [TrainingController::class, 'index'])->name('training.section');
    Route::post('/training-store', [TrainingController::class, 'store'])->name('training.store');
    Route::put('/training-update/{id}', [TrainingController::class, 'update'])->name('training.update');
    Route::get('/training-delete/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');

    //Company migration
    Route::get('/migration-list', [VisaMigrationController::class, 'index'])->name('migration.section');
    Route::post('/migration-store', [VisaMigrationController::class, 'store'])->name('migration.store');
    Route::put('/migration-update/{id}', [VisaMigrationController::class, 'update'])->name('migration.update');
    Route::get('/migration-delete/{id}', [VisaMigrationController::class, 'destroy'])->name('migration.destroy');

    Route::get('/company-under-posted-job/{id}', [CompanyController::class, 'companyUnderPostedJob'])->name('company.under.posted.job');
    Route::post('/company-under-job-store', [CompanyController::class, 'storeCompanyUnderPostedJob'])->name('company.under.job.store');
    Route::put('/company-under-job-update/{id}', [CompanyController::class, 'updateCompanyUnderPostedJob'])->name('company.under.job.update');
    Route::get('/company-under-job-delete/{id}', [CompanyController::class, 'destroyCompanyUnderPostedJob'])->name('company.under.job.destroy');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Site Setting
    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');

    //Site About
    Route::get('/about', [AboutController::class, 'index'])->name('about.section');
    Route::post('/about-update/{id?}', [AboutController::class, 'createOrUpdateAbout'])->name('about.createOrUpdate');


    //user
    //Education Section
    Route::get('/education', [EducationController::class, 'index'])->name('education.section');
    Route::post('/education-store', [EducationController::class, 'store'])->name('education.store');
    Route::put('/education-update/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::get('/education-delete/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

    //Experience
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.section');
    Route::post('/experience-store', [ExperienceController::class, 'store'])->name('experience.store');
    Route::put('/experience-update/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::get('/experience-delete/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');


    //Skill Section
    Route::get('/skill', [SkillController::class, 'index'])->name('skill.section');
    Route::post('/skill-store', [SkillController::class, 'store'])->name('skill.store');
    Route::put('/skill-update/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::get('/skill-delete/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');
});

require __DIR__.'/auth.php';
