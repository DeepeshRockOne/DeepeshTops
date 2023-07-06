<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

use App\Http\Controllers\contactController;
use App\Http\Controllers\webuserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\productController;
use Symfony\Component\Translation\PseudoLocalizationTranslator;

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

Route::get('/localization/{lang?}', function($lang = null){
    App::setLocale($lang);
    return view('website.localization');
});

Route::get('/register', [webuserController::class, 'index'])->middleware('userafterlogin');
Route::post('/insert_register', [webuserController::class, 'store'])->middleware('userafterlogin');

Route::get('/login', [webuserController::class, 'login'])->middleware('userafterlogin');
Route::post('/user_login_auth', [webuserController::class, 'userLoginAuth'])->middleware('userafterlogin');
Route::get('/user_logout', [webuserController::class, 'userLogout'])->middleware('userbeforelogin');

Route::get('/user_profile', [webuserController::class, 'userProfile'])->middleware('userbeforelogin');
Route::get('/user_profile/{editid}', [webuserController::class, 'editUserProfile'])->middleware('userbeforelogin');
Route::post('/update_user_profile/{editid}', [webuserController::class, 'updateUserProfile'])->middleware('userbeforelogin');

Route::get('/contact', [contactController::class, 'index']);
Route::post('/insert_contact', [contactController::class, 'store']);

/*--------------------------------*/

Route::group(['middleware'=>['adminafterlogin']], function(){
    Route::get('/admin_login', [adminController::class, 'index']);
    Route::post('/admin_login_auth', [adminController::class, 'adminLoginAuth']);
});

Route::group(['middleware'=>['adminbeforelogin']], function(){
    Route::get('/add_chef', function () {
        return view('admin.add_chef');
    });
    Route::get('/manage_chef', function () {
        return view('admin.manage_chef');
    });

    Route::get('/admin_dashboard', [adminController::class, 'adminDashboard']);
    Route::get('/admin_logout', [adminController::class, 'adminLogout']);

    Route::get('/display_contact', [contactController::class, 'displayContact']);
    Route::get('/display_contact/{delid}', [contactController::class, 'destroy']);
    
    Route::get('/manage_webuser', [webuserController::class, 'show']);
    Route::get('/manage_webuser/{delid}', [webuserController::class, 'destroy']);
    Route::get('/update_status_webuser/{statusid}', [webuserController::class, 'updateStatusWebuser']);

    Route::get('/add_category', [categorieController::class, 'index']);
    Route::post('/insert_category', [categorieController::class, 'store']);

    Route::get('/manage_category', [categorieController::class, 'manageCategory']);
    Route::get('/edit_category/{editid}', [categorieController::class, 'editCategory']);
    Route::post('/update_category/{editid}', [categorieController::class, 'updateCategory']);
    Route::get('/manage_category/{delid}', [categorieController::class, 'destroy']);

    Route::get('/add_product', [productController::class, 'index']);
    Route::post('/insert_product', [productController::class, 'store']);

    Route::get('/manage_product', [productController::class, 'manageProduct']);
    Route::get('/edit_product/{editid}', [productController::class, 'editProduct']);
    Route::get('/update_product/{editid}', [productController::class, 'updateProduct']);
    Route::get('/manage_product/{delid}', [productController::class, 'destroy']);

});

Route::get('/forms', function () {
    return view('admin.forms');
});