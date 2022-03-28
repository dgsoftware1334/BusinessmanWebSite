<?php

namespace App\Http\Controllers\Code;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Code;
use App\Http\Requests\StoreCodeRequest;

class CodeController extends Controller
{
    public function index()
    {
      $codes= Code::all();
       return view ('dashboard.code.code',compact('codes'));  
    }
    public function index_front()
    {
      $codes= Code::all();
       return view ('FrontEnd.codes_commerce',compact('codes'));  
    }



    function store(StoreCodeRequest $request){
       
        $validated = $request->validated();
     
        $code= new Code();
        $code->code =$request->code;
        $code->title = ['fr' => $request->title, 'ar' => $request->title_ar];

        $code->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];

        $save =$code->save();
        if( $save ){
            toastr()->success('Le code a été ajouter avec succée');
            return redirect()->back();
    
           
        }else{
          
           
        toastr()->error('Erreur! Un probleme s est survenue');
        return redirect()->back();
    
      
    
        }
           
      }



      public function update(StoreCodeRequest $request)
      {
          
        try {
            $validated = $request->validated();
            $code = Code::findOrFail($request->id);
   
         
              $code->code = $request->code;
              $code->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];

            $save=$code->save();
            if($save){
            toastr()->success('Les changement ont été bien apporté');
            return redirect()->back();}
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
      }


      public function delete($id){
        $code=Code::find($id);
     $code->delete();
       toastr()->error('Vous avez supprimer le code commercial');
       return redirect()->back();
     }

     public function rechercher() {
      $title=$_GET['title'];
      $code=$_GET['code'];
      $description=$_GET['description'];
  
      $codes = Code::where('codes.code', 'LIKE', '%' .$code. '%')
      ->where('codes.title', 'LIKE', '%' .$title. '%')
    ->where('codes.description', 'LIKE', '%' .$description. '%')
    
    
  ->get();
  
    
      if (count($codes) > 0) {
    
       
        return view('FrontEnd.codes_commerce',compact('codes'));
          }
          else {
           
            return view('FrontEnd.codes_commerce',compact('codes'))->with('message','Incorrect credentials');
          }
        
        }
}