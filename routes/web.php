<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::get('/test', function () {
    return view('test');
});

Route::get('/register', [UserController::class, 'registerIndex']);
Route::post('/registering', [UserController::class, 'createUser']);

Route::get('/login', [UserController::class, 'loginIndex']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/profile', [UserController::class, 'profileIndex']);

// post
Route::get('/post/new', [PostController::class, 'createPostIndex']);


Route::post('/post/new', 'App\Http\Controllers\PostController@insertPost');

// like and dislike post
Route::get('/post/{post_id}/like', [PostController::class, 'like']);
Route::get('/post/{post_id}/dislike', [PostController::class, 'dislike']);
