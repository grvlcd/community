<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommunityUser;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // --

    // User Profile
    Route::get('profile/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [UserController::class, 'update'])->name('profile.update');
    // --

    // Posts
    Route::post('posts/{community}/create', [PostController::class, 'store'])->name('posts.store');
    Route::resource('posts', PostController::class)->except(['store']);
    // --


    // Images
    Route::delete('images/{image}/delete', [ImageController::class, 'destroy'])->name('image.destroy');
    // Images

    // Communities
    Route::resource('communities', CommunityController::class);
    Route::post('communities/{community}/join', [CommunityUser::class, 'store'])->name('community.join.store');
    // --

    // Comments
    Route::post('comment/{post}', [CommentController::class, 'store'])->name('comment.post.store');
    Route::resource('comments', CommentController::class)->except('store');
    // --
});
