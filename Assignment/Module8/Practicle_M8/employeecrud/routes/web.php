<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeecontroller;


/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', [employeecontroller::class,'index']);
Route::get('/', [employeecontroller::class,'index']);

Route::post('/index',[employeecontroller::class,'store']);
Route::get('/display',[employeecontroller::class,'show']);
Route::get('/display/{id}',[employeecontroller::class,'destory']);
Route::get('/editprofile/{id}',[employeeController::class,'edit']);
Route::post('/updateprofile/{id}',[employeeController::class,'update']);


