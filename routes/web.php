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





  //Route::view('/','FrontEnd.accueil')->name('home');




  



  ##############################Les routes concerné par la localization####################################
  Route::group(
    [
      'prefix' => LaravelLocalization::setLocale(),
      'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

      //Route::view('/','FrontEnd.accueil')->name('home');
      Route::get('/', function () {
        $publications=  App\Models\Publication::all();
       //->orderBy('created_at','desc')
        return view ('FrontEnd.accueil',compact('publications'));  
        
     });
     
      Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
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
            ///////profile/////////
              Route::view('/profile','FrontEnd.user.profile')->name('home');
              Route::post('/profile/informationProfessional/{id}',[UserController::class, 'update_informationPro'])->name('update.informationPro');
              Route::post('/profile/informationParsonelle/{id}',[UserController::class, 'update_informationPar'])->name('update.informationPar');


            //////////publicaiton
      
            Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
        
            Route::post('/publication/commentair/{publication}/{user}',[UserController::class, 'commentair'])->name('review.publication');


            Route::post('/logout',[UserController::class,'logout'])->name('logout');
          });
      
      });

        route::middleware(['auth:web','PreventBackHistory','isUser'])->group(function(){
       Route::get('/',[UserController::class, 'home'])->name('home');
       Route::view('/profile','FrontEnd.user.profile')->name('home');

    
      ///////ajouter commentair/////////
        Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
        
        Route::post('/publication/commentair/{publication}/{user}',[UserController::class, 'commentair'])->name('review.publication');



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
       Route::get('/index',[AdminController::class, 'index'])->name('index');
       //------------------gestion des secteurs --------------
       Route::get('/secteur',[SecteurController::class, 'index'])->name('secteur');
       Route::post('/store',[SecteurController::class, 'store'])->name('store');
       Route::post('/update',[SecteurController::class, 'update'])->name('update');
       Route::delete('/destroy',[SecteurController::class, 'destroy'])->name('destroy');
       //-----desactive et active user dans la partir de l'administrateur-------
       Route::get('/user/desactive/{id}',[AdminController::class, 'deactive'])->name('deactive');
       Route::get('/user/active/{id}',[AdminController::class, 'active'])->name('deactive');
////------------ajouter/modifier/supprimer/  publication----------------S
        Route::get('/publication/index',[AdminController::class, 'index_publication'])->name('index_publication');
       Route::get('/publication/create',[AdminController::class, 'create_publication'])->name('create_publication');

         Route::post('/publication/edite/{id}',[AdminController::class, 'edite_publication'])->name('edite_publication');

         Route::post('/publication/delete/{id}',[AdminController::class, 'edite_publication'])->name('edite_publication');

            Route::get('/publication/delete/{id}',[AdminController::class, 'delete_publication'])->name('delete_publication');

            //-----desactive et active publication dans la partir de l'administrateur-------
       Route::get('/publication/desactive/{id}',[AdminController::class, 'deactive_publication'])->name('deactive_publication');
       Route::get('/publication/active/{id}',[AdminController::class, 'active_publication'])->name('active_publication');

       Route::get('/publication/show/{id}',[AdminController::class, 'show_publication'])->name('show_publication');
         Route::get('/commentair/delete/{id}/{id2}',[AdminController::class, 'delete_commentair'])->name('delete_commentair');

      ;
       Route::get('/commentair/active/{publication}/{user}',[AdminController::class, 'active_commentaire'])->name('active.active');

  Route::get('/commentair/desactive/{publication}/{user}',[AdminController::class, 'desactive_commentaire'])->name('active.deactive');


       Route::post('/publication/store',[AdminController::class, 'store_publication'])->name('store.publication');


    });

});





Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



