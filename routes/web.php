<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Profile\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Default route pointing to the 'welcome' view
Route::get('/', function () {
    return view('welcome');
});

// Routes related to the 'PostController'
Route::get('/home', [PostController::class, 'home'])->name('home');
Route::get('/upload', [PostController::class, 'uploadPost'])->name('uploadPost');
Route::post('/add-post', [PostController::class, 'addPost'])->name('addPost');
Route::get('/view-posts', [PostController::class, 'viewPosts'])->name('viewPosts');
Route::get('/image', [PostController::class, 'files'])->name('image');
Route::get('/pdf', [PostController::class, 'files'])->name('pdf');
Route::get('/doc', [PostController::class, 'files'])->name('doc');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('deletePost');

// Routes related to the 'AuthController' for authentication
Route::get('/login-view', [AuthController::class, 'loginView'])->name('login')->middleware('guest');
Route::get('/register-view', [AuthController::class, 'registerView'])->name('register');
Route::get('/register-redirect', [AuthController::class, 'registerRedirect'])->name('registerRedirect');
Route::get('/login-redirect', [AuthController::class, 'loginRedirect'])->name('loginRedirect');
Route::post('/register-user', [AuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('loginUser');

// Routes related to the 'UserProfileController' for user profile management
Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile');
Route::get('/logout', [UserProfileController::class, 'logout'])->name('logout');

// Routes using middleware 'sessionafter' for authenticated routes
Route::middleware('sessionafter')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::get('/upload', [PostController::class, 'uploadPost'])->name('uploadPost');
});
