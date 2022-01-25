<?php

namespace App\Http\Controllers\Secteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Secteur;
use App\Http\Requests\StoreSecteurRequest;
use Illuminate\Support\Facades\Auth;

class SecteurController extends Controller
{
    function index(){
       
        $secteurs = Secteur::all();
      return view ('dashboard.secteur.index',compact('secteurs'));
     
           
      }

      function liste(){
       
        $secteurs = Secteur::all();
      return view ('FrontEnd.secteur',compact('secteurs'));
     
           
      }




function store(StoreSecteurRequest $request){
       
    $validated = $request->validated();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/secteurs';
    $request->image->move($path,$file_name);
 
    $secteur= new Secteur();
    $secteur->libelle = ['fr' => $request->libelle, 'ar' => $request->libelle_ar, 'en' => $request->libelle_en];
    $secteur->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    $secteur->image= $file_name;
    $secteur->admin_id = Auth::guard('admin')->user()->id;
  

    $save =$secteur->save();
    if( $save ){
        toastr()->success('Le secteur a été ajouter avec succée');
        return redirect()->back();

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

  

    }
       
  }
  public function update(StoreSecteurRequest $request)
  {
    try {
        $validated = $request->validated();
        $secteurs = Secteur::findOrFail($request->id);
        if($request->file('image')){
          $newImageName3 =time().'-'.$request->name.'.'.$request->image->extension();
          $test3 =$request->image->move('assests/images/secteurs/',$newImageName3);
           $secteurs->image = $newImageName3;
       
             }
        $secteurs->update([
          $secteurs->libelle = ['fr' => $request->libelle, 'ar' => $request->libelle_ar, 'en' => $request->libelle_en],
          $secteurs->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->libelle_en],
        ]);
        toastr()->success('Les changement ont été bien apporté');
        return redirect()->back();
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }


  public function destroy(Request $request)
  {

    $secteurs = Secteur::findOrFail($request->id)->delete();
    toastr()->error('Vous avez supprimer le secteur');
    return redirect()->back();

  }
}