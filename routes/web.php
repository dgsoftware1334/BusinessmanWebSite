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


Route::get('/', function () {
   $publications=  App\Models\Publication::all();
  //->orderBy('created_at','desc')
   return view ('FrontEnd.accueil',compact('publications'));  
   
});


  //Route::view('/','FrontEnd.accueil')->name('home');



  



  ##############################Les routes concerné par la localization####################################
  Route::group(
    [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

      Route::view('/','FrontEnd.accueil')->name('home');
      //-----------------------route pour user------------
        Route::prefix('user')->name('user.')->group(function(){
          route::middleware(['guest:web','PreventBackHistory','isUser'])->group(function(){
             
              Route::view('/login','FrontEnd.user.login')->name('login');
              Route::view('/register','FrontEnd.user.register')->name('register');
              Route::post('create',[UserController::class,'create'])->name('create');
              Route::post('/check',[UserController::class,'check'])->name('check');
            
      
          });
          route::middleware(['auth:web','PreventBackHistory','isUser'])->group(function(){
            Route::view('/','FrontEnd.accueil')->name('home');
              Route::view('/profile','FrontEnd.user.profile')->name('home');
      
      
            Route::post('/logout',[UserController::class,'logout'])->name('logout');
          });
      
      });

    });

    route::middleware(['auth:web','PreventBackHistory','isUser'])->group(function(){
       Route::get('/',[UserController::class, 'home'])->name('home');
       Route::view('/profile','FrontEnd.user.profile')->name('home');

      ///////ajouter commentair/////////
        Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
        
        Route::post('/publication/commentair/{publication}/{user}',[UserController::class, 'commentair'])->name('review.publication');



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
       Route::get('/index',[AdminController::class, 'index'])->name('index');
       //-----desactive et active user dans la partir de l'administrateur-------
       Route::get('/user/desactive/{id}',[AdminController::class, 'deactive'])->name('deactive');
       Route::get('/user/active/{id}',[AdminController::class, 'active'])->name('deactive');
////------------ajouter/modifier/supprimer/  publication----------------S
        Route::get('/publication/index',[AdminController::class, 'index_publication'])->name('index_publication');
       Route::get('/publication/create',[AdminController::class, 'create_publication'])->name('create_publication');

       Route::post('/publication/store',[AdminController::class, 'store_publication'])->name('store.publication');


    });

});





Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



