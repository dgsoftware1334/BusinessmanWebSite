@extends('layouts.visiteur')

@section('content')

  <div class="page-header-section post-title style-1 " style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/3.jpg') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text"> {{trans('header_trans.Businessmans')}} </span>
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
                    <h3>Les hommes d'affaire </h3>
                    <br>
                     <div class="panel panel-default" style="background-color:#F0FFF0;border-radius: 30px;">

                       <br>

                          <form action="{{route('search')}}" method="post" class="flex justify-start items-center">

                            @csrf
                          <div class="form-row">



              <div class="form-group col-md-4 ">
                <input id="password" type="text" name="nom" id="text"  placeholder="Recherche par Nom" class="rounded-pill  px-2 py-2"  style="border-radius: 30px;height: 37px">
                      
              <div class="validate"></div>
            </div>



            <div class="form-group col-md-5">
             
                        <select class="form-select px-2 py-2 " aria-label=".form-select-lg example"  name="secteur" id="location" style="border-radius: 30px;">
                                <option selected>Recherche par un secteur d'activité<br>
                                </option>
                                @foreach ($secteurs as $row)
                            <option value="{{ $row->libelle }}">{{ $row->libelle }}</option>
                            @endforeach
                              </select>
               
                 </div>


                    <div class="form-group col-md-3">
               
                <!--button class="btn-defult"  type="submit" >Recherche
                </button!-->
                <input class="btn-defult px-2 py-2"  type="submit"  style="border-radius: 30px;height: 37px;width: 200px;background-color: red"  value="Recherche">
                        <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >  
                         <img src="https://img.icons8.com/office/22/000000/search--v1.png"/>
                        </span> 
           


                 </div>






          </div>
    </form>
    
                      </div>
                    
               
               
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
                                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker"  height="100px" width="100px">
                               @endif
                                @if(!is_null($row->photo))
                                <img src="{{ asset('assests/imgUser/'.$row->photo)  }}" alt="speaker" height="100px" width="100px" style="height: 190px;width: 600px">
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