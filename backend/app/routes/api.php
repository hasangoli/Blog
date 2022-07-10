<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SanctumController as SanctumController;
use App\Http\Controllers\Auth\SanctumEmailVerifyController;

use App\Http\Controllers\ApiController as ApiController;
use App\Http\Controllers\ArticleController as ArticleController;
use App\Http\Controllers\CategoryController as CategoryController;
use App\Http\Controllers\TagController as TagController;

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


Route::group(['middleware' => ['throttle']], function () {
    Route::post('register', [SanctumController::class, 'register']);
    Route::post('/login', [SanctumController::class, 'login']);
    // Route::get('email/verify/{id}', [SanctumEmailVerifyController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name
    // Route::post('email/resend', [SanctumEmailVerifyController::class, 'resend'])->name('verification.resend');
    // Route::post('/reset-password', [SanctumController::class, 'resetPassword']);
});

Route::post('/token', [SanctumController::class, 'getNewToken']);


Route::post('articles', [ArticleController::class,'index']);
Route::post('articles/search', [ApiController::class,'search']);
Route::post('article/single', [ArticleController::class,'show']);

Route::post('category', [CategoryController::class,'index']);
Route::post('tag', [TagController::class,'index']);

Route::prefix('user/')->middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [SanctumController::class, 'logout']);
    
    Route::post('category/create',[CategoryController::class,'store']);
    Route::post('category/update',[CategoryController::class,'update']);
    Route::post('category/delete',[CategoryController::class,'destroy']);

    Route::post('tag/create',[TagController::class,'store']);
    Route::post('tag/update',[TagController::class,'update']);
    Route::post('tag/delete',[TagController::class,'destroy']);

    Route::post('article/create', [ArticleController::class,'store']);
    Route::post('article/update', [ArticleController::class,'update']);
    Route::post('article/delete', [ArticleController::class,'destroy']);
    
    Route::post('article/comment-save', [ArticleController::class,'comments']);
});

