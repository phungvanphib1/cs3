<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserCotroller;
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



Route::get('login', [UserCotroller::class, 'viewLogin'])->name('login');
Route::post('handdle-login', [UserCotroller::class, 'login'])->name('handdle-login');


Route::get('register', [UserCotroller::class, 'viewRegister'])->name('register');
Route::post('handdle-register', [UserCotroller::class, 'Register'])->name('handdle-register');
Route::middleware(['auth','revalidate'])->group(function () {

    Route::get('dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('master', function () {return view('master');})->name('master');

    Route::post('logout', [UserCotroller::class, 'logout'])->name('logout');

    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/add', [CategoryController::class, 'create'])->name('category.add');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
    Route::get('product/display', [ProductController::class, 'display'])->name('product.display');
    Route::get('product/add', [ProductController::class, 'create'])->name('product.add');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');


});
