<?php

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


Route::post("/register-new-user",[_AuthController::class,"register"]);

Route::get('/home', function () {
    return view('app/homepage');
});

Route::get('/search', function () {
    return view('app/search');
});

Route::get('/profile', function () {
    return view('app/profilepage');
});