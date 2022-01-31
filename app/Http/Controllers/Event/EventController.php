<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    function index(){
       
        $events = Event::all();
      return view ('dashboard.events.events',compact('events'));
     
           
      }

      function liste_event(){
       
        $events = Event::where('status',1)->orderBy('created_at','desc')->paginate(6);
      return view ('FrontEnd.events',compact('events'));
     
           
      }




function createEven(StoreEventRequest $request){
       
    $validated = $request->validated();
    $file_extension = $request->image->getClientOriginalExtension();
    $file_name =time().'.'.$file_extension;
    $path = 'assests/images/events';
    $request->image->move($path,$file_name);
 
    $event= new Event();
    $event->sujet = ['fr' => $request->sujet, 'ar' => $request->sujet_ar, 'en' => $request->sujet_en];
    $event->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    $event->date_debut =$request->date_debut;
    $event->date_fin =$request->date_fin;
    $event->dure =$request->dure;
    $event->type =$request->type;
    $event->lien =$request->lien;
    $event->lieu =$request->lieu;
    $event->image= $file_name;
 
    $event->admin_id = Auth::guard('admin')->user()->id;
  

    $save =$event->save();
    if( $save ){
        toastr()->success('L evenement a été ajouter avec succée');
        return redirect()->back();

       
    }else{
      
       
    toastr()->error('Erreur! Un probleme s est survenue');
    return redirect()->back();

  

    }
       
  }
  public function updateEvent(StoreEventRequest $request)
  {
      
    try {
        $validated = $request->validated();
        $events = Event::findOrFail($request->id);
        if($request->file('image')){
          $newImageName3 =time().'-'.$request->sujet.'.'.$request->image->extension();
          $test3 =$request->image->move('assests/images/events/',$newImageName3);
           $events->image = $newImageName3;
       
             }
        $events->update([
          $events->sujet = ['fr' => $request->sujet, 'ar' => $request->sujet_ar, 'en' => $request->sujet_en],
          $events->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en],
          $events->date_debut =$request->date_debut,
          $events->date_fin =$request->date_fin,
          $events->dure =$request->dure,
          $events->type =$request->type,
          $events->lien =$request->lien,
        ]);
        toastr()->success('Les changement ont été bien apporté');
        return redirect()->back();
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
  }



  public function destroyEvent(Request $request)
  {

    $events = Event::findOrFail($request->id)->delete();
    toastr()->error('Vous avez supprimer l evenement');
    return redirect()->back();

  }
}