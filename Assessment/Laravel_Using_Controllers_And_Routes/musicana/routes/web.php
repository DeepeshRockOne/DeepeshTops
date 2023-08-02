<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongCategorieController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\WebuserController;

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

Route::get('/song_category', [SongCategorieController::class, 'viewSongCategory']);

Route::get('/song/{song_cat_id?}', [SongController::class, 'viewSong']);

Route::get('/user_registration', [WebuserController::class, 'index']);
Route::post('/user_registration', [WebuserController::class, 'store']);
Route::get('/user_login', [WebuserController::class, 'userLogin']);
Route::post('/user_login', [WebuserController::class, 'userLoginAuth']);
Route::get('/user_logout', [WebuserController::class, 'userLogout']);
Route::get('/user_profile', [WebuserController::class, 'userProfile']);
Route::get('/user_profile/{editid}', [WebuserController::class, 'editUser']);
Route::post('/user_profile/{editid}', [WebuserController::class, 'updateUser']);
Route::get('/user_forgot_password', [WebuserController::class, 'userForgotPassword']);

Route::get('/', function () {
    return view('website.index');
});
Route::get('/index', function () {
    return view('website.index');
});
Route::get('/about', function () {
    return view('website.about');
});
Route::get('/contact', function () {
    return view('website.contact');
});
Route::get('/single_blog', function () {
    return view('website.single_blog');
});


/*----------------------------------------------------------*/

Route::get('/admin_login', [AdminController::class, 'index']);
Route::post('/admin_auth', [AdminController::class, 'adminLoginAuth']);
Route::get('/admin_logout', [AdminController::class, 'adminLogout']);
Route::get('/admin_dashboard', [AdminController::class, 'show']);
Route::get('/admin_profile', [AdminController::class, 'adminProfile']);

Route::get('/add_songCategory', [SongCategorieController::class, 'index']);
Route::post('/add_songCategory', [SongCategorieController::class, 'store']);
Route::get('/manage_songCategory', [SongCategorieController::class, 'show']);
Route::get('/manage_songCategory/{editid}', [SongCategorieController::class, 'edit']);
Route::post('/manage_songCategory/{editid}', [SongCategorieController::class, 'update']);
Route::get('/delete_songCategory/{deleteid}', [SongCategorieController::class, 'destroy']);

Route::get('/add_song', [SongController::class, 'index']);
Route::post('/add_song', [SongController::class, 'store']);
Route::get('/manage_song', [SongController::class, 'show']);
Route::get('/manage_song/{editid}', [SongController::class, 'edit']);
Route::post('/manage_song/{editid}', [SongController::class, 'update']);
Route::get('/delete_song/{deleteid}', [SongController::class, 'destroy']);

Route::get('/user_details', [WebuserController::class, 'show']);
Route::get('/update_user_status/{id}', [WebuserController::class, 'updateUserStatus']);
Route::get('/delete_user/{deleteid}', [WebuserController::class, 'destroy']);

Route::get('/blank', function () {
    return view('admin.blank');
});
