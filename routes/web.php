<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/c/post', [App\Http\Controllers\PostController::class, 'viewaddform'])->name('viewaddform');
Route::post('/createpost', [App\Http\Controllers\PostController::class, 'store'])->name('storepost');
Route::get('/v/post/{id}', [App\Http\Controllers\PostController::class, 'view'])->name('viewpost');
Route::delete('/d/post/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('deletepost');
Route::get('/u/post/{id}', [App\Http\Controllers\PostController::class, 'viewupdate'])->name('viewupdatepost');
Route::put('/u/post/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('updatepost');
Route::get('/', [App\Http\Controllers\PostController::class, 'homepage'])->name('homepage');
Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('adminindex');
Route::delete('/admin/d/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('deleteuser');
Route::get('/u/user/{id}', [App\Http\Controllers\UserController::class, 'viewupdate'])->name('viewupdateuser');
Route::put('/u/user/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('updateuser');