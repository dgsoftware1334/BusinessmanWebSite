<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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
    return view('FrontEnd.accueil');
});

/*Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::view('/visiteur','FrontEnd.home');*/
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//-----------------------route pour user------------
Route::prefix('user')->name('user.')->group(function(){
    route::middleware(['guest:web'])->group(function(){
        Route::view('/login','FrontEnd.user.login')->name('login');
        Route::view('/register','FrontEnd.user.register')->name('register');
        Route::post('create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');


    });
    route::middleware(['auth:web'])->group(function(){
      Route::view('/','FrontEnd.accueil')->name('home');
      Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});






Route::view('/visiteur','FrontEnd.home');

Route::view('/contactez-nous','FrontEnd.contact_us');

Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});

