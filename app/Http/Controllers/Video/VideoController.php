<?php

namespace App\Http\Controllers\Video;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
use Carbon;

class VideoController extends Controller
{
    public function create()
    {
       return view ('dashboard.videos.create');  
    }


    public function store(Request $request){

  

        $fileUpload = new Video;
        if($request->file('cover')){
            $newImageName3 =time().'-'.$request->name.'.'.$request->cover->extension();
            $test3 =$request->cover->move('assests/images/videos/',$newImageName3);
             $fileUpload->cover = $newImageName3;
         
               }
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $file->move('assests/images/videos', $fileName);

            $fileUpload->title = $request->title;
            $fileUpload->date_expiration = $request->date_expiration;
            $fileUpload->description = ['fr' => $request->description, 'ar' => $request->description_ar, 'en' => $request->description_en];
            $fileUpload->categorie = ['fr' => $request->categorie, 'ar' => $request->categorie_ar, 'en' => $request->categorie_en];

            $fileUpload->video = $fileName;
            $save = $fileUpload->save();

            if( $save ){
              toastr()->success('La vidéo publicitaire  a été ajouter avec succée');
              return redirect()->back();
      
             
          }else{
            
             
          toastr()->error('Erreur! Un probleme s est survenue');
          return redirect()->back();
      
        
      
          }
        }

   }



    function index(){
      $videos = Video::all();

      return view ('dashboard.videos.index',compact('videos'));
     
           
      }

      function index_front(){
       
        $videos = Video::all();
       
      return view ('FrontEnd.video',compact('videos'));
     
           
      }

      function afficher_accueil($id){
        $tmp = 0;
        $vdo=Video::find($id);
        $videos = Video::all();
        foreach($videos as $video){

          if($video->show !=0){
            $tmp = 1;
          }
        }
        if($tmp == 0){
          $vdo->show = 1;
          $vdo->save();
          toastr()->success('Votre vidéo à été correctement publié dans la page d\'accueil');
        } else{
            toastr()->error('Vous avez déja une vidéo dans la page d\'accueil, Enlevez la et refaire l\'opération');
          }
        
         return redirect()->back();
     
           
      }

      function enlever_accueil($id){
        $vdo=Video::find($id);
        $vdo->show = 0;
          $vdo->save();
          toastr()->success('Votre vidéo à été correctement enlever de la page d\'accueil');
          return redirect()->back();
      }

      function vdo_accueil(){
        $vdo=Video::where('show','=','1')->get();
        $vdo->show = 0;
          $vdo->save();
          toastr()->success('Votre vidéo à été correctement enlever de la page d\'accueil');
          return redirect()->back();
      }
}
