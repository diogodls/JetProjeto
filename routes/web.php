<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\UsersController;


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




Route::get('login', [UsersController::class, 'index'])->name('login');
Route::post('login', [UsersController::class, 'loginUser']);

Route::post('register', [UsersController::class, 'registerUser']);

Route::get('logout', [UsersController::class, 'logout']);

Auth::routes();


Route::get('/', [HomeController::class, 'index'])->name('home');