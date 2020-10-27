<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testing/login', [App\Http\Controllers\LoginController::class, 'login'])->name('test.login');


//posts routes with guarded auth

Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [App\Http\Controllers\Post\PostController::class, 'index'])->name('post.index');
    Route::post('/posts', [App\Http\Controllers\Post\PostController::class, 'store'])->name('post.store');
    Route::get('/posts/create', [App\Http\Controllers\Post\PostController::class, 'create'])->name('post.create');
    Route::get('/posts/{post}', [App\Http\Controllers\Post\PostController::class, 'show'])->name('post.show');
    Route::post('/posts/{post}/update', [App\Http\Controllers\Post\PostController::class, 'update'])->name('post.update');
    Route::get('/posts/{post}/delete', [App\Http\Controllers\Post\PostController::class, 'destroy'])->name('post.destroy')->middleware('password.confirm');

    Route::get('/posts/{post}/force-delete', [App\Http\Controllers\Post\PostController::class, 'forceDelete'])->name('post.force-delete')->middleware('password.confirm');
});
