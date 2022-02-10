<?php

namespace App\Http\Controllers\Condition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreConditionRequest;
use App\Models\Condition;

class ConditionController extends Controller
{
    public function create_condition()
    {
       return view ('dashboard.condition.create');  
    }


    function store_condition(StoreConditionRequest $request){
       
        $validated = $request->validated();
     
     
        $condition= new Condition();
       
      
        $condition->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
    
    
        $save =$condition->save();
        if( $save ){
            toastr()->success('Les conditions d utilisation de votre site ont été ajouter avec succée');
            return view('dashboard.admin.dashboard');
    
           
        }else{
          
           
        toastr()->error('Erreur! Un probleme s est survenue');
        return view('dashboard.admin.dashboard');
    
        }
           
      }



      public function show_condition()
      {
        $condition= Condition::all();
        
         return view ('dashboard.condition.show',compact(['condition']));  
      }
      public function show_condition_front()
      {
        $condition= Condition::all();
        
         return view ('FrontEnd.show_condition',compact(['condition']));  
      }


      public function update_condition(StoreConditionRequest $request)
{
  try {
      $validated = $request->validated();
      $condition = Condition::findOrFail($request->id);
  



      $condition->update([
        
        $condition->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en],
 
           

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
