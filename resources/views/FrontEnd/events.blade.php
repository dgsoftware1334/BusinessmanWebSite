@extends('layouts.visiteur')

@section('content')

<!-- page header section start here  -->
 <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/11.png') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('listevent_trans.All events')}}</span>
                        </div>
                        <ol class="breadcrumb">
                            
                             <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>
                            <li class="active">{{trans('listevent_trans.All events')}}</li>


                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

     

        <section class="masonary-section style-1 padding-tb bg-ash">
        <div class="container container-1310">
            <div class="section-wraper">
                <div class="grid-one">
                    @foreach($events as $row)
                    <div class="grid-item masonary-item" data-category="transition">
                        <div class="masonary-item-inner">
                            <div class="masonary-thumb">
                                <a href="{{url('/event',$row->id)}}"><img src="{{ asset('assests/images/events/'.$row->image)}}" alt="masonary" style="height: 200px; width: 360px"></a>
                            </div>
                            <div class="masonary-content">
                                <a href="{{url('/event',$row->id)}}"><h5>{{$row->sujet}}</h5></a>
                                <div class="meta-post">
                                    <span class="by"><i class="fas fa-clock"></i> <a class="date" href="{{url('/event',$row->id)}}">{{$row->date_debut}} <i>{{trans('about_trans.At')}}</i> {{$row->date_fin}} </a></span>
                                    <span class="by"> 
                                      <i class="fas fa-map-marker-alt"></i> 
                                   
                                     {{ $row->lieu ?? '(vide)' }}
                                    .</span>
                                    <span class="by"> <i class="fas fa-link"></i>
                                   
                                     <a href="<?=$row->lien?>">{{ $row->lien ?? '(vide)' }}</a></span>
                                </div>
                                <p>
                                    {!! Str::limit($row->description, 60) !!}
                                </p>
                                <a href="{{url('/event',$row->id)}}" class="btn-defult" target="">{{trans('about_trans.Visit the link')}}</a>

                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>

                  <div class="pagination-area d-flex flex-wrap justify-content-center">
                   @if ($events->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                                <li class="prev"> <a ref="{{ $events->url(1) }}" class="{{ ($events->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                    <span>« Précédent</span></a></li>
                                @for ($i = 1; $i <= $publications->lastPage(); $i++)
                                <li class="{{ ($events->currentPage() == $i) ? ' active' : '' }} page-item">
                                       <a href="{{ $events->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                                @endfor
                                
                                <li class="dot">....</li>
                               
                                <li  class="{{ ($events->currentPage() == $events->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $events->url($events->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                            </ul>
                   @endif
                        </div>
            </div>
        </div>
    </section>

@endsection
