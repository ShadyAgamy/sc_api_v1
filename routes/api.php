<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/forgot/pw', [ForgotPasswordController::class, 'forgotPassword']);
Route::put('/change/pw', [ForgotPasswordController::class, 'changePassword']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('/update/profile', [AccountController::class, 'update']);
    //Product Routes
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products/add', [ProductController::class, 'store']);
    Route::get('/products/show/{id}', [ProductController::class, 'show']);
    Route::put('/products/update/{id}', [ProductController::class, 'update']);
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete']);
    Route::post('/products/visit/{id}', [ProductController::class, 'visit']);
});
