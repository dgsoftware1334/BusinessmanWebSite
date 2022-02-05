<?php

namespace App\Http\Controllers\Pub;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publication;
use App\Http\Requests\StrorePubRequest;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;


class PublicationController extends Controller
{
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



    
    function store_publication(StrorePubRequest $request){
       
        $validated = $request->validated();
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name =time().'.'.$file_extension;
        $path = 'assests/images/poblication';
        $request->image->move($path,$file_name);

     





        $publication= new Publication();
        $publication->context = ['fr' => $request->context, 'ar' => $request->context_ar, 'en' => $request->context_en];
        $publication->contenu = ['fr' => $request->contenu, 'ar' => $request->contenu_ar, 'en' => $request->contenu_en];
        $publication->image= $file_name;
        $publication->status = 1;

        $publication->admin_id = Auth::guard('admin')->user()->id;

        $save =$publication->save();
        if( $save ){
            toastr()->success('Votre publication a été ajouter avec succée');
            return redirect()->back();
    
           
        }else{
          
           
        toastr()->error('Erreur! Un probleme s est survenue');
        return redirect()->back();
    
      
    
        }
           
      }


      public function update_publication(StrorePubRequest $request)
      {
        try {
            $validated = $request->validated();
            $publication = Publication::findOrFail($request->id);
            if($request->file('image')){
             
       $file_extension = $request->image->getClientOriginalExtension();
       $file_name =time().'.'.$file_extension;
         $path = 'assests/images/poblication';
    $request->image->move($path,$file_name);
     $publication->image= $file_name;
 
           
                 }
            $publication->update([
                $publication->context = ['fr' => $request->context, 'ar' => $request->context_ar, 'en' => $request->context_en],
                $publication->contenu = ['fr' => $request->contenu, 'ar' => $request->contenu_ar, 'en' => $request->contenu_en],
                $publication->image= $file_name,
            ]);
            toastr()->success('Les changement ont été bien apporté');
            return redirect()->back();
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      }

      public function delete_publication(Request $request)
      {
    
        $publication = Publication::findOrFail($request->id)->delete();
        toastr()->error('Vous avez supprimer le secteur');
        return redirect()->back();
    
      }
      public function suprimer_publication($id){
        $pub = Publication::findOrFail($id)->delete();
      toastr()->error('Vous avez supprimer cette publication');
        return back()->with('success','La publication a été bien supprimé');
      }
}
