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
<<<<<<< HEAD
Route::view('/visiteur','FrontEnd.home');
=======
Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});
>>>>>>> 0a71b7f431e5b255f3c7fda4fc540a21c5a50a0d
