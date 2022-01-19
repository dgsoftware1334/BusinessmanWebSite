<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;

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




Auth::routes();
<<<<<<< HEAD
Route::get('/', function () {
    return view('FrontEnd.accueil');
});
=======
  Route::view('/','FrontEnd.accueil')->name('home');
>>>>>>> 06d4436c47923d386e65027dce4ad3b95ce0f03b

//-----------------------route pour user------------
Route::prefix('user')->name('user.')->group(function(){
    route::middleware(['guest:web','PreventBackHistory'])->group(function(){
       
        Route::view('/login','FrontEnd.user.login')->name('login');
        Route::view('/register','FrontEnd.user.register')->name('register');
        Route::post('create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');


    });
    route::middleware(['auth:web','PreventBackHistory'])->group(function(){
      Route::view('/','FrontEnd.accueil')->name('home');
      Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });

});

//-------------------------route pour l'admin-----------------------
Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });


    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.dashboard')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});



Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



