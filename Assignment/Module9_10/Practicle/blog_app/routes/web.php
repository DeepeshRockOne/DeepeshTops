<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BloguserController;

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

Route::get('/', [BlogController::class, 'index']);
Route::get('/index', [BlogController::class, 'index']);
Route::post('/add_blog', [BlogController::class, 'store']);
Route::get('/view_blogs', [BlogController::class, 'show']);
Route::get('/edit_blog/{id}', [BlogController::class, 'edit']);
Route::post('/update_blog/{id}', [BlogController::class, 'update']);
Route::get('/delete_blog/{id}', [BlogController::class, 'destroy']);

Route::get('/registration', [BloguserController::class, 'index']);
Route::post('/register', [BloguserController::class, 'store']);
Route::get('/login', [BloguserController::class, 'login']);
Route::post('/login_auth', [BloguserController::class, 'loginAuth']);
Route::get('/logout', [BloguserController::class, 'logout']);
