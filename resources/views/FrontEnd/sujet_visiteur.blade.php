@extends('layouts.visiteur')

@section('content')
<!-- page header section start here  -->
<div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
               <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('forum_trans.list of subjects Form')}}</span>
                        </div>
                        <ol class="breadcrumb">
                            
                            <li><a href="{{url('/')}}">{{trans('secteur_trans.Home')}}</a></li>
                            <li class="active">{{trans('forum_trans.list of subjects Form')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page header section ending here -->

    <!-- event venues section start here  -->
    <section class="choose-us style-1 padding-tb" style="background-image: url(assets/images/choose-us/bg.png)">
        <div class="container container-1310">
            <div class="section-header">
                <h2>{{trans('forum_trans.Discussion forum')}}</h2>
                <p>{{trans('forum_trans.Here you can find topics in which you discuss between businessmen')}}</p>
          
			   
              

                

                
			   
                <div class="d-flex justify-content-center">
               <a href="{{url('user/login')}}" class="btn-defult">{{trans('forum_trans.Add a topic')}}</a>
               </div>
               
           
     
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
          &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
          Ajouter un sujet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('user.store_sujet')}}" method="POST" enctype="multipart/form-data" >
          @csrf
  <div class="form-group">
    
    <input type="text" class="form-control" name="titre" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer le titre de votre sujet">
  
  </div>
  <div class="form-group">
    
    <textarea name="details" rows="8" id="message" placeholder="Entrer les détails de votre sujet" required ></textarea>

  </div>
  <div class="col-sm-12">
                            
                            <input type="file" name="image"  class="course form-control">
                        </div>
                        <div class="modal-footer justify-content-between">
                        <button type="button"  style="background-color: #fffff;width: 70px;" data-dismiss="modal">Fermer</button>
              <button type="submit" style="background-color: #008CBA;width: 70px;" name="submit">Ajouter</button>
</div>
</form>
      </div>
      <div class="modal-footer">
   
      </div>
    </div>
  </div>
</div>
            </div>
            <div class="section-wrapper">
            	<div class="row no-gutters">
                    
@foreach($sujets as $sujet)
                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                            <img src="{{ asset('assests/images/sujets/'.$sujet->image)}}" alt="masonary" style="height: 80px; width: 80px; border-radius: 50%;">
                            </div>
                            <div class="content">
                            <a href="{{url('/sujets/details/visiteur',$sujet->id)}}">
                                <h6>{{$sujet->titre}}</h6></a>
                                <p> &nbsp; &nbsp; &nbsp;{{Str::limit($sujet->details, 100) }}</p>
                            </div>
                        </div>
                    </div>

@endforeach



        
                </div>
            </div>
        </div>
    </section>
    
    <!-- event venues section ending here  -->

 <!-- ======= Intro Section ======= -->

  
@endsection
