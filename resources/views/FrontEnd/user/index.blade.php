@extends('layouts.visiteur')

@section('content')

  <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/3.jpg') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text"> <span>{{trans('header_trans.Businessmans')}} </span></span>
                        </div>
                        <ol class="breadcrumb">
                            <li>Tu es là : </li>
                            <li><a href="index.html">{{trans('header_trans.Businessmans')}}</a></li>
                            <li class="active">{{trans('header_trans.Home')}}</li>
                        </ol>
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>

    <div class="event-with-sidebar-section">
      <div class="container container-1310">
        <div class="section-wrapper">
          <div class="row">
            <div class="col-lg-8">
              <div class="event-main-part">
              
              <!-- related event section start here -->
              <section class="related-even-section style-1 padding-tb">
                <div class="container container-1310 p-0 p-md-auto">
                  <div class="section-header">
                    <br>
                    <h3>Publications </h3>
                    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-red-100 w-2/3 p-4 ">
                <form action="{{route('search')}}" method="post" class="flex justify-start items-center">

                    @csrf
                    <div class="form-group w-1/3 mr-2">
                        <select name="secteur" id="location" class="px-2 py-2 w-full">
                            @foreach ($secteurs as $row)
                            <option value="{{ $row->libelle }}">{{ $row->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mr-2 w-1/3">

                        <input type="text" name="nom" id="text"
                            class="rounded w-full border border-gray-100 px-2 py-2">
                    </div>

                    <div class="form-group w-1/3">

                        <button type="submit"
                            class="px-2 py-2 bg-indigo-600 hover:bg-indigo-500 text-white w-full rounded">
                            Search</button>
                    </div>



                </form> </div> </div> </div>
                  </div>
                  <!-- Search form -->

                  <section class="event-schedule style-4 padding-tb"><p> </p>
                <div class="container container-1310 p-0 p-md-auto">
                  <div class="section-wrapper">
                    

                  
                    <div id="1st-Day" class="tabcontent active">
                      <div class="d-flex flex-wrap justify-content-center">
                        @foreach($users as  $row)


                   
            
                        <div class="speaker-item">
                          <div class="speaker-item-inner">
                            <div class="item-thumb">
                             <a href="{{url('/show',$row->id)}}">

                               @if(is_null($row->photo))
                                <img src="{{ asset('assests/FrontEnd/assets/images/1.png')  }}" alt="speaker" >
                               @endif
                                @if(!is_null($row->photo))
                                <img src="{{ asset('assests/imgUser/'.$row->photo)  }}" alt="speaker">
                                @endif



                            </a>
                            </div>
                            <div class="item-content">
                            <a href="#" class="name">{{$row->name}}  {{$row->lastname}}</a>
                            <p> @if(!is_null($row->secteur))
                                    {{$row->secteur->libelle}}
                                 @endif
                                 @if(is_null($row->secteur))
                                   Vide
                                 @endif
                            </p>
                            </div>
                                    </div>
                        </div>
                        @endforeach
                      </div>
                    </div>

                    

                    
                  </div>
                </div>
              </section>  
              </section>
              <!-- related event section ending here -->
            </div>
          </div>
        <div class="col-lg-4 clo-sm-12">
                    <div class="get-sidebar">
                       
                        <div class="sidebar-item">
                            <div class="sidebar-inner">
                                <div class="sidebar-header">
                                    <h5>{{trans('header_trans.Secteur')}}</h5>
                                </div>
                                <div class="sidebar-wrapper">
                                    <ul class="post-catagori">
                                      @foreach($secteurs as $row)
                                        <li><a href="#">{{$row->libelle}}</a><span>({{count($row->users)}})</span></li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-item  sidebar-media no-gutters">
                           <div class="sidebar-item sidebar-media no-gutters">
                <div class="sidebar-inner">
                  <div class="sidebar-wrapper">
                    <div class="sidebar-header">
                     <h5>Connecte-toi avec nous</h5>
                      <p>Connectez-vous à nos réseaux sociaux</p>
                    </div>
                    <div class="sidebar-wrapper">
                      <div class="sidebar-social-media">
                                            <div class="social-item">
                                                <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#" class="icon-title">facebook</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon twitter"><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="icon-title">twitter</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                                                <a href="#" class="icon-title">linkedin</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon behance"><i class="fab fa-behance"></i></a>
                                                <a href="#" class="icon-title">behance</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon google"><i class="fab fa-google-plus-g"></i></a>
                                                <a href="#" class="icon-title">google</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon instagram"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="icon-title">instagram</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon tumblr"><i class="fab fa-tumblr"></i></a>
                                                <a href="#" class="icon-title">tumblr</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon youtube"><i class="fab fa-youtube"></i></a>
                                                <a href="#" class="icon-title">youtube</a>
                                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                        </div>


                      
                      
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>








@endsection