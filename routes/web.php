<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalcAdd;
use App\Http\Controllers\groupController;
use App\Http\Controllers\arrController;
use App\Http\Controllers\xulyController;
use App\Http\Controllers\signupController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('tinhtong', function() {
//     return view('sum');
// });

// Route::post('tinhtong', [CalcAdd::class, 'tinhtong']);
// //Route::post('tinhtong', 'CalcAdd@tinhtong');

// Route::group(['prefix'=> 'welcome'], function() {
//     Route::get('/so1', [groupController::class, 'user1']);
//     Route::get('/so2', [groupController::class, 'user2']);
//     Route::get('/so3', [groupController::class, 'user3']);
// });

// Route::get('/vua', [arrController::class, 'getIndex']);

// Route::get('/form', [xulyController::class, 'store']);

// Route::get('/signup', [signupController::class, 'index']);
// Route::post('/signup', [signupController::class, 'displayInfor']);

Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/type/{id}', [PageController::class, 'getLoaiSp']);
Route::get('/detail/{id}', [PageController::class, 'getDetail']);
Route::get('/contact', [PageController::class, 'getContact']);
Route::get('/about', [PageController::class, 'getAbout']);

Route::get('loai-san-pham/{type}', [PageController::class, 'getLoaiSp']);

// ----------------------CART---------------------
Route::get('add-to-cart/{id}', [PageController::class, 'getAddToCart'])->name('themgiohang');
Route::get('del-cart/{id}', [PageController::class, 'getDelItemCart'])->name('xoagiohang');

// login register
Route::get('/register', function(){
    return view('users.register');
});
Route::get('/login', function(){
    return view('users.login');
});

Route::post('/register',[UserController::class, 'Register']);
Route::post('/login',[UserController::class, 'Login']);
Route::get('/logout',[UserController::class, 'Logout']);


