<?php

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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


Route::group([Authenticate::class], function(){
    if(Auth::check()) {
        if(session()->get(["token"] == "")){
            return redirect()->to('dashboard');
        }else{
            return redirect()->to('login');
        } 
    }
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('master', [HomeController::class, 'masterUser'])->name('master');
    Route::get('master/create', [HomeController::class, 'add'])->name('add');
    Route::get('master/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::post('master/create', [HomeController::class, 'store'])->name('store');
    Route::put('master/edit/{id}', [HomeController::class, 'editData'])->name('edit');
    Route::delete('master/user/{id}', [HomeController::class, 'destroy'])->name('delete');
});

// Auth
Route::post('loginApi', [LoginController::class, 'loginApi'])->name('loginApi');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



