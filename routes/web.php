<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthCheck;
use GuzzleHttp\Middleware;

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

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::middleware(AuthCheck::class)->group(function(){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

});
Route::get('master', [HomeController::class, 'masterUser'])->name('master');
Route::get('master/create', [HomeController::class, 'add'])->name('add');
Route::get('master/edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('master/create', [HomeController::class, 'store'])->name('store');
Route::put('master/edit/{id}', [HomeController::class, 'editData'])->name('edit');
Route::delete('master/user/{id}', [HomeController::class, 'destroy'])->name('delete');
// Auth
Route::post('loginApi', [LoginController::class, 'loginApi'])->name('loginApi');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

