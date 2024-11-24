<?php


use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(callback: function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');
    //News Section
    Route::get('/news-section', [NewsController::class, 'index'])->name('news.section');
    Route::post('/news-store', [NewsController::class, 'store'])->name('news.store');
    Route::put('/news-update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::get('/news-delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    //Site Setting
    Route::get('/site-setting', [SiteSettingController::class, 'index'])->name('site.setting');
    Route::post('/site-settings-store-update/{id?}', [SiteSettingController::class, 'createOrUpdate'])->name('site-settings.createOrUpdate');

});

require __DIR__.'/auth.php';
