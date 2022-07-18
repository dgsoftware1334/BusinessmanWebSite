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
use App\Models\Video;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\VerifyUser;
use Validator;

use App\Http\Requests\Validateurl;


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
        $user->dateInscription = Carbon::now();
        $old_date=Carbon::now();
        $daysToAdd = 15;
        $user->finEssai = $old_date->addDays($daysToAdd);
        $user->paye = 1;
        $user->period = $user->finEssai->diffInDays($user->dateInscription);
       
        $user->sacteur_id = 40;
       // $user->admin_id=1;
        $user->password = \Hash::make($request->password);


        if($request->file('file')){
        $file=$request->file; 
	      $filename=time().'.'.$file->getClientOriginalExtension();
		    $request->file->move('assests/images/files/',$filename);
		    $user->file=$filename; }
        $save = $user->save();
        $last_id = $user->id;
        $token = $last_id.hash('sha256',\Str::random(120));
        $verifyURL = route('user.verify',['token'=>$token, 'service'=>'Email_verification']);
        VerifyUser::create([
          'user_id' =>$last_id,
          'token' => $token,
        ]);
        $message ='Monsieur <b>'.$request->name.'</b>';
        $message.='Merci pour votre inscription, nous avons juste besoin de vérifier votre adresse mail pour compléter votre création de compte.';
        $mail_data = [ 
          'recipient'=>$request->email,
          'fromEmail' =>$request->email,
          'fromName' =>$request ->name,
          'subject' =>'Email Verification',
          'body' =>$message,
          'actionLink' =>$verifyURL,
        ];
        \Mail::send('layouts.emailtemplate', $mail_data, function($message) use ($mail_data){
          $message->to($mail_data['recipient'])
                  ->from($mail_data['fromEmail'], $mail_data['fromName'])
                  ->subject($mail_data['subject']);
        });

        if( $save ){
            toastr()->success(trans(key: 'msg_trans.success1'));

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
         if(Auth::guard('web')->user()->email_verified == 1)
         {
          
                  
                  $user= User::where('id','=',Auth::guard('web')->user()->id)->first();
                  if($user->period > 0){
                    $user->period =Carbon::parse($user->dateInscription)->diffInDays(Carbon::parse($user->finEssai), false);
                    $user->save();}
                    if($user->period == 0){
                  $user->paye=0;
                  $user->save();}
                
                
               return redirect()->route('user.home');
         }
         else{
          $login_user_id =Auth::guard('web')->user()->id;
          //token from table verify user
          $token = $login_user_id.hash('sha256',\Str::random(120));
          
          
          
          $verifyURL = route('user.verify',['token'=>$token, 'service'=>'Email_verification']);
          VerifyUser::create([
            'user_id' =>$login_user_id,
            'token' => $token,
          ]);
          $message ='Monsieur <b>'.$request->email.'</b>';
          $message.='Merci pour votre inscription, nous avons juste besoin de vérifier votre adresse mail pour compléter votre création de compte.';
          $mail_data = [ 
            'recipient'=>$request->email,
            'fromEmail' =>$request->email,
            'fromName' =>$request ->email,
            'subject' =>'Email Verification',
            'body' =>$message,
            'actionLink' =>$verifyURL,
          ];
          \Mail::send('layouts.emailtemplate', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
          });
          return redirect()->route('user.login')->with('fail','verifié votre addresse mail');

         }
    }
    
    
    else{
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

 $secteurs = Secteur::orderBy('libelle', 'ASC')->get()->take(4);
$event= Event::orderBy('created_at','desc')->where('status',1)->take(1)->get();
$video = Video::where('show', '1')->get();
  //->orderBy('created_at','desc')


   return view ('FrontEnd.accueil',compact('publications','secteurs','event','video'));  
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
  $secteurs= Secteur::orderBy('libelle', 'ASC')->get();
$publication= Publication::find(1);
  $users= User::orderBy('created_at','desc')->where('status',0)->get();

      if(count($users)> 0)  {
        $vide="";
        $aucun="";
        return view ('FrontEnd.user.index',compact('users','secteurs','publication','chambres','vide','aucun'));

      }   
      else{
        $vide="La liste des hommes d'affaires est vide";
        $aucun="";
        return view ('FrontEnd.user.index',compact('users','secteurs','publication','chambres','vide','aucun'));
      }        
                       


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

  /*$users = User::where('users.name',$nom)->
  orwhere('users.name', 'LIKE', '%' . $nom . '%')->whereHas('secteur', function (Builder $query) use ($secteur) {
    $query->where('libelle', 'LIKE', '%' . $secteur . '%');
})
->orwhere('users.lastname', 'LIKE', '%' . $nom . '%')->
get();*/


 /* $users = User::where('name', 'LIKE', '%' . $nom . '%')->whereHas('secteur', function (Builder $query) use ($secteur) {
    $query->where('libelle', $secteur);
})*/


$users = User::
Where([
  ['name', 'LIKE', '%' . $nom . '%']])
->whereHas('secteur', function (Builder $query) use ($secteur,$nom) {
  $query->where('libelle', 'LIKE', '%' . $secteur . '%'); 

  
})



->orWhere([
  ['lastname', 'LIKE', '%' . $nom . '%']])
  ->whereHas('secteur', function (Builder $query) use ($secteur,$nom) {
    $query->where('libelle', 'LIKE', '%' . $secteur . '%');
    $query = User::where('lastname', 'LIKE', '%' . $nom . '%')->doesntHave('secteur');
  })

    

->orWhere([
  [DB::raw("CONCAT(users.lastname,' ',users.name)"), 'LIKE', '%' . $nom . '%']])
  ->whereHas('secteur', function (Builder $query) use ($secteur) {
    $query->where('libelle', 'LIKE', '%' . $secteur . '%');

})
->orWhere([
  [DB::raw("CONCAT(users.name,' ',users.lastname)"), 'LIKE', '%' . $nom . '%']])
  ->whereHas('secteur', function (Builder $query) use ($secteur) {
    $query->where('libelle', 'LIKE', '%' . $secteur . '%');
    
    
})

    
    


//->Where([['lastname', 'LIKE', '%' . $nom . '%']])
//->Where([['name', 'LIKE', '%' . $nom . '%']])
//->Where([[DB::raw("CONCAT(users.name,' ',users.lastname)"), 'LIKE', '%' . $nom . '%']])
//->Where([[DB::raw("CONCAT(users.lastname,' ',users.name)"), 'LIKE', '%' . $nom . '%']])



->
//->where('users.name',$nom)
//->orwhere('name', 'LIKE', '%' . $nom . '%')
//->orwhere('lastname', 'LIKE', '%' . $nom . '%')
//->orwhere(DB::raw("CONCAT(users.name,' ',users.lastname)"), 'LIKE', '%' . $nom . '%')
//->orwhere(DB::raw("CONCAT(users.lastname,' ',users.name)"), 'LIKE', '%' . $nom . '%')->
get();

  $secteurs= Secteur::all();
  $chambres= Chambre::all();
  if (count($users) > 0) {

    $aucun ="";
    $vide ="";
    return view('FrontEnd.user.index',compact('secteurs','users','chambres','aucun','vide'));
      }
      else {
        $aucun ="Aucun Résultat correspondant à votre recherche";
        $vide ="";
        return view('FrontEnd.user.index',compact('secteurs','users','chambres','aucun','vide'));
      }
    
    }
//------------------------------------------------------------------------------------
public function update_informationPro(Validateurl $request, $id)
{
 $user=User::find($id);
 $validated = $request->validated();

  if($request->file('photo')){
               $newImageName3 =time().'-'.$request->name.'.'.$request->photo->extension();
        $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
         $user->photo = $newImageName3;

           }
           if($request->file('file')){
            $file=$request->file; 
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('assests/images/files/',$filename);
            $user->file=$filename; }

    $user->lienfb=$request->lienfb;
   
   $user->lieninsta=$request->lieninsta;
   $user->lientwit=$request->lientwit;
   $user->linked=$request->linked;
   $user->diplome=$request->diplome;
   $user->siteweb=$request->siteweb;
   $user->anneexp=$request->anneexp;
   if($request->sacteur_id)
   $user->sacteur_id=$request->sacteur_id;
   else
   $user->sacteur_id=40;
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
public function showForgotForm(){
  
  return view('FrontEnd.user.forgot');
}
public function SendResetLink(Request $request){
  $request->validate([
    'email'=>'required|email|exists:users,email']);

    $token = \Str::random(64);
    \DB::table('password_resets')->insert([
      'email'=>$request ->email,
      'token' =>$token,
      'created_at'=>Carbon::now(),
    ]);
 $action_link =route('user.reset.password.form',['token' =>$token,'email'=>$request->email]);
 $body="We are received a request to reset the password for your <b>Algerian businessman web site</b>account with".$request->email.".you can reset your password by clicking the link below";
 \Mail::send('layouts.email-forgot',['action_link'=>$action_link,'body'=>$body],function($message) use($request){
   $message->from('eurlnewrezzagbusiness@gmail.com','algerian businnessman');
   $message->to($request->email,'eurlnewrezzagbusiness@gmail.com')
   ->subject('Reset password');
 });
 toastr()->success('Vérifier votre adresse email');
 return back()->with('success',"On vous a envoyé le lien de réinitialiser de mot de passe,vérifier votre email");
}
public function showResetForm(Request $request, $token = null){
 
  return view('FrontEnd.user.reset')->with(['token'=>$token,'email'=>$request->email]);
}

public function resetPassword(Request $request){
  $request->validate([
      'email'=>'required|email|exists:users,email',
      'password'=>'required|min:5|max:30',
      'cpassword'=>'required|min:5|max:30|same:password',
  ]);

  $check_token = \DB::table('password_resets')->where([
      'email'=>$request->email,
      'token'=>$request->token,
  ])->first();

  if(!$check_token){
      return back()->withInput()->with('fail', 'Invalid token');
  }else{

      User::where('email', $request->email)->update([
          'password'=>\Hash::make($request->password)
      ]);

      \DB::table('password_resets')->where([
          'email'=>$request->email
      ])->delete();
      toastr()->success('Votre mot de passe à été modifié');
      return redirect()->route('user.login')->with('info', 'Your password has been changed! You can login with new password')->with('verifiedEmail', $request->email);
  }
}


function verify(Request $request){
  $token = $request->token;
  $verifyUser = VerifyUser::where('token',$token)->first();
  if(!is_null($verifyUser)){
    $user = $verifyUser->user;

     if(!$user->email_verified){
       $verifyUser->user->email_verified = 1;
       $verifyUser->user->save();
       return redirect()->route('user.login')->with('info','Votre email a été vérifié correctement,Vous devez attendre la confirmation de l\'administrateur pour pouvoir vous connecter')->with('verifiedEmail',$user->email);
     } else{
       return redirect()->route('user.login')->with('info','Votre email est deja vérifier vous pouvez vous connectez')->with('verifiedEmail',$user->email);
     }
  }

}
/*function verify_login(Request $request){
  $token = $request->token;
  $verifyUser = VerifyUser::where('token',$token)->get();
  if(!is_null($verifyUser)){
    $user = $verifyUser->user;

     if(!$user->email_verified){
       $verifyUser->user->email_verified = 1;
       $verifyUser->user->save();
       return redirect()->route('user.login')->with('info','Votre email a été vérifié correctement,Vous devez attendre la confirmation de l\'administrateur pour pouvoir vous connecter')->with('verifiedEmail',$user->email);
     } else{
       return redirect()->route('user.login')->with('info','Votre email est deja vérifier vous pouvez vous connectez')->with('verifiedEmail',$user->email);
     }
  }

}*/
}


