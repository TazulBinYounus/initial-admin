<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\HomePageController;


Route::get('admin-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('admin-login', [LoginController::class, 'login']);

Route::get('/', [HomePageController::class, 'index']);

Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {

    Route::get('/logout', [DashboardController::class, 'logout']);
    Route::get('/dashboard',  [DashboardController::class, 'index'])->name('dashboard');

    //Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('data', [UserController::class, 'data'])->name('users.data');
        Route::delete('data', [UserController::class, 'index'])->name('users.destroy');
    });
});

Route::get('data-table', function () { return view('pages.tables.data-table'); });

//Route::any('/{page?}', [HomePageController::class, 'pageError'])->where('page', '.*');
