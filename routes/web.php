<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [UserController::class, 'registerIndex']);
Route::get('/login', [UserController::class, 'loginIndex']);
Route::get('/profile', [UserController::class, 'profileIndex']);

// post
Route::get('/post/new', [PostController::class, 'createPostIndex']);

Route::post('/post/new', [PostController::class], 'insertPost');
