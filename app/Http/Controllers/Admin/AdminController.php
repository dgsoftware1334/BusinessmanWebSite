<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;


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

function index(Request $request){
       
     $users = User::all();
   return view ('dashboard.user.index',compact('users'));
  
        
   }


public function deactive($id)
    {
        //
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






}
