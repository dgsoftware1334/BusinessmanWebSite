<?php

namespace App\Http\Controllers\Businessmans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publication;
use App\Models\Secteur;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateBusinessmanRequest;
use App\Http\Requests\VipRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



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
   function create(StoreUserRequest $request){
      
        $validated = $request->validated();  
        $user = new User();
       
        if($request->file('photo')){
       $file_extension = $request->photo->getClientOriginalExtension();
       $file_name =time().'.'.$file_extension;
         $path = 'assests/imgUser';
    $request->photo->move($path,$file_name);
     $user->photo= $file_name;
 
       // $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
       
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
        if($request->sacteur_id)
        $user->sacteur_id=$request->sacteur_id;
        else
        $user->sacteur_id=40;
   //  
       
            $save = $user->save();

      

        if( $save ){
            toastr()->success(trans(key: 'msg_trans.success'));

            return redirect()->back();
            //return redirect()->back()->with('success','Vous ??tes maintenant enregistr?? avec succ??s mais vous devez attendre la validation de votre compte');
        }else{
           // return redirect()->back()->with('fail','Quelque chose s est mal pass??, ??chec de l enregistrement');
           
        toastr()->error(trans(key: 'msg_trans.fail'));

        return back();

        }
  }

    public function delete($id){

      $user = User::findOrFail($id)->delete();
      toastr()->error('Vous avez supprimer l homme d affaire');
        return back()->with('success','Businessman deleted successfully');
          


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
    public function update(UpdateBusinessmanRequest $request, $id)
    {
        //
        $validated = $request->validated();
        $user= User::find($id);
 

       
        if($request->file('photo')){
       $file_extension = $request->photo->getClientOriginalExtension();
       $file_name =time().'.'.$file_extension;
         $path = 'assests/imgUser';
    $request->photo->move($path,$file_name);
     $user->photo= $file_name;
 
       // $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
       
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
        if($request->sacteur_id)
        $user->sacteur_id=$request->sacteur_id;
        else
        $user->sacteur_id=40;
   //
    $user->password=Hash::make($request->new_password);
        

        $save = $user->save();

        if( $save ){
            toastr()->success(trans(key: 'msg_trans.success'));

            return redirect()->back();
            //return redirect()->back()->with('success','Vous ??tes maintenant enregistr?? avec succ??s mais vous devez attendre la validation de votre compte');
        }else{
           // return redirect()->back()->with('fail','Quelque chose s est mal pass??, ??chec de l enregistrement');
           
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
    public function autoriser($id){
      $user=User::find($id);
      if($user->paye ==1){
        $user->paye=0;
        $user->date = NULL;
        $user->date_limite = NULL;
        $user->save();
        return redirect()->back();
      }
    }
    function vip(VipRequest $request){
       
      $validated = $request->validated();
      $user=User::find($request->id);
      $user->date_limite = $request->date_limite;
      $user->paye = $request->paye;
      $user->date= Carbon::now();
  
     
    
      $save =$user->save();
      if( $save ){
          toastr()->success('Vous avez donnez l\'acc??es ?? l\espace VIP pour cet utilisateur');
          return redirect()->back();
     
      }else{
     
      toastr()->error('Erreur! Un probleme s est survenue');
      return redirect()->back();
    
      }
         
    }
}
