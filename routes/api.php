<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'auth'], function() {
        Route::post('login', [AuthController::class, 'login']);
        Route::put('update-password', [AuthController::class, 'update']);

        Route::group(['middleware' => 'auth:sanctum'], function() {
            Route::get('check', function() { return auth()->user(); });
            Route::get('logout', function(Request $request) { $request->user()->tokens()->delete(); });
        });
    });

    Route::group(['middleware' => 'auth:sanctum'], function() {

        Route::group(['prefix' => 'user'], function() {
            Route::get('', [UserController::class, 'myProfile']);
            Route::get('saving', [UserController::class, 'mySaving']);
            Route::get('loan', [UserController::class, 'myLoan']);
        });

        Route::group(['prefix' => 'product'], function() {
            Route::get('', [ProductController::class, 'index']);
            Route::get('{id}', [ProductController::class, 'detail']);
        });
    });
});

Route::post('tinymce', function() {return true;})->name('api.tinymce');