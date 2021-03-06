<?php

namespace App\Http\Controllers\Tender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Secteur;
use App\Models\User;
use App\Http\Requests\StoreTenderRequest;
use App\Http\Requests\UpdateTenderRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use DB;

class TenderController extends Controller
{
    public function index()
    {
      $tenders= Tender::all();
      $mytime = Carbon::now();
      foreach($tenders as $tender){
          if($tender->date_limite <=$mytime)
          $tender->etat=0;
          $tender->save();
      }
    
       return view ('dashboard.tender.index',compact('tenders'));  
    }

    public function index_front()
    {
      $tenders= Tender::paginate(10);
      $secteurs= Secteur::all();

    if(count($tenders) > 0)
       return view ('FrontEnd.appel_offre',compact('tenders','secteurs'));  
       else
       return view ('FrontEnd.appel_offre',compact('tenders','secteurs'))->with('message','Aucun appel d\'offre n\'est disponible');  
    }

    public function create()
{
   return view ('dashboard.tender.create');  
}


function store(StoreTenderRequest $request){
       
    $validated = $request->validated();
    $tender= new Tender();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/tenders';
    $request->image->move($path,$file_name);
    if($request->file('file')){
        $file=$request->file; 
	      $filename=time().'.'.$file->getClientOriginalExtension();
		    $request->file->move('assests/images/tenders/',$filename);
            $tender->doc=$filename;
		    }

    $tender->intitule =['fr' => $request->intitule, 'ar' => $request->intitule_ar, 'en' => $request->intitule_en];
    $tender->description =['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en] ;
    $tender->image= $file_name;
    $tender->date_parution = $request->date_parution;
    $tender->date_limite = $request->date_limite;
    $tender->sacteur_id=$request->sacteur_id;
    $tender->wilaya = ['fr' => $request->wilaya, 'ar' => $request->wilaya_ar,'en' => $request->wilaya];
    $tender->adresse =  ['fr' => $request->adresse, 'ar' => $request->adresse_ar ,'en' => $request->adresse];
    $tender->genre = $request->genre;
    $tender->type =['fr' => $request->type, 'ar' => $request->type_ar, 'en' => $request->type_en] ;
    $tender->societe = ['fr' => $request->societe, 'ar' => $request->societe_ar,'en' => $request->societe];
    $tender->prix_cahier =$request->prix_cahier;

    $save =$tender->save();
    if( $save ){
        toastr()->success('Votre appel d offre a ??t?? ajouter avec succ??e');
        return redirect()->back();
   
    }else{
   
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

    }
       
  }

  public function download(Request $request,$doc)
{
        return response()->download(public_path('assests/images/tenders/'.$doc));
}


public function edit($id)
{
    //
    $secteurs= Secteur::all();
    $tender= Tender::find($id);
     return view ('dashboard.tender.edit',compact('secteurs','tender'));
}


public function update(UpdateTenderRequest $request, $id)
{
    //
    $validated = $request->validated();
    $tender= Tender::find($id);


   if($request->image){
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/tenders';
    $request->image->move($path,$file_name);
    $tender->image= $file_name;
}
    if($request->file('file')){
        $file=$request->file; 
	      $filename=time().'.'.$file->getClientOriginalExtension();
		    $request->file->move('assests/images/tenders/',$filename);
            $tender->doc=$filename;
		    }

    $tender->intitule =  ['fr' => $request->intitule, 'ar' => $request->intitule_ar, 'en' => $request->intitule_en];
    $tender->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en] ;
  
    $tender->date_parution = $request->date_parution;
    $tender->date_limite = $request->date_limite;
    $tender->sacteur_id=$request->sacteur_id;
    $tender->wilaya = ['fr' => $request->wilaya, 'ar' => $request->wilaya_ar,'en' => $request->wilaya];
    $tender->adresse =['fr' => $request->adresse, 'ar' => $request->adresse_ar ,'en' => $request->adresse];
    $tender->genre = $request->genre;
    $tender->type = ['fr' => $request->type, 'ar' => $request->type_ar, 'en' => $request->type_en];
    $tender->societe =['fr' => $request->societe, 'ar' => $request->societe_ar,'en' => $request->societe];
    $tender->prix_cahier =$request->prix_cahier;
    $save =$tender->save();

    if( $save ){
        toastr()->success(trans(key: 'msg_trans.success'));

        return redirect()->route('admin.tender.index');
        //return redirect()->back()->with('success','Vous ??tes maintenant enregistr?? avec succ??s mais vous devez attendre la validation de votre compte');
    }else{
       // return redirect()->back()->with('fail','Quelque chose s est mal pass??, ??chec de l enregistrement');
       
    toastr()->error(trans(key: 'msg_trans.fail'));

    return back();
}

}


public function show($id)
{
    //
    $tender=Tender::find($id);
     return view ('dashboard.tender.show',compact('tender'));

}
public function delete($id)
{

    $tender = Tender::findOrFail($id)->delete();
    toastr()->error('Vous avez supprimer cette cet appel d offre');
      return back()->with('success','L appel d offre a ??t?? bien supprim??');

}



public function rechercher() {
    $intitule=$_GET['nom'];
    $secteur=$_GET['secteur'];
    $type=$_GET['type'];
    $wilaya=$_GET['wilaya'];
    $date=$_GET['date'];
$secteurs=Secteur::all();
    $tenders = Tender::
   
      where('tenders.intitule',$intitule)->orwhere('intitule', 'LIKE', '%' . $intitule . '%')->whereHas('secteur', function (Builder $query) use ($secteur) {
      $query->where('libelle', 'LIKE', '%' . $secteur . '%');
  })->
  where('tenders.type', 'LIKE', '%' .$type. '%')
  ->where('tenders.wilaya', 'LIKE', '%' .$wilaya. '%')
  ->where('tenders.date_parution', 'LIKE', '%' .$date. '%')
  
->paginate(10);

  
    if (count($tenders) > 0) {
  
     
      return view('FrontEnd.appel_offre',compact('tenders','secteurs'));
        }
        else {
          toastr()->error('Erreur!Aucun resultat correspondant ?? votre recherche');
          //$tenders=Tender::paginate(6);
          return view('FrontEnd.appel_offre',compact('tenders','secteurs'))->with('message','Aucun resultat correspondant ?? votre recherche');
        }
      
      }

}
