<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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
Route::group(['prefix' => '/users'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/show/{id}', [UserController::class, 'show']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

Route::group(['prefix' => '/posts'], function () {
    Route::get('/', [PostsController::class, 'index']);
    Route::post('/store', [PostsController::class, 'store']);
    Route::get('/show/{id}', [PostsController::class, 'show']);
    Route::put('/update/{id}', [PostsController::class, 'update']);
    Route::delete('/delete/{id}', [PostsController::class, 'delete']);
});
