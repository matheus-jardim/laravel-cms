<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\Site\PageController as SitePageController;
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

Route::get('/', [SiteHomeController::class, 'index']);


Route::prefix('painel')->group(function() {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::middleware('auth')->group(function() {
        Route::get('/', [AdminHomeController::class, 'index'])->name('admin');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::resource('users', UserController::class)->middleware('can:edit-users');

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
        Route::put('profilesave', [ProfileController::class, 'save'])->name('profile.save');

        Route::get('settings', [SettingController::class, 'index'])->name('settings');
        Route::put('settingssave', [SettingController::class, 'save'])->name('settings.save');

        Route::resource('pages', PageController::class);
    });
    
});

Route::fallback([SitePageController::class, 'index']);