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
               @if(is_null($user->photo))
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker" width="190" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
               @endif

              @if(!is_null($user->photo))
              <img src="{{ asset('assests/imgUser/'.$user->photo)  }}" alt="speaker" width="190" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
              @endif
            </div>
            <div class="speaker-content">
              <a >{{ $user->name }}  {{ $user->lastname }}</a>
             
            </div>
          </div>
          <div class="page-social">
            <ul class="social-link-list d-flex flex-wrap">
            
              <li><a href="<?=$user->lienfb?>" class="facebook"  target="_blank" ><i class=" fab fa-facebook-f"></i></a>

              </li>
              <li><a href="<?=$user->lientwit?>"target="_blank"  class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
            
              <li><a href="<?=$user->lieninsta ?>" target="_blank" class="facebook" style="background-color: #FF1493;"><i class="fab fa-instagram"></i></a></li>
              <li><a href="<?=$user->linked ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>
            </div>
        </div>
    </div>

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
      @if(is_null($user->photo))
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker" width="190" style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width: 600px"  >
               @endif

              @if(!is_null($user->photo))
              <img src="{{ asset('assests/imgUser/'.$user->photo)  }}" alt="speaker" width="190" style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width: 600px"  >
              @endif
              <br> <br> <br> <br> 
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <br> <br> 
          <h2>{{$user->name}} &nbsp; {{$user->lastname}} </h2>
        </div>
      </div>
      <div class="w3-container">
        <i class="fas fa-birthday-cake fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{$user->datenaissance}}
        <?php $dob=$user->datenaissance?>
       
        <span class="tag  w3-round" style="color:#fd3d6b">( {{ \Carbon\Carbon::parse($dob)->diff(\Carbon\Carbon::now())->format('%y years') }})</p>

        <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{$user->address}}</p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large "style="color:#fd3d6b"></i>{{$user->email}}</p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{$user->phone}}</p>
        
        <p><i class="fas fa-globe fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>
          @if(!is_null($user->siteweb))
          {{$user->siteweb}}
          @endif

            @if(is_null($user->siteweb))
          (vide)</p>
          @endif
        

      
    
      
     
      </div>
    </div><br>

  <!-- End Left Column -->
  </div>

  <!-- Right Column -->
  <div class="w3-twothird">
  
  

    <div class="w3-container w3-card w3-white">
      <h2 class="w3-text-grey w3-padding-16"><i class="fas fa-briefcase fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>&ensp;{{trans('profil_trans.Professional information')}}</h2>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Diploma')}}</b></h5>
        <h6 style="color:#fd3d6b"><i class="fas fa-user-graduate fa-fw w3-margin-right w3-large "></i>&ensp;
       @if(is_null($user->diplome))
           (vide)
      @endif
       @if(!is_null($user->diplome))
          {{$user->diplome}} 
      @endif
        </h6>
        
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Activity area')}}</b></h5>
        <h6 style="color:#fd3d6b"><i class="fas fa-globe-africa fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>
      {{ $user->secteur->libelle ?? '(vide)' }}  ({{ $user->anneexp ?? '0' }} anneé exprience )
      </h6>
       
          <p>    
</p>
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Description')}}</b></h5>
        
        <p> {{ $user->description}}</p><br>
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

   

 
    @endsection