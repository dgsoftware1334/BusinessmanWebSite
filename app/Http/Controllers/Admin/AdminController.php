<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Publication;
use App\Models\Fondateur;
use App\Models\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\Validation;


class AdminController extends Controller
{
    function check(Request $request){
        //Validate Inputs
        $request->validate([
           'email'=>'required|email|exists:admins,email',
           'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email is not exists in admins table'
        ]);

        $creds = $request->only('email','password');

        if( Auth::guard('admin')->attempt($creds) ){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Incorrect credentials');
        }
   }
   function logout(){
    Auth::guard('admin')->logout();
    return redirect('/');
}
//index user
///////////////////////////////////parti user//////////////////////////////////////////////////
function index(Request $request){    
   $users = User::all();
   return view ('dashboard.user.index',compact('users'));      
   }
public function deactive($id)
    {
         $user = User::find($id);
         $user->status = 1 ;
         $user->save(); 

       return back();
    }

 public function active($id)
    {
        
        
      
        $user = User::find($id);
         $user->status = 0 ;

         $user->save(); 
          $details=[
           'name' => $user->name,
           'lastname' => $user->lastname,
           
                 ];
   Mail::to($user->email)->send(new Validation($details));
  



       return redirect()->back()->with('user','vous avais active le compte de homme d affaire ');
    }



public function edite_publication(Request $request, $id)
{
 $publication=Publication::find($id);
  if($request->file('image')){
        $newImageName3 =time().'-'.$request->name.'.'.$request->image->extension();
        $test3 =$request->image->move('assests/images/poblication/',$newImageName3);
         $publication->image = $newImageName3;
     
           }

   $publication->context = $request->context;
     $publication->contenu = $request->contenu;
     $publication->admin_id = Auth::guard('admin')->user()->id;
  
   //

   $publication->save();

return redirect()->back();
}

public function show_publication($id){
 $publications=Publication::find($id);
 $commentairs =$publications->users();
 return view ('dashboard.publication.show',compact('publications')); 
 //dd($commentairs);
}
 public function delete_publication($id){

      $publication=Publication::find($id);
      $publication->delete();
     // return response()->json(['status'=>'event deleted succsefuly']);
      return back()->with('supprimer','la publication a été supprimé');



    }

    public function delete_c($idp,$idpb,$idu){
      //return $id3;
      $publication=Publication::find($idpb);
      $user=User::find($idu);
      $com=$publication->users()->wherePivot('id','=',$idp)->wherePivot('publication_id','=',$idpb)->wherePivot('user_id','=',$idu)->detach();

     // foreach ($publication->users as $row ) {
      //    if($row->pivot->id == $id1 && $publications->pivot->id == $id3){
      //       $row->pivot->delete();
      //    }
      //}
     // return response()->json(['status'=>'event deleted succsefuly']);
      return back()->with('commtaire','le commentaire a été supprimé');

      //Auth::guard('web')->user()->events()->where('event_id' ,$event)->detach($event);



    }


    public function deactive_publication($id)
    {
         $publication = Publication::find($id);
         $publication->status = 1 ;
         $publication->save(); 

       return back();
    }

 public function active_publication($id)
    {
        //
        $publication = Publication::find($id);
         $publication->status = 0 ;
         $publication->save(); 


       return redirect()->back()->with('user','vous avais active la publication');
    }

 public function active_commentaire(Publication $publication,Request $request,User $user,$id ){
 $user = User::find($user->id);

     foreach ($user->publications as $publications) {
        if($publications->pivot->publication_id == $publication->id && $publications->pivot->id == $id){
        
             $publications->pivot->is_valide =1 ;
            
              $publications->pivot->save();
             
               return redirect()->back()->with('active','Vous êtes maintenant active cette commentaire');
     
        
       }
    }


}



 public function desactive_commentaire(Publication $publication,Request $request,User $user ,$id){
 $user = User::find($user->id);

     foreach ($user->publications as $publications) {
        if($publications->pivot->publication_id == $publication->id &&  $publications->pivot->id == $id){
        
             $publications->pivot->is_valide =0 ;
            
              $publications->pivot->save();
             
               return redirect()->back()->with('deactive','Vous êtes maintenant deactive cette commentaire');
     
        
       }
    }


} 
public function deactive_Event($id){

$event=Event::find($id);
 $event->status = 0 ;
  $event->save(); 
  
return redirect()->back();


}

public function active_Event($id){
  $event=Event::find($id);
 $event->status = 1 ;
  $event->save(); 
  return redirect()->back();
  
}

//-------fondateur-------//








}
