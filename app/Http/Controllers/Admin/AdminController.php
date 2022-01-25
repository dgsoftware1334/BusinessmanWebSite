<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Models\Publication;

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
        //
        $user = User::find($id);
         $user->status = 0 ;
         $user->save(); 


       return redirect()->back()->with('user','vous avais active le compte de homme d affaire ');
    }

////////////////////parti publication 
/*public function index_publication()
{
  $publications= Publication::all();
  //->orderBy('created_at','desc')
   return view ('dashboard.publication.index',compact('publications'));  
}



public function create_publication()
{
   return view ('dashboard.publication.create');  
}*/


/*public function store_publication(Request $request)
{

  $publication= new Publication();
 
   if($request->file('image')){
     $newImageName3 =time().'-'.$request->context.'.'.$request->image->extension();
     $test3 =$request->image->move('assests/images/poblication',$newImageName3);
     $publication->image = $newImageName3;
                               }
     $publication->context = ['fr' => $request->context, 'ar' => $request->context_ar, 'en' => $request->context_en];
     $publication->contenu = ['fr' => $request->contenu, 'ar' => $request->contenu_ar, 'en' => $request->contenu_en];
     $publication->status = 1;
     $publication->save();
      return redirect('/admin/publication/create')->with('success','cette publicaiton sora publice');

 
}*/

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

    public function delete_commentair($id,$id1){

      $publication=Publication::find($id);
      foreach ($publication->users as $row ) {
          if($row->pivot->id == $id1){
             $row->pivot->delete();
          }
      }
     // return response()->json(['status'=>'event deleted succsefuly']);
      return back()->with('commtaire','le commentaire a été supprimé');



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

 public function active_commentaire(Publication $publication,Request $request,User $user ){
 $user = User::find($user->id);

     foreach ($user->publications as $publications) {
        if($publications->pivot->publication_id == $publication->id){
        
             $publications->pivot->is_valide =1 ;
            
              $publications->pivot->save();
             
               return redirect()->back()->with('active','Vous êtes maintenant active cette commentaire');
     
        
       }
    }


}



 public function desactive_commentaire(Publication $publication,Request $request,User $user ){
 $user = User::find($user->id);

     foreach ($user->publications as $publications) {
        if($publications->pivot->publication_id == $publication->id){
        
             $publications->pivot->is_valide =0 ;
            
              $publications->pivot->save();
             
               return redirect()->back()->with('deactive','Vous êtes maintenant deactive cette commentaire');
     
        
       }
    }


}


}
