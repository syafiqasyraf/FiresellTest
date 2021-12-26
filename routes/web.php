<?php

use App\Models\Todos;
use App\Models\Users;
use App\Models\File_uploads;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\FileuploadController;


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

Route::get('/',[LoginController::class,'index']);

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/todos', TodolistController::class)->middleware('auth');
Route::resource('/dashboard/fileupload', FileuploadController::class)->middleware('auth');

Route::resource('/dashboard/users', AdminController::class)->except('show')->middleware('admin');