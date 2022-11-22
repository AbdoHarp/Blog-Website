<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\SetingController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//show posts in home page 
Route::get('/', [FrontendController::class, 'index']);
Route::get('tutorial/{category_slug}', [FrontendController::class, 'viewCategoryPost']);
Route::get('tutorial/{category_slug}/{post_slug}', [FrontendController::class, 'viewPost']);


//comment system 
Route::post('comment', [CommentController::class, 'store']);
Route::post('delete-comment', [CommentController::class, 'destroy']);


//controller Admin group 
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {


    //show dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    /// Routs for categoryController 
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add_category', [CategoryController::class, 'create']);
    Route::post('add_category', [CategoryController::class, 'store']);
    Route::get('edit_category/{category_id}', [CategoryController::class, 'edit']);
    Route::post('update_category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete_category/{category_id}', [CategoryController::class, 'destroy']);

    /// Routs for postController 
    Route::get('posts', [PostController::class, 'index']);
    Route::get('add_post', [PostController::class, 'create']);
    Route::post('add_post', [PostController::class, 'store']);
    Route::get('edit_post/{post_id}', [PostController::class, 'edit']);
    Route::post('update_post/{post_id}', [PostController::class, 'update']);
    Route::get('delete_post/{category_id}', [PostController::class, 'destroy']);


    // show users 
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{user_id}', [UserController::class, 'edit']);
    Route::put('update_user/{user_id}', [UserController::class, 'update']);

    //seting Routes

    Route::get('settings', [SetingController::class, 'index']);
    Route::post('settings', [SetingController::class, 'savedata']);
});
