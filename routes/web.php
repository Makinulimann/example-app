<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CheckupController;

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('registration', [AuthController::class, 'registration'])->name('register');
    Route::post('registrationPost', [AuthController::class, 'registrationPost'])->name('registerPost');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('loginPost', [AuthController::class, 'loginPost'])->name('loginPost');
});

Route::middleware('auth', 'user')->group(function () {
    Route::get('home', [HomeController::class, 'home'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('home', [ArticleController::class, 'home'])->name('home');
    Route::get('/listArticle', [ArticleController::class, 'showListArticle'])->name('listArticle');
    Route::get('/article/{id}', [ArticleController::class, 'showArticle'])->name('article');
    Route::get('/checkup', [CheckupController::class, 'showCheckup'])->name('checkup.show');
    Route::post('/checkup', [CheckupController::class, 'store'])->name('checkup.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('adminpage', [HomeController::class, 'admin'])->name('adminpage');
    Route::get('adminpage', [ArticleController::class, 'adminPageArticle'])->name('adminpage');
    Route::get('logoutAdmin', [AdminController::class, 'logoutAdmin'])->name('logoutAdmin');

    Route::get('/listArticleAdmin', [ArticleController::class, 'showListArticleAdmin'])->name('listArticleAdmin');
    Route::get('kelolaArticle', [AdminController::class, 'kelolaArticle'])->name('kelolaArticle');
    Route::get('kelolaArticle/create', [AdminController::class, 'createArticle'])->name('kelolaArticle.create');
    Route::post('kelolaArticle', [AdminController::class, 'storeArticle'])->name('kelolaArticle.store');
    Route::get('kelolaArticle/{id}/edit', [AdminController::class, 'editArticle'])->name('kelolaArticle.edit');
    Route::put('kelolaArticle/{id}', [AdminController::class, 'updateArticle'])->name('kelolaArticle.update');
    Route::delete('kelolaArticle/{id}', [AdminController::class, 'destroyArticle'])->name('kelolaArticle.destroy');

    Route::get('kelola', [AdminController::class, 'kelola'])->name('kelola');
    Route::delete('kelola/{id}', [AdminController::class, 'destroy'])->name('kelola.destroy');
    Route::get('kelola/{id}/edit', [AdminController::class, 'edit'])->name('kelola.edit');
    Route::put('kelola/{id}', [AdminController::class, 'update'])->name('kelola.update');

    Route::get('admin/checkups', [AdminController::class, 'listCheckup'])->name('admin.checkups');
    Route::post('admin/checkups/{id}/status', [AdminController::class, 'updateStatus'])->name('admin.checkups.updateStatus');
});
