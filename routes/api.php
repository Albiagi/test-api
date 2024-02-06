<?php

use App\Http\Controllers\Api\DataApiController;
use App\Http\Controllers\Api\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('create/user', [LoginController::class, 'create']);

Route::get('data/list', [DataApiController::class, 'index']);
Route::get('data/user/{id}', [DataApiController::class, 'show']);
Route::get('search/{name}', [DataApiController::class, 'search']);
Route::post('data/create', [DataApiController::class, 'store']);
Route::put('data/user/{id}', [DataApiController::class, 'update']);
Route::delete('data/user/{id}', [DataApiController::class, 'destroy']);


Route::middleware('auth:api')->group(function(){
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('user/list', [LoginController::class, 'details']);
});
