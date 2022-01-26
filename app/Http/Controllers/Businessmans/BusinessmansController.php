<?php

namespace App\Http\Controllers\Businessmans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publication;
use App\Models\Secteur;

class BusinessmansController extends Controller
{
 
    public function index(){
     $secteurs= Secteur::all();
    
  return view ('dashboard.user.create',compact('secteurs'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   function create(Request $request){
      
        //$validated = $request->validated();  
        $user = new User();
         if($request->file('photo')){
               $newImageName3 =time().'-'.$request->email.'.'.$request->photo->extension();
        $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
         $user->photo = $newImageName3;

           }

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->datenaissance = $request->datenaissance;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->email = $request->email;
       // $user->admin_id=1;
        $user->password = \Hash::make($request->password);
    
        $user->lienfb=$request->lienfb;
   
        $user->lieninsta=$request->lieninsta;
        $user->lientwit=$request->lientwit;
        $user->linked=$request->linked;
        $user->diplome=$request->diplome;
        $user->siteweb=$request->siteweb;
        $user->anneexp=$request->anneexp;
        $user->sacteur_id=$request->sacteur_id;
   //

        

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

    public function delete($id){

      $user=User::find($id);
      $user->delete();
        toastr()->error(trans(key: "l'homme d'affaire a été bien supprimé"));
     // return response()->json(['status'=>'event deleted succsefuly']);
     
            return redirect()->back();
          


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user=User::find($id);
         return view ('dashboard.user.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $secteurs= Secteur::all();
        $user= User::find($id);
         return view ('dashboard.user.edit',compact('secteurs','user'));
    }
     

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user= User::find($id);


        if($request->file('photo')){
               $newImageName3 =time().'-'.$request->email.'.'.$request->photo->extension();
        $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
         $user->photo = $newImageName3;

           }

        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->datenaissance = $request->datenaissance;
        $user->phone = $request->phone;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->email = $request->email;
       // $user->admin_id=1;
     //   $user->password = \Hash::make($request->password);
    
        $user->lienfb=$request->lienfb;
   
        $user->lieninsta=$request->lieninsta;
        $user->lientwit=$request->lientwit;
        $user->linked=$request->linked;
        $user->diplome=$request->diplome;
        $user->siteweb=$request->siteweb;
        $user->anneexp=$request->anneexp;
        $user->sacteur_id=$request->sacteur_id;
   //

        

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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
