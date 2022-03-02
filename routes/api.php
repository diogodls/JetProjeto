<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ShirtsController;
use App\Http\Controllers\Api\UsersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/api', function (Request $request) {
    return $request->user();
});

Route::post('login', [UsersController::class, 'loginUser']);
Route::post('register', [UsersController::class, 'registerUser']);

Route::get('camisetas', [ShirtsController::class, 'index']);
Route::post('camisetas', [ShirtsController::class, 'createShirt']);
Route::get('camiseta/{id}', [ShirtsController::class, 'seeShirt']);
Route::put('camiseta/{id}', [ShirtsController::class, 'editShirt']);
Route::delete('camiseta/{id}', [ShirtsController::class, 'destroy']);

Route::get('users', [UsersController::class, 'index']);
Route::get('user/{id}', [UsersController::class, 'getEdit']);
Route::put('user/{id}', [UsersController::class, 'edit']);
Route::delete('users/{id}', [UsersController::class, 'destroy']);

