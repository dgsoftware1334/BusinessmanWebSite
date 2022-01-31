<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Secteur\SecteurController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Pub\PublicationController;
use App\Http\Controllers\Chambre\ChambreController;
use App\Http\Controllers\Fondateur\FondateurController;
use App\Http\Controllers\Businessmans\BusinessmansController;


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


     // Route::view('/about','FrontEnd.about')->name('about');
      
     
     
      //-----------------------route pour visiteur------------

      Route::get('/',[UserController::class, 'Accueil'])->name('home');
      Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
      Route::get('/listEvent',[EventController::class, 'liste_event'])->name('listEvent');
      Route::get('about',[ChambreController::class, 'about'])->name('about');

     Route::get('/publications/',[UserController::class, 'list_publicaiton'])->name('list.publicaiton');
       


   
    Route::get('/show/{id}',[UserController::class, 'show']);
    //Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
    //------all users--------
    Route::get('/businessmans',[UserController::class, 'index'])->name('index.user');
    Route::post('/search', [UserController::class, 'search'])->name('search');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');

    Route::get('/contectUs/',[UserController::class, 'contact_us'])->name('contactus');

   Route::get('/secteur/{id}',[UserController::class, 'show_secteur'])->name('show.secteur');




    
  Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
  Route::get('/publication/visiteur/{id}',[UserController::class, 'page_publicaiton_visiteur'])->name('publicaiton.visiteur');
     // Route::get('/search/user',[UserController::class, 'search'])->name('search.user');


      //-----------------------route pour user------------------------------------------------------------

        Route::prefix('user')->name('user.')->group(function(){
          route::middleware(['guest:web','PreventBackHistory','isUser'])->group(function(){
              Route::view('/login','FrontEnd.user.login')->name('login');
              Route::view('/register','FrontEnd.user.register')->name('register');
              Route::post('create',[UserController::class,'create'])->name('create');
              Route::post('/check',[UserController::class,'check'])->name('check');

          });
          route::middleware(['auth:web','PreventBackHistory','isUser'])->group(function(){
           Route::get('/',[UserController::class, 'Accueil'])->name('home');


          // Route::view('/profile','FrontEnd.user.profile')->name('home');
            Route::get('/profile',[UserController::class, 'profile'])->name('home');

        
          Route::get('/show/{id}',[UserController::class, 'show']);
           Route::get('/businessmans',[UserController::class, 'index'])->name('index.user');


          Route::post('/profile/informationProfessional/{id}',[UserController::class, 'update_informationPro'])->name('update.informationPro');
          Route::post('/profile/informationParsonelle/{id}',[UserController::class, 'update_informationPar'])->name('update.informationPar');


            //////////publicaiton
      
            //Route::view('/publications','FrontEnd.listPublication')->name('publication');


            Route::get('/publications/',[UserController::class, 'list_publicaiton'])->name('list.publicaiton');


            Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
        
            Route::post('/publication/commentair/{publication}/{user}',[UserController::class, 'commentair'])->name('review.publication');
          

            Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
            Route::post('/logout',[UserController::class,'logout'])->name('logout');


               Route::post('/logout',[UserController::class,'logout'])->name('logout');

               Route::post('/logout',[UserController::class,'logout'])->name('logout');



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
       //----- mise à jours et desactive et active user dans la partir de l'administrateur-------
       Route::get('/user/desactive/{id}',[AdminController::class, 'deactive'])->name('deactive');
       Route::get('/user/active/{id}',[AdminController::class, 'active'])->name('deactive');

        // Route::view('/user/create','dashboard.user.create')->name('user.create');
        Route::get('/user/create',[BusinessmansController::class,'index'])->name('user');

        Route::post('/user/store',[BusinessmansController::class,'create'])->name('user.store');
        Route::get('/user/delete/{id}',[BusinessmansController::class,'delete'])->name('user.delete');
      Route::get('/user/show/{id}',[BusinessmansController::class,'show'])->name('user.show');
      Route::get('/user/edit/{id}',[BusinessmansController::class,'edit'])->name('user.edit');
      Route::post('/user/update/{id}',[BusinessmansController::class,'update'])->name('user.update');



       //----------Gestion des publication-------------------------------

       Route::get('/publication/index',[PublicationController::class, 'index_publication'])->name('index_publication');
       Route::post('/publication/store',[PublicationController::class, 'store_publication'])->name('store.publication');
       Route::get('/publication/create',[PublicationController::class, 'create_publication'])->name('create_publication');
       Route::post('/publication/edite',[PublicationController::class, 'update_publication'])->name('edite_publication');
       Route::delete('/publication/delete',[PublicationController::class, 'delete_publication'])->name('delete_publication');


       //-----desactive et active publication dans la partir de l'administrateur-------
       Route::get('/publication/desactive/{id}',[AdminController::class, 'deactive_publication'])->name('deactive_publication');
       Route::get('/publication/active/{id}',[AdminController::class, 'active_publication'])->name('active_publication');
       Route::get('/publication/show/{id}',[AdminController::class, 'show_publication'])->name('show_publication');
       Route::get('/commentair/delete/{id}/{id2}',[AdminController::class, 'delete_commentair'])->name('delete_commentair');
       Route::get('/commentair/active/{publication}/{user}',[AdminController::class, 'active_commentaire'])->name('active.active');
       Route::get('/commentair/desactive/{publication}/{user}',[AdminController::class, 'desactive_commentaire'])->name('active.deactive');

       //Route::post('/publication/store',[AdminController::class, 'store_publication'])->name('store.publication');
      //------------fondateur-----------------
        Route::get('/fondateur',[FondateurController::class, 'index_fondateur'])->name('index.fondateur');
        //Route::post('/fondateur/store',[FondateurController::class, 'store_fondateur'])->name('store.fondateur');
        Route::post('/fondateur/store',[FondateurController::class, 'store_fondateur'])->name('store.fondateur');
        Route::post('/fondateur/update/{id}',[FondateurController::class, 'update_fondateur'])->name('update.fondateur');
         Route::get('/fondateur/delete/{id}',[FondateurController::class,'delete'])->name('fondateur.delete');

      
       //------------------------------gestion des evenement ---------------------------------------------
       Route::get('/events',[EventController::class, 'index'])->name('events');
       Route::post('/createEvent',[EventController::class, 'createEven'])->name('createEven');
       Route::post('/updateEvent',[EventController::class, 'updateEvent'])->name('updateEvent');
       Route::delete('/destroyEvent',[EventController::class, 'destroyEvent'])->name('destroyEvent');

        Route::get('/Event/desactive/{id}',[AdminController::class, 'deactive_Event'])->name('deactive_event');
       Route::get('/Event/active/{id}',[AdminController::class, 'active_Event'])->name('active_event');

       //---------------------------------information chambre---------------------
       Route::get('/chambre/create',[ChambreController::class, 'create_chambre'])->name('create_chambre');
       Route::post('/chambre/store',[ChambreController::class, 'store_chambre'])->name('store.chambre');
       Route::get('/chambre/index',[ChambreController::class, 'index_chambre'])->name('index_chambre');
       Route::get('/chambre/show/{id}',[ChambreController::class, 'show_chambre'])->name('show_chambre');
       Route::post('/chambre/update',[ChambreController::class, 'update_chambre'])->name('update_chambre');



       

    });

});



Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



