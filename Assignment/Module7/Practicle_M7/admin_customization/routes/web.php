<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard');
});
Route::get('/admin_login', function () {
    return view('admin.admin_login');
});
Route::get('/blank', function () {
    return view('admin.blank');
});
Route::get('/buttons', function () {
    return view('admin.buttons');
});
Route::get('/forms', function () {
    return view('admin.forms');
});
Route::get('/grid', function () {
    return view('admin.grid');
});
Route::get('/icons', function () {
    return view('admin.icons');
});
Route::get('/notifications', function () {
    return view('admin.notifications');
});
Route::get('/panels-wells', function () {
    return view('admin.panels-wells');
});
Route::get('/tables', function () {
    return view('admin.tables');
});
Route::get('/typography', function () {
    return view('admin.typography');
});