<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/view/{post_id}', [PostController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [UserController::class, 'registerIndex']);
    Route::post('/registering', [UserController::class, 'createUser']);

    Route::get('/login', [UserController::class, 'loginIndex']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profileIndex']);
    Route::patch('/profile_update', [UserController::class, 'updateUser']);

    // post
    Route::prefix('post')->group(function () {

        Route::get('/new', [PostController::class, 'createPostIndex']);
        Route::post('/new', [PostController::class, 'insertPost']);

        // ajax function
        Route::post('/like', [PostController::class, 'like_handler']);
        Route::get('/trending', [HomeController::class, 'get_trending']);

        Route::prefix('{post_id}/comment')->group(function () {
            Route::post('/new', [CommentController::class, 'add_comment']);
            Route::get('/{comment_id}/delete', [CommentController::class, 'delete']);

            // ajax function
            Route::post('/like', [CommentController::class, 'like_handler']);
            Route::post('/update', [CommentController::class, 'update']);
            Route::post('/get', [CommentController::class, 'get_comment']);
        });
    });
});
