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
    return view('front.pages.home.index');
});

Route::get('/equipo', function () {
    return view('front.pages.about_us.index');
});

Route::get('/contacto', function () {
    return view('front.pages.contact.index');
});

Route::get('/blog', function () {
    return view('front.pages.blog.index');
});

Route::get('/login', function () {
    return view('front.pages.login.index');
});

Route::get('/admin/users', function () {
    return view('admin.pages.users.index');
});