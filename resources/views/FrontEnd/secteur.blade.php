@extends('layouts.visiteur')

@section('content')
<!-- page header section start here  -->
<div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
               <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('secteur_trans.list of business sectors')}}</span>
                        </div>
                        <ol class="breadcrumb">
                            
                            <li><a href="{{url('/')}}">{{trans('secteur_trans.Home')}}</a></li>
                            <li class="active">{{trans('secteur_trans.list of business sectors')}}</li>
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
        <?php $isset = isset($message) ?>
								 @if($isset)
                                      <div class="alert alert-danger">
                                             <ul>
                                                           
                                                     <li> {{trans('about_trans.No result about your search')}}</li>
                                                        
                                             </ul>
                                         </div>
		                                  
                                  @endif  
            <form action="{{route('search.secteur')}}" method="GET" novalidate="novalidate" autocomplete="off">
            <div class="d-flex p-2">
            <div class="col-lg-9 col-md-9 col-sm-12 p-0">
						<input type="text" name="libelle" placeholder="{{trans('secteur_trans.Search by libelle')}}">
						</div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="button px-2 py-2 w-full" style="width:280px;height:45px;background-color:#F73087">{{trans('vip.Search')}}</button>
                        </div>
                        </div>
                        </form>
				
            <div class="row my-15">
        
            @foreach ($secteurs  as $row)
                <div class="col-md-6">
                    <div class="venue-item">
                        <div class="venue-thumb">
                             <a href="{{url('secteur',$row->id)}}">
                            <img src=" {{ asset('assests/images/secteurs/'.$row->image)}}" alt="" style="height: 260px">
                        </a>
                        </div>
                        <div class="venue-content">
                           <a href="{{url('secteur',$row->id)}}"><h6>{{$row->libelle}}</h6></a>
                            
                            <p>
                                {!! Str::limit($row->description,60) !!}.<a href="{{url('secteur',$row->id)}}">see more</a></p>
                            <div class="venue-location">
                            	
                                <div class="meta-post">
                                <span class="by"> 
                                    
                                    <a href="#"><i class="fa fa-user-tie"></i>  {{count($row->users->where('status',0))}}</a>
                                    
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
