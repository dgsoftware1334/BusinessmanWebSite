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
    return view('welcome');
});

Route::view('/visiteur','FrontEnd.home');

Route::view('/contactez-nous','FrontEnd.contact_us');

Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});

