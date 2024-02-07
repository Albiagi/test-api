<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('master', [HomeController::class, 'masterUser'])->name('master');
Route::get('master/create', [HomeController::class, 'add'])->name('add');
Route::get('master/edit', [HomeController::class, 'edit'])->name('edit');
Route::post('master/create', [HomeController::class, 'store'])->name('store');
Route::put('master/edit/{id}', [HomeController::class, 'editData'])->name('edit');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('loginApi', [LoginController::class, 'loginApi'])->name('loginApi');
