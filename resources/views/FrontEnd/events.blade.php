@extends('layouts.visiteur')

@section('content')







<!-- page header section start here  -->
<div class="page-header-section post-title style-1" style="background-image: url(assets/images/pageheader/pageheader.png)">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">event <span>masonary</span></span>
                        </div>
                        <ol class="breadcrumb">
                            <li>You Are Here : </li>
                            <li><a href="#">Home</a></li>
                            <li class="active">event masonary</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page header section ending here -->

    <!--  masonary section start here -->
    <section class="masonary-section style-1 padding-tb bg-ash">
        <div class="container container-1310">
            <div class="section-wraper">
                <div class="grid-one">
                @foreach ($events as $event)
                    <div class="grid-item masonary-item" data-category="transition">
                        <div class="masonary-item-inner">
                            <div class="masonary-thumb">
                            @if(is_null($event->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($event->image))
                        <img src="{{ asset('assests/images/events/'.$event->image)  }}"  width="100" style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                         @endif
                            </div>
                            <div class="masonary-content">
                                <a href="#"><h5>{{$event->sujet}}</h5></a>
                                <div class="meta-post">
                                    <span class="by"><i class="fas fa-clock"></i> <a class="date" href="#">{{$event->date_debut}} To {{$event->date_fin}}</a></span>
                                    <span class="by"><i class="fas fa-map-marker-alt"></i> {{$event->lien}}.</span>
                                </div>
                                <p>{!! $event->description !!}</p>
                                <a href="#" class="btn-defult">Buy Ticket</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
              
                 
                  
              
                </div>
            </div>
        </div>
    </section>
    <!-- masonary section ending here -->















   <!-- event venues section ending here  -->

 <!-- ======= Intro Section ======= -->
 @include('FrontEnd.section_home.service')
  <!-- achivement section start here ->
	@include('FrontEnd.section_home.achivement')
	<!-- achivement section ending here -->
	<!-- newevent section start here -->
   @include('FrontEnd.section_home.newevent')
  <!-- newevent section ending here -->
  
@endsection
