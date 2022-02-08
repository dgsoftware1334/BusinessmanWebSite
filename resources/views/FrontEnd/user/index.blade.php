
@extends('layouts.visiteur')

@section('content')
<style>
        input,
        select{
            width: 200px;
            height: 50px;
            margin: 2px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        button {
            width: 150px;
            height: 50px;
            margin: 2px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fd3d6b;
        }

    </style>

<style>
        input,
        select{
            width: 200px;
            height: 50px;
            margin: 2px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        button {
            width: 150px;
            height: 50px;
            margin: 2px;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background-color: #fd3d6b;
        }

    </style>

  <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/3.jpg') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text"> {{trans('header_trans.Businessmans')}} </span>
                        </div>
                        <ol class="breadcrumb">
                          
                          
                     <li ><a href="{{ url('/') }}">{{trans('header_trans.Home')}}</a></li>
                    <li class="active">{{trans('header_trans.Businessmans')}}</li>
                        </ol>
                        
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
<!-- page header section -->

    <!-- end page header section -->



    <div class="event-with-sidebar-section">
      <div class="container container-1310">
        <div class="section-wrapper">
          <div class="row">
            <div class="col-lg-8">
              <div class="event-main-part">
              
             <section class="related-even-section style-1 padding-tb">
                <div class="container container-1310 p-0 p-md-auto">
                  <div class="section-header">
                    <br>
                    <h3>{{trans('about_trans.Businessmen')}}</h3>
                    <br>
                  
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="align:center;">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-red-100 w-2/3 p-4 ">
              
                <form action="{{route('search')}}" method="GET" class="flex justify-start items-center">

                    @csrf
                
                    <div style="float:left;">
                        <select name="secteur"  class="px-2 py-2 w-full">
                        <option value="">{{trans('about_trans.Sector')}}...</option>
                            @foreach ($secteurs as $secteur)
                            <option value="{{ $secteur->libelle }}">{{ $secteur->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="float:left;">

                        <input type="text" name="nom" placeholder="{{trans('about_trans.Name')}}" id="text" class="px-2 py-2 w-full">
                    </div>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div style="float:left;">

                        <button type="submit">
                        {{trans('about_trans.Search')}}</button>
                    </div>
                



                </form>
                <div style="clear:both;">&nbsp;</div>
                <hr>

              
              
                <h2>{{trans('about_trans.The results of your search')}}:</h2>

                <section class="event-schedule style-4 padding-tb" ><p> </p>
                <div class="container container-1310 p-0 p-md-auto" >
                  <div class="section-wrapper"  >
                    

                  
                    <div id="1st-Day" class="tabcontent active">
                      <div class="d-flex flex-wrap justify-content-center">
                        @foreach($users as  $row)
                       


                   
            
                        <div class="speaker-item" style="width: 280px">
                          <div class="speaker-item-inner">
                            <div class="item-thumb">
                             <a href="{{url('/show',$row->id)}}">

                               @if(is_null($row->photo))
                                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker"  style="height: 190px;width: 400px">
                               @endif
                                @if(!is_null($row->photo))
                                <img src="{{ asset('assests/imgUser/'.$row->photo)  }}" alt="speaker" style="height: 190px;width: 400px">
                                @endif



                            </a>
                            </div>
                            <div class="item-content">
                            <a href="{{url('/show',$row->id)}}" class="name">{{$row->name}}  {{$row->lastname}}
                            </a>
                            <span> {{ $row->secteur->libelle ?? '(vide)' }}</span> 
                            </div>
                                    </div>
                        </div>
                         
                        @endforeach
                      </div>
                    </div>

                    

                    
                  </div>
                </div>
              </section>  

               

                <!--@if (isset($message))
                <img src="{{asset('assests/FrontEnd/assets/images/notfound.png')}}" alt="notfoud" >

                <p class="">{{$message}}</p> {{trans('about_trans.ىضكث')}}: "{{$query}}"

                @endif-->
            </div>
        </div>
    </div>
               
               
                  </div>
                  <!-- Search form -->

                 
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
                                        <li><a href="{{ url('/secteur',$row->id) }}">{{$row->libelle}}</a><span>
                                       
                                          ({{count($row->users->where('status',0))}})</span></li>
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
                     <h5>{{trans('about_trans.Connect you with us')}}</h5>
                      <p>{{trans('about_trans.Connect you to our social medias')}}</p>
                    </div>
                    <div class="sidebar-wrapper">
                      <div class="sidebar-social-media">
                          @foreach($chambres as $chambre)
                      <div class="sidebar-social-media">
                                            <div class="social-item">
                                                <a href="<?= $chambre->fb?>" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="<?= $chambre->fb?>" class="icon-title">facebook</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="<?= $chambre->twit?>" class="icon twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <a href="<?= $chambre->twit?>" class="icon-title" target="_blank">twitter</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="<?= $chambre->linked?>" class="icon linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                <a  href="<?= $chambre->linked?>"class="icon-title" target="_blank">linkedin</a>
                                            </div>
                                            
                                            
                                            <div class="social-item">
                                                <a href="<?= $chambre->insta?>" class="icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                                <a href="<?= $chambre->insta?>" class="icon-title" target="_blank">instagram</a>
                                            </div>
                                            
                      </div>
                      @endforeach
                                          
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