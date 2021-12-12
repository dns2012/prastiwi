<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('', [AuthController::class, 'index'])->name('admin.auth');
        Route::post('login', [AuthController::class, 'login'])->name('admin.login');
        Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('dashboard', [DashboardController::class,  'index'])->name('admin.dashboard');

        Route::resource('administrator', AdminController::class)->middleware('admin-legitimate');

        Route::group(['prefix' => 'apps', 'as' => 'apps.'], function() {
            Route::resource('client', ClientController::class)->middleware('admin-koperasi');
            Route::resource('product', ProductController::class)->middleware('admin-toko');
        });
    });
});