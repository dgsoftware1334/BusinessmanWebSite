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
<!----recherche--------->
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
                    <h3>Resulta de recherche</h3>
                     <form  method="get" action="{{ url('search/user')}}">
                <div class="form-group">
                  <div class="input-group">
                    <input  type="search" class="form-control" value="user"  name="query">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="button">rechercher</button>
                    </span>
                  </div>
                </div>
              </form>
                  </div>
                  <section class="event-schedule style-4 padding-tb">
                <div class="container container-1310 p-0 p-md-auto">
                  <div class="section-wrapper">
                  
                    <div id="1st-Day" class="tabcontent active">
                      <div class="d-flex flex-wrap justify-content-center">
                        @foreach($search as  $row)


                   
            
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
                            <p> 
                              <img src="https://img.icons8.com/external-prettycons-lineal-prettycons/26/000000/external-price-tag-shopping-prettycons-lineal-prettycons-1.png"/>
                              @if(!is_null($row->secteur))
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

   <!---end recherche--------->

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
                    <h3>{{trans('header_trans.Businessmans')}}</h3>
                  </div>
                  <section class="event-schedule style-4 padding-tb">
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
                            <p> 
                              <img src="https://img.icons8.com/external-prettycons-lineal-prettycons/26/000000/external-price-tag-shopping-prettycons-lineal-prettycons-1.png"/>
                              @if(!is_null($row->secteur))
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