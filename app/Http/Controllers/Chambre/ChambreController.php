<?php

namespace App\Http\Controllers\Chambre;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chambre;
use App\Http\Requests\StroreChambreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Fondateur;
use App\Models\Event;
use App\Models\User;
use App\Models\Admin;
use App\Models\Publication;
use App\Models\Secteur;
use App\Http\Requests\UpdateChambreRequest;



class ChambreController extends Controller
{
    public function create_chambre()
{
   return view ('dashboard.chambre.create');  
}
public function about(){
  $chambres= Chambre::all();
  $users=User::all();
  $publications= Publication::all();
  $events= Event::all();
  $secteurs=Secteur::all();
  $fondateurs=Fondateur::all();
  return view('FrontEnd.about',compact('chambres','events','users','publications','secteurs','fondateurs'));
}


function store_chambre(StroreChambreRequest $request){
       
    $validated = $request->validated();
    $file_extension = $request->photo->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/chambre';
    $request->photo->move($path,$file_name);
 
    $chambre= new Chambre();
    $chambre->id=1;
    $chambre->sujet = ['fr' => $request->sujet, 'ar' => $request->sujet_ar, 'en' => $request->sujet_en];
    $chambre->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    $chambre->lien =  $request->lien;
    $chambre->adresse = ['fr' => $request->adresse, 'ar' => $request->adresse_ar, 'en' => $request->adresse_en];
    $chambre->politique = ['fr' => $request->politique, 'ar' => $request->politique_ar, 'en' => $request->politique_en];
    $chambre->telephone =  $request->telephone;
    $chambre->fb =  $request->fb;
    $chambre->insta =  $request->insta;
    $chambre->linked =  $request->linked;
    $chambre->twit =  $request->twit;
    $chambre->photo= $file_name;
    $chambre->admin_id = Auth::guard('admin')->user()->id;

    $save =$chambre->save();
    if( $save ){
        toastr()->success('Votre chambre a été ajouter avec succée');
        return view('dashboard.admin.dashboard');

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    redirect()->route('admin.show_chambre');

    }
       
  }







    public function index_chambre()
{
  $chambres= Chambre::all();
  
   return view ('dashboard.chambre.show',compact(['chambres']));  
}



public function update_chambre(UpdateChambreRequest $request)
{
  try {
      $validated = $request->validated();
      $chambre = Chambre::findOrFail($request->id);
      
        if($request->file('photo')){
       $file_extension = $request->photo->getClientOriginalExtension();
       $file_name =time().'.'.$file_extension;
         $path = 'assests/images/chambre';
    $request->photo->move($path,$file_name);
  $chambre->photo= $file_name;
       // $test3 =$request->photo->move('assests/imgUser/',$newImageName3);
       
                                    }



      $chambre->update([
        $chambre->sujet = ['fr' => $request->sujet, 'ar' => $request->sujet_ar, 'en' => $request->sujet_en],
        $chambre->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en],
        $chambre->lien =  $request->lien,
        $chambre->adresse = ['fr' => $request->adresse, 'ar' => $request->adresse_ar, 'en' => $request->adresse_en],
        $chambre->politique = ['fr' => $request->politique, 'ar' => $request->politique_ar, 'en' => $request->politique_en],
        $chambre->telephone =  $request->telephone,
        $chambre->fb =  $request->fb,
        $chambre->insta =  $request->insta,
        $chambre->linked =  $request->linked,
        $chambre->twit =  $request->twit,
           

      ]);
      toastr()->success('Les changement ont été bien apporté');
      return redirect()->back();
  }
  catch
  (\Exception $e) {
      return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }
}



}
