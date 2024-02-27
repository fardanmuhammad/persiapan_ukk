<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisibilitasController;

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
//LOGIN
Route::get('/login', [LoginController::class, 'loginView'] );
Route::post('/login', [LoginController::class, 'loginAction']);

//BERANDA(GUEST)
Route::get('/', [HomeController::class, 'berandaview']);


//HOME
Route::get('/home', [HomeController::class, 'homeView']);

//logot
Route::get('/logout', [LoginController::class, 'logout']);

//regist
route::get('/register', [LoginController::class, 'registView']);
route::post('/register', [LoginController::class, 'regist']);

//profile
// route::get('/home', [ProfileController::class, 'tampilprofile']);
route::get('/profile', [ProfileController::class, 'profil']);

//albumview
Route::get('/album/{id_album}', [AlbumController::class, 'albumview']);

//album act
Route::post('/create-album', [AlbumController::class, 'direktory']);
Route::post('/addPhoto', [AlbumController::class, 'uploadfoto']);

//visibilitasview
Route::get('/private', [VisibilitasController::class, 'visibilitasPrivate']);
Route::get('/follower', [VisibilitasController::class, 'visibilitasFollower']);
Route::get('/public', [VisibilitasController::class,'visibilitasPublic']);