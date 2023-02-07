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


// Admin, User Middleware
Route::group(['middleware' => 'roles', 'roles' => ['Admin', 'User']], function() {
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('users');
});

// Admin Middleware
Route::group(['middleware' => 'roles', 'roles' => ['Admin']], function() {
    Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('add');
    Route::post('/create', [App\Http\Controllers\AdminController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [App\Http\Controllers\AdminController::class, 'delete'])->name('delete');
});