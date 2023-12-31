<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index']);
Route::get('/result',[App\Http\Controllers\Frontend\ResultController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/admin/category', App\Http\Controllers\Admin\ResultCategoryController::class);
Route::resource('/admin/result', App\Http\Controllers\Admin\ResultController::class);
