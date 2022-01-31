@extends('layouts.visiteur')

@section('content')
<!-- page header section start here  -->
<div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
               <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">listes des secteurs d'activité</span>
                        </div>
                        <ol class="breadcrumb">
                            <li>Tu es là : </li>
                            <li><a href="{{url('/')}}">Accueil</a></li>
                            <li class="active">listes des secteurs d'activité</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page header section ending here -->

    <!-- event venues section start here  -->
    <section class="event-venue padding-tb bg-ash">
        <div class="container container-1310">
       
            <div class="row my-15">
            @foreach ($secteurs  as $row)
                <div class="col-md-6">
                    <div class="venue-item">
                        <div class="venue-thumb">
                            <img src=" {{ asset('assests/images/secteurs/'.$row->image)}}" alt="" style="height: 260px">
                        </div>
                        <div class="venue-content">
                           <a href="{{url('secteur',$row->id)}}"><h6>{{$row->libelle}}</h6></a>
                            
                            <p>
                                {{ Str::limit($row->description, 70) }}.<a href="{{url('secteur',$row->id)}}">see more</a></p>
                            <div class="venue-location">
                            	
                                <div class="meta-post">
                                <span class="by"> 
                                    
                                    <a href="#"><i class="fa fa-user-tie"></i> {{count($row->users)}}</a>
                                    
                                </span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
           
            
          
                @endforeach
               
            </div>
            <div class="pagination-area d-flex flex-wrap justify-content-center">
                   @if ($secteurs->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                                <li class="prev"> <a ref="{{ $secteurs->url(1) }}" class="{{ ($secteurs->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                    <span>« Précédent</span></a></li>
                                @for ($i = 1; $i <= $secteurs->lastPage(); $i++)
                                <li class="{{ ($secteurs->currentPage() == $i) ? ' active' : '' }} page-item">
                                       <a href="{{ $secteurs->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                                @endfor
                                
                                <li class="dot">....</li>
                               
                                <li  class="{{ ($secteurs->currentPage() == $secteurs->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $secteurs->url($secteurs->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                            </ul>
                   @endif
                        </div>

        </div>
    </section>
    <!-- event venues section ending here  -->

 <!-- ======= Intro Section ======= -->

  
@endsection
