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
public function index_publication()
{
  $publications= Publication::all();
  //->orderBy('created_at','desc')
   return view ('dashboard.publication.index',compact('publications'));  
}



public function create_publication()
{
   return view ('dashboard.publication.create');  
}


public function store_publication(Request $request)
{

  $publication= new Publication();
 
   if($request->file('image')){
     $newImageName3 =time().'-'.$request->context.'.'.$request->image->extension();
     $test3 =$request->image->move('assests/images/poblication',$newImageName3);
     $publication->image = $newImageName3;
                               }
     $publication->context = $request->context;
     $publication->contenu = $request->contenu;
     $publication->status = 1;
     $publication->save();
      return redirect('/admin/publication/create')->with('success','cette publicaiton sora publice');

 
}





}
