 @extends('layouts.visiteur')
 @section('content')
 <link rel="stylesheet" href="{{ asset('https://www.w3schools.com/w3css/4/w3.css') }}">


 <script type="text/javascript">
   $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
 </script>
 <style type="text/css">
   /****** IGNORE ******/

.copyright {
  display:block;
  margin-top: 100px;
  text-align: center;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 12px;
  font-weight: bold;
  text-transform: uppercase;
}
.copyright a{
  text-decoration: none;
  color: #EE4E44;
}


/****** CODE ******/

.file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
 </style>

  <div class="page-header-section post-title style-2"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/17.jpg') }})">
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="speaker">
            <div class="speaker-thumb">
               @if(is_null(Auth::guard('web')->user()->photo))
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker" width="190" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
               @endif

              @if(!is_null(Auth::guard('web')->user()->photo))
              <img src="{{ asset('assests/imgUser/'.Auth::guard('web')->user()->photo)  }}" alt="speaker" width="190" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
              @endif
            </div>
            <div class="speaker-content">
              <a>{{ Auth::guard('web')->user()->name }}  {{ Auth::guard('web')->user()->lastname }}</a>
             
            </div>
          </div>
          <div class="page-social">
            <ul class="social-link-list d-flex flex-wrap">
            
              <li><a href="<?=Auth::guard('web')->user()->lienfb?>" class="facebook"  target="_blank" ><i class=" fab fa-facebook-f"></i></a>

              </li>
              <li><a href="<?=Auth::guard('web')->user()->lientwit?>"target="_blank"  class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
            
              <li><a href="<?=Auth::guard('web')->user()->lieninsta ?>" target="_blank" class="facebook" style="background-color: #FF1493;"><i class="fab fa-instagram"></i></a></li>
              <li><a href="<?=Auth::guard('web')->user()->linked ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>
            </div>
        </div>
    </div>

  
    <!-- speaker profile or cv section ending here -->
    <!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <section class="personal-schedule padding-tb">
      <!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

<!-- The Grid -->
<div class="w3-row-padding">

  <!-- Left Column -->
  <div class="w3-third">
  
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-display-container">
      @if(is_null(Auth::guard('web')->user()->photo))
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker" width="190" style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width: 600px"  >
               @endif

              @if(!is_null(Auth::guard('web')->user()->photo))
              <img src="{{ asset('assests/imgUser/'.Auth::guard('web')->user()->photo)  }}" alt="speaker" width="190" style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width: 600px"  >
              @endif
              <br> <br> <br> <br> 
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2>{{Auth::guard('web')->user()->name}} &nbsp; {{Auth::guard('web')->user()->lastname}} </h2>
        </div>
      </div>
      <div class="w3-container">
      <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->datenaissance}}
        <?php $dob=Auth::guard('web')->user()->datenaissance?>
       
        <span class="tag  w3-round" style="color:#fd3d6b">( {{ \Carbon\Carbon::parse($dob)->diff(\Carbon\Carbon::now())->format('%y years') }})</p>

        <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->address}}</p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large "style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->email}}</p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->phone}}</p>
           <p><i class="fas fa-globe fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>
         @if(!is_null(Auth::guard('web')->user()->siteweb))

          {{Auth::guard('web')->user()->siteweb}}
          @endif

            @if(is_null(Auth::guard('web')->user()->siteweb))
          (vide)</p>
          @endif
        

      
    
      
     
      </div>
    </div><br>

  <!-- End Left Column -->
  </div>

  <!-- Right Column -->
  <div class="w3-twothird">
  
  

    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fas fa-briefcase" style="color:#fd3d6b"></i>&ensp;{{trans('profil_trans.Professional information')}}</h2>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Diploma')}}</b></h5>
        <h6 style="color:#fd3d6b"><i class="fas fa-user-graduate"></i>&ensp;
          {{ Auth::guard('web')->user()->diplome ?? '(vide)' }}
        </h6>
        
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Activity area')}}</b></h5>
        <h6 style="color:#fd3d6b"><i class="fas fa-globe-africa" style="color:#fd3d6b"></i>
        {{ Auth::guard('web')->user()->secteur->libelle ?? '(vide)' }}  ( {{ Auth::guard('web')->user()->anneexp->anneexp ?? '0' }} anneé exprience )
      </h6>
        <p> 

            </p>
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Description')}}</b></h5>
        
        <p> {{ Auth::guard('web')->user()->description}}</p><br>
      </div>
    </div>

  <!-- End Right Column -->
  </div>
  
<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

    </section> 
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!-- mise a jour les information pro -->
    <section class="personal-schedule padding-tb">
        <div class="container container-`1310">
          
            <div class="section-header">
               
                <h2>{{trans('profil_trans.Updates personal information')}}</h2>
             
            </div>

            <div class="section-wrapper">
              <div class="accordion-item">
                <div class="accordion-question in">
                  <!--span><i class="fa fa-clock"></i> 8:30 am</span-->
                  <!--h6>Business Market Research</h6-->
                  <i class="fas fa-angle-double-down"></i>
                </div>

        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          
          <div class="col-lg-8 offset-2">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
               
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
              <form class="form-horizontal" method="POST" action="{{ route('user.update.informationPro',[Auth::guard('web')->user()->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  

                    @csrf
          <div class="form-inner">
           <!----input type="text" class="form-control"  placeholder="Enter lien facebook"-->
            <input type="text" class="form-control" name="lienfb" placeholder="https//www.facebook.com" value="{{ old('lienfb') }}">
            <input type="text" class="form-control" name="lieninsta" placeholder="https//www.instagram.com">
            <input type="text" class="form-control" name="lientwit" placeholder=" https//www.twiter.com">
            <input type="text" class="form-control" name="linked" placeholder="  https//www.linkedin.com">
            <input type="text" class="form-control" name="diplome" placeholder="Diploma">
            <input type="text" class="form-control" name="siteweb" placeholder="https//www.votreSiteWeb.com">
            <input type="integer" class="form-control" name="anneexp" placeholder="Année exprience">
             <br>
           
            <select name="sacteur_id" id="department" class="form-control">
            <option value=""> -- Select One --</option>
<?php
$status = true;
?>
@foreach($secteurs as $secteur)
@if((isset(Auth::guard('web')->user()->secteur->id)))
  @if( (Auth::guard('web')->user()->secteur->id == $secteur->id))
  <option value="{{ $secteur->id }}" selected>{{ $secteur->libelle }}</option>
  @endif
@endif


@if(Auth::guard('web')->user()->secteur_id!= $secteur->id && $status  )

<option value="{{ $secteur->id }}">{{ $secteur->libelle }}</option>
<?php
$status = true;
?>
@endif


@endforeach


            </select>





    
            <br>
           <div class="file-upload">
              <div class="file-select">
                <div class="file-select-button" id="fileName">Choisis une image</div>
                <div class="file-select-name" id="noFile">Image...</div> 
                <input type="file" name="photo" id="chooseFile">
              </div>
            </div>
                      <br>
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">{{trans('profil_trans.Confirm')}}</button>
           

                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
          
        </div>
       
     
            </div>
        </div>
    </section>
    <!-- personal shedul section ending here -->

   



    <!-- mise a jour les information personnel -->
    <section class="personal-schedule padding-tb">
        <div class="container container-`1310">
           

            <div class="section-header">
               
                <h2>{{trans('profil_trans.Updates professional information')}}</h2>
             
            </div>


            <div class="section-wrapper">
              <div class="accordion-item">
                <div class="accordion-question in">
                  <!--span><i class="fa fa-clock"></i> 8:30 am</span-->
                  <!--h6>Business Market Research</h6-->
                  <i class="fas fa-angle-double-down"></i>
                </div>

        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          
          <div class="col-lg-8 offset-2">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
               
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
              <form class="form-horizontal" method="POST" action="{{ route('user.update.informationPar',[Auth::guard('web')->user()->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  

                    @csrf
          <div class="form-inner">
           <!----input type="text" class="form-control"  placeholder="Enter lien facebook"-->
           <input type="text" class="form-control" name="name" placeholder="{{trans('register_trans.Name')}}" value="{{ Auth::guard('web')->user()->name}}" class="@error('name') is-invalid @enderror">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>

          <input type="text" class="form-control" name="lastname" placeholder="{{trans('register_trans.First Name')}}" value="{{ Auth::guard('web')->user()->lastname }}">
           <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>

          <input type="date" class="form-control" name="datenaissance" placeholder="date de naissance" value="{{ Auth::guard('web')->user()->datenaissance }}">
          <span class="text-danger">@error('datenaissance'){{ $message }} @enderror</span>


          <input type="text" class="form-control" name="phone" placeholder="{{trans('register_trans.Phone')}}" value="{{ Auth::guard('web')->user()->phone}}">
         <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

       <input type="text" class="form-control" name="address" placeholder="{{trans('register_trans.Address')}}" value="{{Auth::guard('web')->user()-> address }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

          

           <input type="text" class="form-control" name="email" placeholder="{{trans('register_trans.Email')}}" value="{{ Auth::guard('web')->user()->email }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>  
          <textarea class="form-control" name="description" placeholder="{{trans('register_trans.Description')}}" value="{{ Auth::guard('web')->user()->description }}">{{ Auth::guard('web')->user()->description }}</textarea>
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

             <br>
          <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password"  placeholder="{{trans('register_trans.Current password')}}">
         
          <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" placeholder="{{trans('register_trans.Password')}}">
                           
          <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" placeholder="{{trans('register_trans.Confirm Password')}}">
   


<br>
             
      
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">{{trans('profil_trans.Confirm')}}</button>
           

                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
          
        </div>
       
     
            </div>
        </div>
    </section>
    <!-- personal shedul section ending here -->

 
    @endsection