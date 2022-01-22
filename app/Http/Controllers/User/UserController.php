<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatUserRequest;
use App\Http\Requests\CheckUserRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;

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
            return redirect()->back()->with('success','Vous êtes maintenant enregistré avec succès mais vous devez attendre la validation de votre compte');
        }else{
            return redirect()->back()->with('fail','Quelque chose s est mal passé, échec de l enregistrement');
        }
  }

  function check(CheckUserRequest $request){
    //Validate inputs
    
    $validated = $request->validated();

    $creds = $request->only('email','password');
    if(Auth::guard('web')->attempt($creds)){
        return redirect()->route('user.home');
    }else{
        return redirect()->route('user.login')->with('fail','Incorrect credentials');
    }
}
function logout(){
    Auth::guard('web')->logout();
    return redirect('/');
}

}
