<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegistController;
use App\Http\Controllers\LikeController;

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

Route::get('/', [PostsController::class, 'index'])->name('posts');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegistController::class, 'index'])->name('register');
Route::post('/register', [RegistController::class, 'store']);
Route::get('/create', [CreatePostController::class, 'index'])->name('createPost');
Route::post('/create', [CreatePostController::class, 'store']);
Route::get('/create', [CreatePostController::class, 'posts'])->name('createPost');
Route::get('/create/{post_id}', [CreatePostController::class, 'delete']);
Route::get('/edit/{post_id}', [EditController::class, 'getPost'])->name('edit');
Route::post('/edit', [EditController::class, 'updatePost'])->name('updatePost');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/like/{post_id}', [LikeController::class, 'like'])->name('like');





