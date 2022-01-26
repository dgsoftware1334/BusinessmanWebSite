<?php

namespace App\Http\Controllers\Fondateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fondateur;
use App\Http\Requests\StoreFondRequest;
use Illuminate\Support\Facades\Auth;

class FondateurController extends Controller
{
    public function index_fondateur(){
        $fondateurs=Fondateur::all();
        return view('dashboard.fondateur.index',compact('fondateurs'));
      }
      


  /*    
    public function store_fondateur(StoreFondRequest $request)
{

    $validated = $request->validated();
  
 
    $fondateur= new Fondateur();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/fondateurs';
    $request->image->move($path,$file_name);
    $fondateur->image= $file_name;
    $fondateur->nom = ['fr' => $request->nom, 'ar' => $request->nom_ar, 'en' => $request->nom_fr];
    $fondateur->prenom = ['fr' => $request->prenom, 'ar' => $request->prenom_ar, 'en' => $request->prenom_fr];
    $fondateur->diplom = ['fr' => $request->diplom, 'ar' => $request->diplom_ar, 'en' => $request->diplom_fr];
    $fondateur->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    $fondateur->Telephone =$request->Telephone;
    $fondateur->admin_id = Auth::guard('admin')->user()->id;
  

    $save =$fondateur->save();
    if( $save ){
        toastr()->success('Le fondateur a été ajouter avec succée');
        return redirect()->back();

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

  

    }

 

}*/
public function store_fondateur(Request $request)
{




  
 
    $fondateur= new Fondateur();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/fondateurs';
    $request->image->move($path,$file_name);
    $fondateur->image= $file_name;
    $fondateur->nom = ['fr' => $request->nom, 'ar' => $request->nom_ar, 'en' => $request->nom_fr];
    $fondateur->prenom = ['fr' => $request->prenom, 'ar' => $request->prenom_ar, 'en' => $request->prenom_fr];
    $fondateur->diplom = ['fr' => $request->diplom, 'ar' => $request->diplom_ar, 'en' => $request->diplom_fr];
    $fondateur->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    $fondateur->Telephone =$request->Telephone;
    $fondateur->admin_id = Auth::guard('admin')->user()->id;
    $fondateur->chambre_id = 1;

    $save =$fondateur->save();
    if( $save ){
        toastr()->success('Le fondateur a été ajouter avec succée');
        return redirect()->back();

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

  

    }





}

public function update_fondateur(Request $request, $id)
{
 $fondateur=Fondateur::find($id);
 if($request->file('image')){
    $newImageName3 =time().'-'.$request->nom.'.'.$request->image->extension();
    $test3 =$request->image->move('assests/images/fondateurs/',$newImageName3);
     $fondateur->image = $newImageName3;
 
       }

 $fondateur->nom = ['fr' => $request->nom, 'ar' => $request->nom_ar, 'en' => $request->nom_fr];
 $fondateur->prenom = ['fr' => $request->prenom, 'ar' => $request->prenom_ar, 'en' => $request->prenom_fr];
 $fondateur->diplom = ['fr' => $request->diplom, 'ar' => $request->diplom_ar, 'en' => $request->diplom_fr];
 $fondateur->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
 $fondateur->Telephone =$request->Telephone;
  
   //

   $fondateur->save();

return redirect()->back();
}
}
