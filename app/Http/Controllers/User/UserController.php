<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatUserRequest;
use App\Http\Requests\CheckUserRequest;
use App\Http\Requests\UpdateBusinessmanRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publication;
use App\Models\Secteur;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use App\Models\Chambre;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;




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
        if($request->file('file')){
        $file=$request->file; 
	      $filename=time().'.'.$file->getClientOriginalExtension();
		    $request->file->move('assests/images/files/',$filename);
		    $user->file=$filename; }
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
public function download(Request $request,$file)
{


  
return response()->download(public_path('assests/images/files/'.$file));

}


public function Accueil()
{
 $publications= Publication::orderBy('created_at','desc')->where('status',1)->take(4)->get();
 //$users = User::where('status',0)->get();
 //$users= User::orderBy('created_at','desc')->get();

 $secteurs = Secteur::all()->take(4);
$event= Event::orderBy('created_at','desc')->where('status',1)->take(1)->get();

  //->orderBy('created_at','desc')


   return view ('FrontEnd.accueil',compact('publications','secteurs','event'));  
}

//////////information profile////
public function profile(){
  $secteurs= Secteur::all();
  return view ('FrontEnd.user.profile',compact('secteurs'));
}

public function show($id){
 
  $user= User::Find($id);
   $secteurs= Secteur::all();
   if(!($user == null)){

         return view ('FrontEnd.user.show',compact('secteurs','user'));

   }else{
        
               return view ('FrontEnd.404');


         

   }


}


public function index(){

   $chambres= Chambre::all();
  $secteurs= Secteur::all();
$publication= Publication::find(1);
  $users= User::orderBy('created_at','desc')->where('status',0)->get();

                   
                       

  return view ('FrontEnd.user.index',compact('users','secteurs','publication','chambres'));
}




/*public function search(Request $request)
{
    $sec  = $request->secteur;
    $q = $request->nom;


    $users = User::where('name', 'LIKE', '%' . $q . '%')->whereHas('secteur', function (Builder $query) use ($sec) {
      $query->where('libelle', 'LIKE', '%' . $sec . '%');
  })->get();

  

  $secteurs= Secteur::all();
  $chambres= Chambre::all();
  
   

    if (count($users) > 0) {


        return view('FrontEnd.user.index',compact('secteurs','users','chambres'))->withDetails($users)->withQuery($q)->withLocations($secteurs);

        //return view('FrontEnd.user.index',compact('secteurs','users','chambres'))->withDetails($users)->withQuery($q)->withLocations($secteurs);
  
   // return view('FrontEnd.user.index',compact('secteurs','users','chambres'))->withDetails($users)->withQuery($q)->withLocations($secteurs);


    } else {
        return view('FrontEnd.user.index',compact('secteurs','users','chambres'))->withMessage('Erreur cet Homme d affaire est introuvable !')->withLocations($secteurs)->withQuery($q);
    }
    //dd($request->text);
}*/
/*--------------------------------------------------second search ------------------------*/
public function barrerecherche() {
  $nom=$_GET['nom'];
  $secteur=$_GET['secteur'];
 
  /*$users = DB::table('users')->join('secteurs', 'users.sacteur_id', '=', 'secteurs.id')
  ->where('users.name',$nom)
  ->orWhere('secteurs.libelle',$secteur)
  
  ->select('users.*')
  ->get();*/
  $users = User::where('users.name',$nom)
  ->orwhere('name', 'LIKE', '%' . $nom . '%')->whereHas('secteur', function (Builder $query) use ($secteur) {
    $query->where('libelle', 'LIKE', '%' . $secteur . '%');
})->get();

  $secteurs= Secteur::all();
  $chambres= Chambre::all();
  if (count($users) > 0) {

   
    return view('FrontEnd.user.index',compact('secteurs','users','chambres'));
      }
      else {
        return view('FrontEnd.user.index',compact('secteurs','users','chambres'));
      }
    
    }
//------------------------------------------------------------------------------------
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



public function update_informationPar(UpdateBusinessmanRequest $request, $id)
{
  $validated = $request->validated();
        $user=User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->datenaissance = $request->datenaissance;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password=Hash::make($request->new_password);

        $user->save();

return redirect()->back();
}


/////////////////publicaiton/////////////////////////////////////////
public function list_publicaiton(){
    $chambres= Chambre::all();

  $publications= Publication::orderBy('updated_at','desc')->where('status',1)->paginate(4);
  return view('FrontEnd.listPublication',compact('publications','chambres'));
}

public function page_publicaiton($id)
{
    $chambres= Chambre::all();

 $publication= Publication::find($id);
  //->orderBy('created_at','desc')
 ///dd('publication');


if(!($publication == null)){

return view ('FrontEnd.publication',compact('publication','chambres'));  
   }else{
        
   return view ('FrontEnd.404');


}


   
}



public function page_publicaiton_visiteur($id)
{
    $chambres= Chambre::all();

 $publication= Publication::find($id);
 
   return view ('FrontEnd.publication_visiteur',compact('publication','chambres'));  
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
       toastr()->success('Le commentaire a été ajouter! veuillez attendre la validation');
        return redirect()->back();
   
     
}


public function contact(){
     $chambres= Chambre::all();
  return  view ('FrontEnd.contact_us',compact('chambres'));
}


public function contact_us(Request $request){


  $name = $request->name;
  $email =  $request->email;
  $message= $request->message;
        $details=[
           'name' => $name,
           'email' => $email,
           'message'=>$message,

                 ];
  $admins=Admin::all();
  foreach($admins as $row) { 
   Mail::to($row->email)->send(new ContactUs($details));
  }
      
//  return back();
       return back();
}



public function show_secteur($id){
  $secteur=Secteur::find($id);
  $chambres= Chambre::all();
  $users= User::where('sacteur_id',$id)->where('status',0)->paginate(15);
    


if(!($secteur == null)){

return view ('FrontEnd.detail_secteur',compact('secteur','chambres','users'));
   }else{
        
               return view ('FrontEnd.404');


}
}
/********************** espace vip******************************************* */
public function vip(){
  //if(Auth::check() && Auth::guard('web')->user()->paye ==1)
  return view('FrontEnd.vip_cards');
 // else
 // return redirect()->back();

}

}
