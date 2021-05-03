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
   return redirect('login');
});

Auth::routes();
/**
 *----------------------------- 
 * PREFIJOS DEL PANEL ADMIN
 *-----------------------------  
 **/ 
Route::prefix('admin')->group(function () {
    Route::resource('administrador',App\Http\Controllers\AdminController::class)->names('admin.administardor');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/categoria',App\Http\Controllers\CategoriaController::class)->names('admin.categoria');
    Route::resource('/receta',App\Http\Controllers\RecetaController::class)->names('admin.receta');
    Route::resource('/product',App\Http\Controllers\ProductController::class)->names('admin.product');
});