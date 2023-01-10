<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\_AuthController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/forgot-password', function () {
    return view('auth/login-forgot-password');
});

Route::get('/create-new-password', function () {
    return view('auth/login-create-new-password');
});

Route::get("/registration",function () {   
    return View("registration/registration");
});

Route::get("/admin/overview",function () {   
    return View("admin/overview");
});

Route::get("/admin/accounts",function () {   
    return View("admin/accounts");
});
Route::get("/admin/clubs",function () {   
    return View("admin/clubs");
});

Route::post('/registration', 'auth@register');

Route::get('/home', [HomeController::class, 'gethomeDetails']);

Route::get('/profile', [ProfileController::class, 'getprofileDetails']);

Route::get('/club', [ClubController::class, 'getclubDetails']);

Route::get('/search', [SearchController::class, 'getsearchDetails']);

Route::get('/overview', function () {
    return view('admin/overview');
});

Route::get('/users', function () {
    return view('admin/accounts');
});

Route::get('/clubs', function () {
    return view('admin/clubs');
});