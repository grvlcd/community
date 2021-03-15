<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::middleware(['guest'])->group(function () {
    Route::view('/', 'welcome');
});


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('posts/{community}/create', [PostController::class, 'store'])->name('posts.store');
    Route::resource('posts', PostController::class)->except(['store']);
    Route::resource('communities', CommunityController::class);
    Route::post('comment/{post}', [CommentController::class, 'store'])->name('comment.post.store');
    Route::resource('comments', CommentController::class)->except('store');
});
