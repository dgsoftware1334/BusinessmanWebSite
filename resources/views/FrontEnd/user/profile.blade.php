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
            
              <li><a href="<?=Auth::guard('web')->user()->lienfb?>" class="facebook"  target="_blank" style="width:50px;height:50px; border-radius : 50%;
    position: relative;" ><i class=" fab fa-facebook-f" ></i></a>

              </li>
              <li><a href="<?=Auth::guard('web')->user()->lientwit?>"target="_blank"  class="twitter-sm" style="width:50px;height:50px; border-radius : 50%;
    position: relative;"><i class="fab fa-twitter"></i></a></li>
            
              <li><a href="<?=Auth::guard('web')->user()->lieninsta ?>" target="_blank" class="facebook" style="background-color: #FF1493; width:50px;height:50px; border-radius : 50%;
    position: relative;"><i class="fab fa-instagram"></i></a></li>
              <li><a href="<?=Auth::guard('web')->user()->linked ?>" target="_blank" class="linkedin" style="width:50px;height:50px; border-radius : 50%;
    position: relative;"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>
            </div>
        </div>
    </div>

  <!--------------------------------------------------------------------modal1---------------------------------->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
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
          
              <form class="form-horizontal" method="POST" action="{{ route('user.update.informationPro',[Auth::guard('web')->user()->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  

                    @csrf
                    <div class="d-flex justify-content-center">
          <div class="form-inner">
           <!----input type="text" class="form-control"  placeholder="Enter lien facebook"-->
           <div class='form-row'>
            <div class="col-xs-12 form-group">
           <select name="sacteur_id" id="department" class="form-control" style="width:300px;">
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


            </select></div></div>
            <br>
            <div class='form-row'>
            <div class="col-xs-12 form-group">
           <input type="text" style="width:300px;" class="form-control" name="diplome" placeholder="Diplome" value="{{Auth::guard('web')->user()->diplome}}">
           </div> </div>

           <div class='form-row'>
            <div class="col-xs-12 form-group">
           <input type="integer" style="width:300px;" class="form-control" name="anneexp" placeholder="Année exprience" value="{{Auth::guard('web')->user()->anneexp}}"><br>
           </div> </div>
           <div class='form-row'>
            <div class="col-xs-12 form-group">
           <span>Ici vous pouvez ajouter un ficher (cv)</span>
            <input type="file" style="width:300px;" class="form-control" name="file" placeholder="{{trans('register_trans.File')}}" value="{{ old('file') }}">
            </div> </div>

            <div class='form-row'>
            <div class="col-xs-12 form-group">
            <input type="url"  style="width:300px;" class="form-control" id="FacebookUrl" name="lienfb" placeholder="https//www.facebook.com" value="{{Auth::guard('web')->user()->lienfb}}">
            </div> </div>
            <div class='form-row'>
            <div class="col-xs-12 form-group">
            <input type="url" style="width:300px;" class="form-control" id="InstaUrl" name="lieninsta" placeholder="https//www.instagram.com" value="{{Auth::guard('web')->user()->lieninsta}}">
            </div> </div>
            <div class='form-row'>
            <div class="col-xs-12 form-group">
            <input type="url" style="width:300px;" class="form-control" id="TwitUrl" name="lientwit" placeholder=" https//www.twiter.com" value="{{Auth::guard('web')->user()->lientwit}}">
            </div> </div>
            <div class='form-row'>
            <div class="col-xs-12 form-group">
            <input type="url" style="width:300px;" class="form-control" name="linked" placeholder="  https//www.linkedin.com" value="{{Auth::guard('web')->user()->linked}}">
            </div> </div>
            <div class='form-row'>
            <div class="col-xs-12 form-group">
            <input type="url" style="width:300px;" class="form-control" name="siteweb" placeholder="https//www.votreSiteWeb.com" value="{{Auth::guard('web')->user()->siteweb}}">
            </div> </div>
            <br>
           <div class="file-upload">
              <div class="file-select">
                <div class="file-select-button" id="fileName">Choisis une image</div>
                <div class="file-select-name" id="noFile">Image...</div> 
                <input type="file" style="width:300px;" name="photo" id="chooseFile" value="{{Auth::guard('web')->user()->photo}}">
              </div>
            </div>
                      <br>
           <button type="submit" id="SendBtn" onclick="return validateUrl();" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">{{trans('profil_trans.Confirm')}}</button>
           

                </div>
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
    </div>
  </div>
</div>
  <!-------------------------------------------------------------------------end modal--------------------------------------->
    <!-- speaker profile or cv section ending here -->
    <!---------------------------------------------------------------------modal2-------------------------------------------------------------------------------------------->
    <!-- Button trigger modal -->
 

<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
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
              <form class="form-horizontal" method="POST" action="{{ route('user.update.informationPar',[Auth::guard('web')->user()->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  

                    @csrf
          <div class="form-inner">
           <!----input type="text" class="form-control"  placeholder="Enter lien facebook"-->
           <div class='form-row'>
            <div class="col-xs-12 form-group">
           <input type="text" style="width:300px;" class="form-control" name="name" placeholder="{{trans('register_trans.Name')}}" value="{{ Auth::guard('web')->user()->name}}" class="@error('name') is-invalid @enderror">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>
           </div> </div>

           <div class='form-row'>
            <div class="col-xs-12 form-group">
          <input type="text" style="width:300px;" class="form-control" name="lastname" placeholder="{{trans('register_trans.First Name')}}" value="{{ Auth::guard('web')->user()->lastname }}">
           <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
           </div> </div>

           <div class='form-row'>
            <div class="col-xs-12 form-group">
          <input type="date"  style="width:300px;"class="form-control" name="datenaissance" placeholder="date de naissance" value="{{ Auth::guard('web')->user()->datenaissance }}">
          <span class="text-danger">@error('datenaissance'){{ $message }} @enderror</span>
          </div> </div>
          <div class='form-row'>
            <div class="col-xs-12 form-group">
          <input type="text" style="width:300px;" class="form-control" name="phone" placeholder="{{trans('register_trans.Phone')}}" value="{{ Auth::guard('web')->user()->phone}}">
         <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
         </div> </div>
         <div class='form-row'>
            <div class="col-xs-12 form-group">
       <input type="text" style="width:300px;" class="form-control" name="address" placeholder="{{trans('register_trans.Address')}}" value="{{Auth::guard('web')->user()-> address }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
          </div> </div>
          
          <div class='form-row'>
            <div class="col-xs-12 form-group">
           <input type="text" style="width:300px;" class="form-control" name="email" placeholder="{{trans('register_trans.Email')}}" value="{{ Auth::guard('web')->user()->email }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>  
          <textarea class="form-control" name="description" placeholder="{{trans('register_trans.Description')}}" value="{{ Auth::guard('web')->user()->description }}">{{ Auth::guard('web')->user()->description }}</textarea>
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
          </div> </div>
             <br>
             <div class='form-row'>
            <div class="col-xs-12 form-group">
          <input style="width:300px;" id="password" type="password" class="form-control" name="current_password" autocomplete="current-password"  placeholder="{{trans('register_trans.Current password')}}">
          </div> </div>
          <div class='form-row'>
            <div class="col-xs-12 form-group">
          <input style="width:300px;" id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" placeholder="{{trans('register_trans.Password')}}">
          </div> </div>     
          <div class='form-row'>
            <div class="col-xs-12 form-group">         
          <input style="width:300px;" id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" placeholder="{{trans('register_trans.Confirm Password')}}">
          </div> </div>     


<br>
             
<div class='form-row'>
            <div class="col-xs-12 form-group"> 
           <button style="width:300px;" type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">{{trans('profil_trans.Confirm')}}</button>
           </div> </div>   

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
    </div>
  </div>
</div>
<!----------------------------------------------------------------end modal2----------------------------------->
    <section class="personal-schedule padding-tb">
      <!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

<!-- The Grid -->
<div class="w3-row-padding">

  <!-- Left Column -->
  <div class="w3-third">
  
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-display-container img-responsive" >
      @if(is_null(Auth::guard('web')->user()->photo))
      <div class="d-flex justify-content-center">
                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker"  style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width: 300px;  margin-top: 50px;margin-bottom: 50px;margin-right: 150px;margin-left: 80px;position:static;">
                </div>
                @endif

              @if(!is_null(Auth::guard('web')->user()->photo))
              <div class="d-flex justify-content-center">
              <img src="{{ asset('assests/imgUser/'.Auth::guard('web')->user()->photo)  }}" alt="speaker"  style="border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 240px;width:300px; margin-top: 50px;margin-bottom: 50px;margin-right: 150px;margin-left: 80px;"  >
              </div>
              @endif
              <br> <br> <br> <br> 
        <div class="w3-display-bottomleft w3-container w3-text-black">
          <h2>{{Auth::guard('web')->user()->name}} &nbsp; {{Auth::guard('web')->user()->lastname}} </h2>
        </div>
      </div>
      <div class="w3-container">
      <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->datenaissance}}
        <?php $dob=Auth::guard('web')->user()->datenaissance?>
       
        <span class="tag  w3-round" style="color:#fd3d6b">( {{ \Carbon\Carbon::parse($dob)->diff(\Carbon\Carbon::now())->format('%y') }}) {{trans('profil_trans.Years')}}</p>

        <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->address}}</p>
        <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large "style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->email}}</p>
        <p><i class="fa fa-phone fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>{{Auth::guard('web')->user()->phone}}</p>
           <p><i class="fas fa-globe fa-fw w3-margin-right w3-large " style="color:#fd3d6b"></i>
         @if(!is_null(Auth::guard('web')->user()->siteweb))

         <a href="<?=Auth::guard('web')->user()->siteweb?>">{{Auth::guard('web')->user()->siteweb}}</a> 
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
          {{ Auth::guard('web')->user()->diplome ?? '(----)' }}
        </h6>
        
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Activity area')}}</b></h5>
        <h6 style="color:#fd3d6b"><i class="fas fa-globe-africa" style="color:#fd3d6b"></i>
        {{ Auth::guard('web')->user()->secteur->libelle ?? '(----)' }}  ( {{ Auth::guard('web')->user()->anneexp ?? '0' }} {{trans('profil_trans.Years of experience')}}  )
      </h6>
        <p> 

            </p>
        <hr>
      </div>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.Description')}}</b></h5>
        
        <p> {{ Auth::guard('web')->user()->description}}</p><br>
      </div>
      <hr>
      <div class="w3-container">
        <h5 class="w3-opacity"><b>{{trans('profil_trans.File (CV)')}} </b></h5>
       
       <?php $user=Auth::guard('web')->user()?>
        <a href=" {{url('user/download',$user->file)}}"><i class="fas fa-download"></i>&ensp;{{trans('profil_trans.Click here if you want to download the CV')}}</a>
      </div>
      <hr>
   
      <div class="w3-container">
      <div class="d-flex justify-content-center">
      <div class="d-flex justify-content-start">
      <button type="button" class="button" data-toggle="modal" data-target=".bd-example-modal-lg" style="width:360px;height:50px;background-color:#F73087">{{trans('profil_trans.Update your professional data')}} &nbsp; <i class="fa-solid fa-pen-to-square"></i>
      </button>
      </div>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
      <div class="d-flex justify-content-end"> 
        <button type="button" class="button" data-toggle="modal" data-target=".bd-example-modal-lg2" style="width:350px;height:50px;background-color:#F73087">{{trans('profil_trans.Update your personnal data')}} &nbsp;  <i class="fa-solid fa-user-pen"></i>
      </button>
    </div>
    </div>
      </div><hr>
    </div>
    <br><br>
  <!-- End Right Column -->
  </div>
  <br><br><hr>
<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

    </section> 
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!-- mise a jour les information pro -->
    <!-- personal shedul section ending here -->

   



    <!-- mise a jour les information personnel -->
   
    <!-- personal shedul section ending here -->

    <script>
          function urlLocate() {
    var url = document.getElementById("url").value;
    var regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
    if (url != "") {
        if (!regexp.test(url)) {
            alert("Please enter valid url.");
        } else {
            window.location.assign(url);
        }
    }
    else {
        alert("Please upload an image.");
    }
}
    </script>
    <script>
   function validateUrl() {
  url = $("#FacebookUrl").val();
  urlinsta = $("#InstaUrl").val();
  urltwit = $("#TwitUrl").val();
  var pattern =/^(http|https)\:\/\/www.facebook.com\/.*/i;
  var patterninsta =/^\s*(http\:\/\/)?instagram\.com\/[a-z\d-_]{1,255}\s*$/i;
  //var patterntwit =/^http:\/\/)?(www\.)?twitter\.com\/(\w+)/;
  if(pattern.test(url) && patterninsta.test(urlinsta)) {
    alert("Url facebook est correcte");
    return true;
   
  }
  else {
    alert("Veillez vérifié vos urls ");
   return false;
  }
  /*if(patterninsta.test(urlinsta)) {
    alert(" url insta est correcte");
   
  }
  else {
    alert("Veillez vérifié  url insta");
    $("#InstaUrl").val()= NULL;
  }
  if(patterntwit.test(urltwit)) {
    alert("Url twit est correcte");
   
  }
  else {
    alert("Veillez vérifié url twiter");
    $("#TwitUrl").val()=NULL;
  }*/
  
  return pattern.test(url,urlinsta,urltwit);
  
}
    </script>
    @endsection
    