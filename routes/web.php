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

Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('follow');
Route::get('/posts', [App\Http\Controllers\PostsController::class, 'posts'])->name('home');
Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/p/{post}/edit', [App\Http\Controllers\PostsController::class, 'edit'])->name('edit');
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');
Route::patch('/p/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('update');
Route::get('/u/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show');