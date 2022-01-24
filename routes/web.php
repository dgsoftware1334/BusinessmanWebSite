<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Secteur\SecteurController;


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


  Route::view('/','FrontEnd.accueil')->name('home');




  



  ##############################Les routes concerné par la localization####################################
  Route::group(
    [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
      //------------------------------routes for both user and guest----------------------------------------

<<<<<<< HEAD
      //Route::view('/','FrontEnd.accueil')->name('home');
      Route::get('/', function () {
        $publications=  App\Models\Publication::all();
       //->orderBy('created_at','desc')
        return view ('FrontEnd.accueil',compact('publications'));  
        
     });
     
     
      //-----------------------route pour user------------
=======
      Route::get('/',[UserController::class, 'Accueil'])->name('home');
      Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
      //-----------------------route pour user------------------------------------------------------------
>>>>>>> 768e89875dbedd1fee0314a831a8ee5f456db6ab
        Route::prefix('user')->name('user.')->group(function(){
          route::middleware(['guest:web','PreventBackHistory','isUser'])->group(function(){
              Route::view('/login','FrontEnd.user.login')->name('login');
              Route::view('/register','FrontEnd.user.register')->name('register');
              Route::post('create',[UserController::class,'create'])->name('create');
              Route::post('/check',[UserController::class,'check'])->name('check');

          });
          route::middleware(['auth:web','PreventBackHistory','isUser'])->group(function(){
           
              Route::view('/profile','FrontEnd.user.profile')->name('home');
<<<<<<< HEAD
              Route::post('/profile/informationProfessional/{id}',[UserController::class, 'update_informationPro'])->name('update.informationPro');
              Route::post('/profile/informationParsonelle/{id}',[UserController::class, 'update_informationPar'])->name('update.informationPar');


            //////////publicaiton
      
            Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
        
            Route::post('/publication/commentair/{publication}/{user}',[UserController::class, 'commentair'])->name('review.publication');
          

            Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
            Route::post('/logout',[UserController::class,'logout'])->name('logout');
=======
               Route::post('/logout',[UserController::class,'logout'])->name('logout');
>>>>>>> 768e89875dbedd1fee0314a831a8ee5f456db6ab
          });
      
      });

    });










//-------------------------route pour l'admin------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });


    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
       Route::view('/home','dashboard.admin.dashboard')->name('home');
       Route::post('/logout',[AdminController::class,'logout'])->name('logout');
       Route::get('/index',[AdminController::class, 'index'])->name('index');
       //------------------gestion des secteurs --------------
       Route::get('/secteur',[SecteurController::class, 'index'])->name('secteur');
       Route::post('/store',[SecteurController::class, 'store'])->name('store');
       Route::post('/update',[SecteurController::class, 'update'])->name('update');
       Route::delete('/destroy',[SecteurController::class, 'destroy'])->name('destroy');
       //-----desactive et active user dans la partir de l'administrateur-------
       Route::get('/user/desactive/{id}',[AdminController::class, 'deactive'])->name('deactive');
       Route::get('/user/active/{id}',[AdminController::class, 'active'])->name('deactive');

    });

});



Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



