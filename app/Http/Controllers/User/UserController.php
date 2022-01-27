<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatUserRequest;
use App\Http\Requests\CheckUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publication;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Builder;


class UserController extends Controller
{
    function create(CreatUserRequest $request){
      
        $validated = $request->validated();

        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->datenaissance = $request->datenaissance;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->email = $request->email;
       // $user->admin_id=1;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if( $save ){
            toastr()->success(trans(key: 'msg_trans.success'));

            return redirect()->back();
            //return redirect()->back()->with('success','Vous êtes maintenant enregistré avec succès mais vous devez attendre la validation de votre compte');
        }else{
           // return redirect()->back()->with('fail','Quelque chose s est mal passé, échec de l enregistrement');
           
        toastr()->error(trans(key: 'msg_trans.fail'));

        return back();

        }
  }

  function check(CheckUserRequest $request){
    //Validate inputs
    
    $validated = $request->validated();

    $creds = $request->only('email','password');
    if(Auth::guard('web')->attempt($creds)){
        return redirect()->route('user.home');
    }else{
        toastr()->error(trans(key: 'msg_trans.fail'));
        return redirect()->route('user.login');
        //return redirect()->route('user.login')->with('fail','Incorrect credentials');
    }
}
function logout(){
    Auth::guard('web')->logout();
    return redirect('/');
}



public function Accueil()
{
 $publications= Publication::orderBy('created_at','desc')->get();
 //$users = User::where('status',0)->get();
 //$users= User::orderBy('created_at','desc')->get();

 $secteurs = Secteur::all();
  //->orderBy('created_at','desc')
   return view ('FrontEnd.accueil',compact('publications','secteurs'));  
}

//////////information profile////
public function profile(){
  $secteurs= Secteur::all();
  return view ('FrontEnd.user.profile',compact('secteurs'));
}

public function show($id){
 
  $user= User::find($id);
   $secteurs= Secteur::all();
  return view ('FrontEnd.user.show',compact('secteurs','user'));
}


public function index(){

   
  $secteurs= Secteur::all();
$publication= Publication::find(1);
  $users= User::orderBy('created_at','desc')->get();

                   
                       

  return view ('FrontEnd.user.index',compact('users','secteurs','publication'));
}


<<<<<<< HEAD
=======
//--------------------------------------------------------search method------------------------------------------------
public function search(Request $request)
{
    $sec  = $request->secteur;
    $q = $request->nom;


    $users = User::where('name', 'LIKE', '%' . $q . '%')->whereHas('secteur', function (Builder $query) use ($sec) {
      $query->where('libelle', 'LIKE', '%' . $sec . '%');
  })->get();

  

  $secteurs= Secteur::all();
  
   

    if (count($users) > 0) {

        return view('FrontEnd.user.index',compact('secteurs','users',))->withDetails($users)->withQuery($q)->withLocations($secteurs);
    } else {
        return view('FrontEnd.user.index',compact('secteurs','users'))->withMessage('error il n existe pas d homme d affaire !')->withLocations($secteurs)->withQuery($q);
    }
    //dd($request->text);
}
//------------------------------------------------------------------------------------
>>>>>>> 19763dd0ddf7c2fcb106fb6ee47218548c687d8a
public function update_informationPro(Request $request, $id)
{
 $user=User::find($id);
  if($request->file('photo')){
               $newImageName3 =time().'-'.$request->name.'.'.$request->photo->extension();
        $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
         $user->photo = $newImageName3;

           }

    $user->lienfb=$request->lienfb;
   
   $user->lieninsta=$request->lieninsta;
   $user->lientwit=$request->lientwit;
   $user->linked=$request->linked;
   $user->diplome=$request->diplome;
   $user->siteweb=$request->siteweb;
   $user->anneexp=$request->anneexp;
   $user->sacteur_id=$request->sacteur_id;
   //

   $user->save();

return redirect()->back();
}



public function update_informationPar(Request $request, $id)
{
        $user=User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->datenaissance = $request->datenaissance;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->email = $request->email;

        $user->save();

return redirect()->back();
}


/////////////////publicaiton/////////////////////////////////////////
public function list_publicaiton(){
  $publications= Publication::orderBy('updated_at','desc')->paginate(4);
  return view('FrontEnd.listPublication',compact('publications'));
}

public function page_publicaiton($id)
{
 $publication= Publication::find($id);
  //->orderBy('created_at','desc')
 ///dd('publication');


   return view ('FrontEnd.publication',compact('publication'));  
}



//////commentaire


public function commentair(Publication $publication,Request $request,User $user ){
  //$user = User::find($user->id);
  //    foreach ($user->publications as $publications) {
  //      if($publications->pivot->publication_id == $publication->id){
        
  //           $publications->pivot->contenu = $request->contenu ;
  //          $publications->pivot->is_valide = 0 ;
       //       $publications->pivot->save();
  //           
  //             return redirect()->back()->with('valide','Vous êtes maintenant //enregistré avec succès');
        
       //}
   //}
      Auth::guard('web')->user()->publications()->attach($publication, ['contenu' => $request->contenu ,'is_valide' => 0]);
   return back();
     
}




}
