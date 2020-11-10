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

Route::view('/contoh-main-theme', 'admin.layouts.main');

Route::get('/', function () {
    // resources/views/welcome.blade.php
    return view('welcome');
});

// route to change locale, project.test/lang/en
Route::get('/lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('lang:locale');

Auth::routes();
                // from       to        code
Route::redirect('/login', '/new-login', 301);

// KPT Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('user.group');

// IPT Dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');


// new login User Interface
Route::get('/new-login', [App\Http\Controllers\NewLoginController::class,'loginInterface'])->name('new-login:ui');
Route::post('/new-login', [App\Http\Controllers\NewLoginController::class,'loginProcess'])->name('new-login:process');

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


Route::get('/my-profile', [App\Http\Controllers\ProfileController::class, 'myProfile'])->name('my-profile');
Route::post('/my-profile', [App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('update-profile');

Route::get('/my-profile/password', [App\Http\Controllers\ProfileController::class, 'myProfilePassword'])->name('my-profile-password');
Route::post('/my-profile/password', [App\Http\Controllers\ProfileController::class, 'updateProfilePassword'])->name('update-profile-password');


Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::post('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');


Route::get('/pelajar', [App\Http\Controllers\PelajarController::class, 'index'])->name('pelajar.index');
Route::post('/pelajar/import/excel', [App\Http\Controllers\PelajarController::class, 'importExcel'])->name('pelajar.import-excel');

//     method ( uri , action )
Route::get('admin/negeri', [App\Http\Controllers\Pengurusan\NegeriController::class, 'senarai'])->name('negeri.senarai');
Route::get('admin/negeri/{negeri}', [App\Http\Controllers\Pengurusan\NegeriController::class, 'lihat'])->name('negeri.lihat');
Route::post('admin/negeri/{negeri}', [App\Http\Controllers\Pengurusan\NegeriController::class, 'kemaskini'])->name('negeri.kemaskini');
