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

Route::get('/', function () {
    return view('website.index');
});
Route::get('/index', function () {
    return view('website.index');
});
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/single', function () {
    return view('website.single');
});
Route::get('/menu', function () {
    return view('website.menu');
});
Route::get('/register', function () {
    return view('website.register');
});
Route::get('/login', function () {
    return view('website.login');
});
Route::get('/contact', function () {
    return view('website.contact');
});

/***************************************/

Route::get('/admin_login', function () {
    return view('admin.admin_login');
});
Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard');
});
Route::get('/add_category', function () {
    return view('admin.add_category');
});
Route::get('/add_product', function () {
    return view('admin.add_product');
});
Route::get('/display_contact', function () {
    return view('admin.display_contact');
});
Route::get('/manage_category', function () {
    return view('admin.manage_category');
});
Route::get('/manage_product', function () {
    return view('admin.manage_product');
});
Route::get('/manage_webuser', function () {
    return view('admin.manage_webuser');
});
Route::get('/blank', function () {
    return view('admin.blank');
});