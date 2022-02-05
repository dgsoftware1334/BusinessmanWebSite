

<section class="event-speaker style-1 padding-tb">
    <div class="container container-1310">
      <div class="row">
        <div class="col-lg-4 col-12 sticky-widget">
          <div class="speaker-sidebar">
            <div class="sidebar-triker">
              <img src="{{ asset('assests/FrontEnd/assets/images/speaker/sidebar.png') }}" alt="">
            </div>
            <div class="sidebar-thumb" id="leftgear">
                  <div class="unlimitcon_hexagon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 177.4 197.4">
                          <path d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z"></path>
                      </svg>
                  </div>
                  <div class="unlimitcon_hexagon">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 177.4 197.4">
                          <path d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z"></path>
                      </svg>
                  </div>

                  <!-- <i class="services_icon flaticon-analytics"></i> -->
            </div>
            <div class="sidebar-content">
              <div class="section-header">
                <span>{{trans('usersbar_trans.Presentation')}}</span>
                <h2>{{trans('usersbar_trans.Some sectors with users')}}</h2>
               
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12">
           @foreach ($secteurs as $row1)
          <div class="speaker-event">
            <div class="speaker-title">
              <h2>{{$row1->libelle}}</h2>
              <p>{{count($row1->users->where('status',0))}} hommes d'affaires<span> dans ce secteur d'activit </span></p>
            </div>
            <div class="speaker-wrapper">
              
           <?php 
//$row3=$row1->users->take(1)->get();
           $row3=$row1->users->where('status',0)->take(3);

   ?>
              @foreach($row3 as $row)
           
              <div class="speaker-item">
                <div class="speaker-item-inner">
                  <div class="speaker-thumb">

                   
                    @if(is_null($row->photo))
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker"  style="height: 290px;width: 290px">
               @endif

              @if(!is_null($row->photo))
              <img src="{{ asset('assests/imgUser/'.$row->photo)  }}" alt="speaker" style="height: 290px;width: 290px">
              @endif




                  </div>
                  <div class="speaker-content">
                    <div class="speaker-top">
                      <h2>{{$row->id}}.</h2>
                      <div class="speaker-info">
                        <p>{{$row->diplom}} en <a href="{{url('/show',$row->id)}}">Visitez son profil</a></p>
                        <h4><a href="{{url('/show',$row->id)}}">{{$row->name}}  {{$row->lastname}}</a></h4>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
               @endforeach

              
            </div>
          </div>
            @endforeach
         
        </div>
      </div>
    </div>
  </section>