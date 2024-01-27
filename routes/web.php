<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [LoginController::class, 'loginView'] );
Route::post('/', [LoginController::class, 'loginAction']);

Route::get('/home', [HomeController::class, 'homeView']);

Route::get('/logout', [LoginController::class, 'logout']);

route::get('register', [LoginController::class, 'registView']);
route::post('/register', [LoginController::class, 'regist']);

