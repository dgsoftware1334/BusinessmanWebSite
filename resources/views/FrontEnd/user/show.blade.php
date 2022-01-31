 @extends('layouts.visiteur')

@section('content')
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
              <a href="#">{{ $user->name }}  {{ $user->lastname }}</a>
             
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
  <section class="speaker-profile padding-tb bg-ash">
        <div class="container container-1310">
          <div class="row">
            <div class="col-lg-4">
                <div class="speaker-info">
                    <div class="personal-information">
                        <h5>{{trans('profil_trans.Personal information')}} </h5>
                        <ul>
                            <li><p>{{trans('profil_trans.Family name')}}</p><span>{{$user->name}}</span></li>
                            <li><p>{{trans('profil_trans.Last name')}}</p><span>{{$user->lastname}} </span></li>
                            <li><p>{{trans('profil_trans.Date of birth')}}</p><span>{{$user->datenaissance}} </span></li>
                            <li><p>{{trans('profil_trans.Phone')}}</p><span>{{$user->phone}}</span></li>
                            <li><p>{{trans('profil_trans.Address')}}</p><span>{{$user->address}}</span></li>
                            <li><p>email</p><span> {{$user->email}}</span></li>
                             <li><p>{{trans('profil_trans.Diploma')}}</p><span>{{$user->diplome}}</span></li>
                            <li><p>{{trans('profil_trans.Website')}}</p><span>{{$user->siteweb}} </span></li>
                          <li><p>secteur d'activité</p><span>
                         @if(is_null($user->secteur_id))
                          vide 
                         
                          @endif
                           @if(!is_null($user->secteur_id))
                             {{ $user->secteur->libelle}}
                          @endif
                            
                        </span></li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="speaker-details">
                    <div class="personal-articals">
                        <h5>{{trans('profil_trans.Description')}}</h5>
                        <p>{{$user->description}}</p>
                        
                        <!--img src="{{ asset('assests/FrontEnd/assets/images/speaker/name.png') }}" alt="personal-cv"-->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- speaker profile or cv section ending here -->

   
 
    @endsection