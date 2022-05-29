<?php

namespace App\Http\Controllers\Sujet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sujet;
use App\Models\Signal;
use App\Models\User;
use App\Http\Requests\SujetRrequest;
use Illuminate\Support\Facades\Auth;

class SujetController extends Controller
{
    function index(){
       
        $sujets = Sujet::all();
      return view ('FrontEnd.sujets',compact('sujets'));
     
           
      }

      function index_visit(){
       
        $sujets = Sujet::all();
      return view ('FrontEnd.sujet_visiteur',compact('sujets'));
     
           
      }
      function index_admin(){
       
        $sujets = Sujet::all();
       
      return view ('dashboard.sujets.sujets',compact('sujets'));
     
           
      }
      
      function show_sujet($id){
       
        $sujet = Sujet::find($id);
    
      return view ('FrontEnd.sujet_detail',compact('sujet'));
     
           
      }

      function show_sujet_visit($id){
       
        $sujet = Sujet::find($id);
    
      return view ('FrontEnd.sujet_detail_visiteur',compact('sujet'));
     
           
      }

      function show_com($id){
       
        $sujet = Sujet::find($id);
       
        $signals =Signal ::where('sujet_id','=',$sujet->id)->get();
       
          foreach($signals as $signal){
          $signal->notify=1;
          $signal->save();
        }
    
      return view ('dashboard.sujets.show',compact('sujet'));
     
           
      }

      public function updatecom(Request $request,$idp,$idu,$ids)
      {
        
        $sujet=Sujet::find($ids);
        $user=User::find($idu);
        $comment[$idp] = [
          'id' => $idp,
          'sujet_id' => $ids,
          'user_id' =>$idu,
          'contenu' => $request->contenu
        ];
        $com = $sujet->users()->wherePivot('id','=',$idp)->wherePivot('sujet_id','=',$ids)->wherePivot('user_id','=',$idu)->sync($comment);
        

        toastr()->success('Le commentaire a été modifier avec succée');
        return back()->with('success','Le commentaire est modifié correctement');
      }

      
function store(SujetRrequest $request){
       
    $validated = $request->validated();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/sujets';
    $request->image->move($path,$file_name);
 
    $sujet= new Sujet();
    $sujet->titre = $request->titre;
    $sujet->details = $request->details;
    $sujet->image= $file_name;
    $sujet->user_id = Auth::guard('web')->user()->id;
  

    $save =$sujet->save();
    if( $save ){
        toastr()->success('Le sujet a été ajouter avec succée');
        return redirect()->back()->with('success','Le sujet à été correctement ajouter');

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

  

    }
       
  }

  public function destroy($id)
  {
    $sujet = Sujet::findOrFail($id)->delete();
    toastr()->error('Vous avez supprimer le sujet');
      return back()->with('success','Le sujet est supprimer correctement');
  }
  public function destroy_motif($id)
  {
    $signal = Signal::findOrFail($id)->delete();
    toastr()->error('Vous avez supprimer ce motif de signal');
      return back()->with('success','Le motif de signal est supprimer correctement');
  }

  public function delete_com($idp,$ids,$idu){
    //return $id3;
    $sujet=Sujet::find($ids);
    $user=User::find($idu);
    $com=$sujet->users()->wherePivot('id','=',$idp)->wherePivot('sujet_id','=',$ids)->wherePivot('user_id','=',$idu)->detach();

   // foreach ($publication->users as $row ) {
    //    if($row->pivot->id == $id1 && $publications->pivot->id == $id3){
    //       $row->pivot->delete();
    //    }
    //}
   // return response()->json(['status'=>'event deleted succsefuly']);
    return back()->with('commtaire','le commentaire a été supprimé');

    //Auth::guard('web')->user()->events()->where('event_id' ,$event)->detach($event);



  }

  public function commentaire(Sujet $sujet,Request $request,User $user ){

        Auth::guard('web')->user()->subjects()->attach($sujet, ['contenu' => $request->contenu]);
         toastr()->success('Le commentaire a été ajouter!');
          return redirect()->back();
     
       
  }
  public function signal(Sujet $sujet,Request $request,User $user ){
    $signal = new Signal();
    $signal->user_id= $request->user_id;
    $signal->sujet_id= $request->sujet_id;
    $signal->motif= $request->motif;
     $save=$signal->save();

     toastr()->success('Le motif de signal à été envoyé!');
      return redirect()->back();
 
   
}

  /*public function updatecom(Sujet $sujet,Request $request,User $user ){

    Auth::guard('web')->user()->subjects()->sync($sujet, ['contenu' => $request->contenu]);
     toastr()->success('Le commentaire a été modifier!');
      return redirect()->back();
 
   
}
*/
public function destroy_sub($id){
  $sujet = Sujet::find($id)->delete();
    toastr()->error('Vous avez supprimer votre sujet');
      return redirect()->route('user.sujet')->with('success','Le sujet est supprimer correctement');
}
}
