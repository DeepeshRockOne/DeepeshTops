<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GallerieController;

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

Route::get('/', [GallerieController::class, 'index']);
Route::post('/img_upload', [GallerieController::class, 'store']);
Route::get('/img_gallery', [GallerieController::class, 'show']);