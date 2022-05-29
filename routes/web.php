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
use App\Http\Controllers\Sujet\SujetController;
use App\Http\Controllers\Condition\ConditionController;
use App\Http\Controllers\Tender\TenderController;
use App\Http\Controllers\Code\CodeController;
use App\Http\Controllers\Video\VideoController;


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
      Route::get('/vip',[UserController::class, 'vip'])->name('vip');
      Route::view('/not/subscribed','FrontEnd.payer')->name('not.subscribed');
      Route::get('/secteurs',[SecteurController::class, 'liste'])->name('liste');
      Route::get('/search/secteur', [SecteurController::class, 'rechercher'])->name('search.secteur');
      Route::get('/listEvent',[EventController::class, 'liste_event'])->name('listEvent');
      Route::get('about',[ChambreController::class, 'about'])->name('about');
      Route::get('/sujets/visiteur',[SujetController::class, 'index_visit'])->name('sujet');
      Route::get('/sujets/details/visiteur/{id}',[SujetController::class, 'show_sujet_visit'])->name('show_sujet_visit');
     Route::get('/publications/',[PublicationController::class, 'list_publicaiton'])->name('list.publicaiton');
     Route::get('/search/publications/',[PublicationController::class, 'rechercher'])->name('search.publication');
       


   
    Route::get('/show/{id}',[UserController::class, 'show']);
    //Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
    //------all users--------
    Route::get('/businessmans',[UserController::class, 'index'])->name('index.user');
    //Route::post('/search', [UserController::class, 'search'])->name('search');
    Route::get('/search', [UserController::class, 'barrerecherche'])->name('search');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/videos',[VideoController::class, 'index_front'])->name('videos');
    Route::get('/contectUs/',[UserController::class, 'contact_us'])->name('contactus');
    Route::get('/condition/show',[ConditionController::class, 'show_condition_front'])->name('show_condition_front');
   Route::get('/secteur/{id}',[UserController::class, 'show_secteur'])->name('show.secteur');




    
  Route::get('/publication/{id}',[UserController::class, 'page_publicaiton'])->name('publicaiton');
  Route::get('/publication/visiteur/{id}',[UserController::class, 'page_publicaiton_visiteur'])->name('publicaiton.visiteur');
     // Route::get('/search/user',[UserController::class, 'search'])->name('search.user');
  Route::get('/event/{id}',[EventController::class, 'event_show'])->name('event.show');


      //-----------------------route pour user------------------------------------------------------------

        Route::prefix('user')->name('user.')->group(function(){
          route::middleware(['guest:web','PreventBackHistory','isUser'])->group(function(){
              Route::view('/login','FrontEnd.user.login')->name('login');
              Route::view('/register','FrontEnd.user.register')->name('register');
              Route::post('create',[UserController::class,'create'])->name('create');
              Route::post('/check',[UserController::class,'check'])->name('check');
              Route::get('/verify',[UserController::class,'verify'])->name('verify');
              //Route::get('/sujets',[SujetController::class, 'index'])->name('sujet');
              //--------------------------------------partie mot de passe oublier---------------------
              Route::get('/password/forgot',[UserController::class,'showForgotForm'])->name('forgot.password.form');
              Route::post('/password/forgot',[UserController::class,'SendResetLink'])->name('forgot.password.link');
              Route::get('/password/reset/{token}',[UserController::class,'showResetForm'])->name('reset.password.form');
              Route::post('/password/reset',[UserController::class,'resetPassword'])->name('reset.password');
          });
          route::middleware(['auth:web','is_user_verify_email','PreventBackHistory','isUser'])->group(function(){
            Route::post('/sujet/commentaire/{sujet}/{user}',[SujetController::class, 'commentaire'])->name('commentaire.sujet');
            Route::post('/sujet/signal',[SujetController::class, 'signal'])->name('signal.sujet');
            Route::get('/commentaire/delete/{idp}/{ids}/{idu}',[SujetController::class, 'delete_com'])->name('delete_com');
            Route::post('/commentaire/update/{idp}/{idu}/{ids}',[SujetController::class, 'updatecom'])->name('updatecom');
            Route::get('/sujet/destroy/{id}',[SujetController::class, 'destroy_sub'])->name('destroy');
           Route::get('/',[UserController::class, 'Accueil'])->name('home');
           Route::get('/sujets',[SujetController::class, 'index'])->name('sujet');
           Route::post('/sujet/create',[SujetController::class, 'store'])->name('store_sujet');
           Route::get('sujet/show/{id}',[SujetController::class, 'show_sujet']);
          // Route::view('/profile','FrontEnd.user.profile')->name('home');
            Route::get('/profile',[UserController::class, 'profile'])->name('home');
            Route::get('/download/{file}',[UserController::class,'download'])->name('down');
            Route::get('/tenders',[TenderController::class, 'index_front'])->name('tenders');
            Route::get('/codes',[CodeController::class, 'index_front'])->name('codes');
            Route::get('/tender/download/{doc}',[TenderController::class,'download'])->name('tender.download');
            Route::get('/search/offer', [TenderController::class, 'rechercher'])->name('search.offer');
          
            Route::get('/search/code', [CodeController::class, 'rechercher'])->name('search.code');
          
        
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
      Route::get('/register',[AdminController::class,'index_register'])->name('index_register');
      Route::post('/create_admin',[AdminController::class,'create_admin'])->name('create_admin');
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
          //------------------------------------------mot de passe oublier------------------------
       Route::get('/password/forgot',[AdminController::class,'showForgotForm'])->name('forgot.password.form');
       Route::post('/password/forgot',[AdminController::class,'SendResetLink'])->name('forgot.password.link');
       Route::get('/password/reset/{token}',[AdminController::class,'showResetForm'])->name('reset.password.form');
       Route::post('/password/reset',[AdminController::class,'resetPassword'])->name('reset.password');
    });


    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
       Route::view('/home','dashboard.admin.dashboard')->name('home');
       Route::post('/logout',[AdminController::class,'logout'])->name('logout');
       Route::get('/index',[AdminController::class, 'index'])->name('index');
       Route::get('/commentaire/delete/{idp}/{ids}/{idu}',[SujetController::class, 'delete_com'])->name('delete_com');
       //------------------gestion des secteurs --------------
       Route::get('/secteur',[SecteurController::class, 'index'])->name('secteur');
       Route::post('/store',[SecteurController::class, 'store'])->name('store');
       Route::post('/update',[SecteurController::class, 'update'])->name('update');
       //Route::delete('/destroy',[SecteurController::class, 'destroy'])->name('destroy');
       Route::get('/destroy/{id}',[SecteurController::class, 'destroy'])->name('destroy');
      // --------------------------------- gestion des sujets------------------------
      Route::get('/sujet',[SujetController::class, 'index_admin'])->name('sujets');
      Route::get('/sujet/destroy/{id}',[SujetController::class, 'destroy'])->name('destroy');
      Route::get('/sujet/destroy/motif/{id}',[SujetController::class, 'destroy_motif'])->name('destroy_motif');
       
       //----- mise à jours et desactive et active user dans la partir de l'administrateur-------
       Route::get('/user/desactive/{id}',[AdminController::class, 'deactive'])->name('deactive');
       Route::get('/user/active/{id}',[AdminController::class, 'active'])->name('deactive');

        // Route::view('/user/create','dashboard.user.create')->name('user.create');
        Route::get('/user/create',[BusinessmansController::class,'index'])->name('user');
        Route::post('/vip',[BusinessmansController::class,'vip'])->name('vip');
        Route::get('/download/{file}',[UserController::class,'download'])->name('down');
        Route::post('/user/store',[BusinessmansController::class,'create'])->name('user.store');
        Route::get('/user/delete/{id}',[BusinessmansController::class,'delete'])->name('user.delete');
        Route::get('/sujet/show/{id}',[SujetController::class,'show_com'])->name('sujet.show');
      Route::get('/user/show/{id}',[BusinessmansController::class,'show'])->name('user.show');
      Route::get('/user/edit/{id}',[BusinessmansController::class,'edit'])->name('user.edit');
      Route::post('/user/update/{id}',[BusinessmansController::class,'update'])->name('user.update');
      Route::get('/user/autorize/{id}',[BusinessmansController::class,'autoriser'])->name('user.autorize');


       //----------Gestion des publication-------------------------------

       Route::get('/publication/index',[PublicationController::class, 'index_publication'])->name('index_publication');
       Route::post('/publication/store',[PublicationController::class, 'store_publication'])->name('store.publication');
       Route::get('/publication/create',[PublicationController::class, 'create_publication'])->name('create_publication');
       Route::post('/publication/edite',[PublicationController::class, 'update_publication'])->name('edite_publication');
       Route::delete('/publication/delete',[PublicationController::class, 'delete_publication'])->name('delete_publication');
       
       Route::get('/publication/supprimer/{id}',[PublicationController::class, 'suprimer_publication'])->name('suprimer_publication');


       //-----desactive et active publication dans la partir de l'administrateur-------
       Route::get('/publication/desactive/{id}',[AdminController::class, 'deactive_publication'])->name('deactive_publication');
       Route::get('/publication/active/{id}',[AdminController::class, 'active_publication'])->name('active_publication');
       Route::get('/publication/show/{id}',[AdminController::class, 'show_publication'])->name('show_publication');

       Route::get('/commentair/delete/{idp}/{idpb}/{idu}',[AdminController::class, 'delete_c'])->name('delete_commentair');

       Route::get('/commentair/active/{publication}/{user}/{id}',[AdminController::class, 'active_commentaire'])->name('active.active');
       Route::get('/commentair/desactive/{publication}/{user}/{id}',[AdminController::class, 'desactive_commentaire'])->name('active.deactive');




       //Route::post('/publication/store',[AdminController::class, 'store_publication'])->name('store.publication');


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
       Route::get('/Event/supprimer/{id}',[EventController::class, 'suprimer_event'])->name('suprimer_event');

        Route::get('/Event/desactive/{id}',[AdminController::class, 'deactive_Event'])->name('deactive_event');
       Route::get('/Event/active/{id}',[AdminController::class, 'active_Event'])->name('active_event');

       //---------------------------------information chambre---------------------
       Route::get('/chambre/create',[ChambreController::class, 'create_chambre'])->name('create_chambre');
       Route::post('/chambre/store',[ChambreController::class, 'store_chambre'])->name('store.chambre');
       Route::get('/chambre/index',[ChambreController::class, 'index_chambre'])->name('index_chambre');
       Route::get('/chambre/show/{id}',[ChambreController::class, 'show_chambre'])->name('show_chambre');
       Route::post('/chambre/update',[ChambreController::class, 'update_chambre'])->name('update_chambre');
       //----------------------------------condition d utilisation ------------------
       Route::get('/condition/create',[ConditionController::class, 'create_condition'])->name('create_condition');
       Route::post('/condition/store',[ConditionController::class, 'store_condition'])->name('store.condition');
       Route::get('/condition/show',[ConditionController::class, 'show_condition'])->name('show_condition');
       
       Route::post('/condition/update',[ConditionController::class, 'update_condition'])->name('update_condition');
       //-----------------------------------gestion des appel doffre----------------------
       Route::get('/tender/index',[TenderController::class, 'index'])->name('tender.index');
       Route::get('/tender/create',[TenderController::class, 'create'])->name('tender.create');
       Route::post('/tender/store',[TenderController::class, 'store'])->name('tender.store');
       Route::get('/tender/download/{doc}',[TenderController::class,'download'])->name('tender.download');
       Route::get('/tender/edit/{id}',[TenderController::class,'edit'])->name('tender.edit');
       Route::post('/tender/update/{id}',[TenderController::class,'update'])->name('tender.update');
       Route::get('/tender/show/{id}',[TenderController::class,'show'])->name('tender.show');
       Route::get('/tender/delete/{id}',[TenderController::class,'delete'])->name('tender.delete');
       //--------------------------------------gestion des codes commerciaux de la chambre------------
       Route::get('/code/index',[CodeController::class, 'index'])->name('code.index');
       Route::post('/code/store',[CodeController::class, 'store'])->name('code.store');
       Route::post('/code/update',[CodeController::class, 'update'])->name('code.update');
       Route::get('/code/delete/{id}',[CodeController::class,'delete'])->name('code.delete');
     //----------------------------------------------gestion des videos publicitaires -----------------
     Route::get('/video/create',[VideoController::class, 'create'])->name('video.create');
     Route::get('/video/index',[VideoController::class, 'index'])->name('video.index');
     Route::post('/video/store',[VideoController::class, 'store'])->name('video.store');
     Route::get('/video/autorize/{id}',[VideoController::class, 'afficher_accueil'])->name('video.autorize');
     Route::get('/video/inautorize/{id}',[VideoController::class, 'enlever_accueil'])->name('video.inautorize');

       

    });

});



Route::get('/admin/dashboard', function () {
    return view('dashboard.dashboard');
});



