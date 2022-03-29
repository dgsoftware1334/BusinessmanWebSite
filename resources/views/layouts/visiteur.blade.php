<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from labartisan.net/demo/unlimitcon/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:33:12 GMT -->
<head>
  <title>Algerian business-man</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Unlimitcon Template is a Creative Multipurpose HTML5 Template">
  <meta name="keywords" content="Unlimitcon, HTML5, Multipurpose, Template">
  <meta name="author" content="LabArtisan">
  @toastr_css
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" style="height: 60px;width: 100px" >
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/lightcase.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/style.css') }}">
   <script src="https://kit.fontawesome.com/91eb611da5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>

<body>
@jquery
    @toastr_js
    @toastr_render
    <!-- preloader start here -->
    <!--div class="preloader">
        <div-- class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div-->
   
  <!-- preloader ending here -->
  
  <!-- mobile-nav section start here -->
  <div class="mobile-menu">
    <nav class="mobile-header primary-menu d-lg-none">
      <div class="header-logo">
        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" alt="logo" style="height: 60px;width: 160px"></a>
      </div>
      <div class="header-bar" id="open-button">
              <span></span>
              <span></span>
              <span></span>
          </div>
    </nav>
    <div class="menu-wrap">
      <div class="morph-shape" id="morph-shape" data-morph-open="M-1,0h101c0,0,0-1,0,395c0,404,0,405,0,405H-1V0z">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100 800" preserveAspectRatio="none">
          <path d="M-1,0h101c0,0-97.833,153.603-97.833,396.167C2.167,627.579,100,800,100,800H-1V0z"/>
        </svg>
      </div>
      <nav class="menu">
        <div class="mobile-menu-area d-lg-none">
              <div class="mobile-menu-area-inner" id="scrollbar">
                    <div class="header-bar m-menu-bar">
                        <a href="{{ url('/') }}" class="logo"><img src="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" alt="logo" style="height: 60px;width: 160px"></a>
                        <div class="close-button" id="close-button"></div>
                    </div>
                  <ul class="m-menu">
                       <li class="active">
                   <a href="{{ url('/') }}">{{trans('header_trans.Home')}}</a>
                   
                 </li>
                   <li><a href="{{ url('/businessmans') }}">{{trans('header_trans.Businessmans')}}</a></li>
                     <li><a href="{{ url('/secteurs') }}">{{trans('header_trans.Secteur')}}</a></li>
                     @if(Route::has('user.login'))
									   @auth
									   <li><a href="{{ url('user/sujets') }}">{{trans('header_trans.Forum')}}</a></li>
									 @else
									 <li><a href="{{ url('/sujets/visiteur') }}">{{trans('header_trans.Forum')}}</a></li>
									 @endauth
									  @endif
                 <li><a>{{trans('header_trans.Services')}}</a>
                   <ul class="m-submenu">

                     <li><a href="{{ url('/publications') }}">{{trans('header_trans.Publications')}}</a></li>

                     
                     <li><a href="{{ url('/listEvent') }}">{{trans('header_trans.Events')}}</a></li>

                   

                    
                   </ul>
                 </li>
                 <li><a href="{{ url('/about') }}">{{trans('header_trans.About')}}</a></li>
                 <!--<li><a href="#">pages</a>
                   
                 </li>-->
                 <li><a href="{{url('/contact')}}">{{trans('header_trans.Contact us')}}</a></li>
                 
               
                 <li>
                 @if (Route::has('user.login'))
         
           @auth
           <li>  <a href="{{ url('/user/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::guard('web')->user()->name }}</a>
           <ul class="m-submenu" >
                     <li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <img src="https://img.icons8.com/ios-glyphs/30/000000/logout-rounded-down.png"/> {{trans('header_trans.Logout')}}</a>
                  <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></li>
                     
                   </ul></li>
           @else
          @if (Route::has('register'))
               <a href="{{ route('user.register') }}" ><img src="https://img.icons8.com/windows/32/000000/manager.png" sizes="30px" /><!--i class="fas fa-key"></i--> {{trans('header_trans.Register')}}</a>
             @endif
             <a href="{{ route('user.login') }}" > <!--i class="fas fa-sign-in-alt"></i--> <img src="https://img.icons8.com/ios-glyphs/30/000000/login-rounded-right--v1.png"/>  {{trans('header_trans.Login')}} </a>

            
           @endauth
         
       @endif
                 </li>
                 <li></li>
                 <li></li>
                 <!------------------------------------------------Language selector----------------------------------------------------------->
               
                 <li><a><img src="https://img.icons8.com/wired/30/000000/translation.png"/></a>
                   <ul class="m-submenu">
                     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                     <li> <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
         {{ $properties['native'] }}
       </a></li>
                        @endforeach

                     
                   

                    
                   </ul>
                 </li>











                  </ul>
                   
              </div>
          </div>
      </nav>
    </div>
  </div>
  <!-- mobile-nav section ending here -->
	<div class="header-section style-2 d-none d-lg-block">
		<div class="header-top">
			<div class="container container-1310">
				<div class="htop-area row no-gutters">
					<ul class="htop-left">
          <?php
 $chambre=App\Models\Chambre::get();
 ?>
 @foreach($chambre as $c)
				
						<li><a href="#"><i class="fa-solid fa-phone"></i>&nbsp;{{$c->telephone}}</a></li>
            <li><a href="#"><i class="fa-solid fa-location-dot"></i>&nbsp;{{$c->adresse}}</a></li>
			@endforeach
					</ul>
					<ul class="htop-right">
          <li>
                 @if (Route::has('user.login'))
         
           @auth
           <li>  <a href="{{ url('/user/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><i class="fa-solid fa-user-check"></i>&nbsp;{{ Auth::guard('web')->user()->name }}</a>
          
                     <li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i> {{trans('header_trans.Logout')}}</a>
                  <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></li>
                     
                   </li>
           @else
          @if (Route::has('register'))
               <a href="{{ route('user.register') }}" ><i class="fa-solid fa-user-plus"></i>&nbsp;<!--i class="fas fa-key"></i--> {{trans('header_trans.Register')}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             @endif
             <a href="{{ route('user.login') }}" > <!--i class="fas fa-sign-in-alt"></i--> <i class="fa-solid fa-right-to-bracket"></i>&nbsp; {{trans('header_trans.Login')}} </a>

            
           @endauth
         
       @endif
                 </li>
					</ul>
				</div>
			</div>
		</div>
  <!-- header section start here -->
  <div class="header-section style-2 d-none d-lg-block">

    <div class="header-bottom">
      <nav class="primary-menu">
        <div class="container container-1310">
          <div class="menu-area">
            <div class="row no-gutters justify-content-between align-items-left">
              <a href="" class="logo" align="left" style="align-items: left;">
                <img src="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" alt="logo" style="height: 96px;width: 126px;align-items: left" align="left">
                <img src="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" alt="logo" style="height: 96px;width: 126px;align-items: left" align="left">
              </a>
             <ul class="main-menu d-flex align-items-center">
                 <li class="active">
                   <a href="{{ url('/') }}">{{trans('header_trans.Home')}}</a>
                   
                 </li>
                   <li><a href="{{ url('/businessmans') }}">{{trans('header_trans.Businessmans')}}</a></li>
                     <li><a href="{{ url('/secteurs') }}">{{trans('header_trans.Secteur')}}</a></li>
                     @if(Route::has('user.login'))
									   @auth
									   <li><a href="{{ url('user/sujets') }}">{{trans('header_trans.Forum')}}</a></li>
									 @else
									 <li><a href="{{ url('/sujets/visiteur') }}">{{trans('header_trans.Forum')}}</a></li>
									 @endauth
									  @endif
                 <li><a >{{trans('header_trans.Services')}}</a>
                   <ul class="submenu">

                     <li><a href="{{ url('/publications') }}">{{trans('header_trans.Publications')}}</a></li>

                     
                     <li><a href="{{ url('/listEvent') }}">{{trans('header_trans.Events')}}</a></li>

              

                    
                   </ul>
                 </li>
              
                 <li><a href="{{ url('/about') }}">{{trans('header_trans.About')}}</a></li>
                
                 <li><a href="{{url('/contact')}}">{{trans('header_trans.Contact us')}}</a></li>
                 <li><a href="{{ url('/vip') }}" style="color:#DAA520;"><i class="fa-solid fa-crown">&nbsp;<span>Vip</span></i></a></li>
               

                 <li></li>
                 <li></li>
                 <!------------------------------------------------Language selector----------------------------------------------------------->
                 <li><img src="https://img.icons8.com/wired/30/000000/translation.png"/>
                   <ul class="submenu">
                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
     <li>
       <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
         {{ $properties['native'] }}
       </a>
     </li>
   @endforeach
                    
                   </ul>
                 </li>
              
               </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  

  

 
  
  @yield('content')


 
 
  

    <!-- footer section start here -->
    <?php
 $chambre=App\Models\Chambre::all();
 ?>
 <section class="footer-section">
      <div class="top"><a  class="scrollToTop"><i class="fas fa-angle-up"></i></a></div>
      <div class="footer-top padding-tb">
        <div class="container container-1310">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
              <div class="footer-content">
                <a href="url('/')" class="footer-logo"><img src="{{ asset('assests/FrontEnd/assets/images/logo/04.png') }}" alt="logo" style="height: 100px;width: 200px"></a>
                 @foreach($chambre as $row)
                <p>{!! Str::limit($row->description, 160) !!}.</p>
                @endforeach
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
              <div class="footer-content">
                <div class="footer-title">
                  <h5>{{trans('about_trans.Usefull Links')}}</h5>
                </div>
                <div class="footer-link-list">
                  <ul>
                     <a href="{{ url('/') }}">{{trans('header_trans.Home')}}</a>
                    <li><a href="{{ url('/businessmans') }}">{{trans('header_trans.Businessmans')}}</a></li>
                     <li><a href="{{ url('/secteurs') }}">{{trans('header_trans.Secteur')}}</a></li>
                     @if(Route::has('user.login'))
									   @auth
									   <li><a href="{{ url('user/sujets') }}">{{trans('header_trans.Forum')}}</a></li>
									 @else
									 <li><a href="{{ url('/sujets/visiteur') }}">{{trans('header_trans.Forum')}}</a></li>
									 @endauth
									  @endif
                    <li><a href="{{ url('/about') }}">{{trans('header_trans.About')}}</a></li>
                 <!--<li><a href="#">pages</a>
                   
                 </li>-->
                 <li><a href="{{url('/contact')}}">{{trans('header_trans.Contact us')}}</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
              <div class="footer-content">
                <div class="footer-title">
                  
                </div>
                <div class="footer-gellary">
                   @foreach($chambre as $row)
                    
                      <div class="f-gellary-thumb">
                        <a class="footer-img"  data-rel="lightcase"><img src="{{ asset('assests/images/chambre/'.$row->photo)}}" alt="blog-single" style="height:190px; width: 200px"></a>
                      
                  </div>
                  
                  
                </div>

              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
              <h5>{{trans('about_trans.Contact us')}}</h5>
              <div class="footer-content">
                          <nav class="nav flex-column">
                            
                              <a class="nav-link disabled" tabindex="-1" aria-disabled="true"><i class="fas fa-home" style="color: #fd3d6b"></i>&ensp;{{ $row->adresse}}</a>
                               <a class="nav-link disabled"  tabindex="-1" aria-disabled="true"><i class="fas fa-phone-square" style="color: #fd3d6b"></i>&ensp;{{ $row->telephone}}</a>
                              
                            </nav>








                             <ul class="social-link-list d-flex flex-wrap mt-3">
                                <li><a href="<?= $row->fb?>" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>

                     <li><a href="<?= $row->insta?>" class="icon instagram"><i class="fab fa-instagram"></i></a></li>

                     <li><a href="<?= $row->twit?>" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
                     <li><a href="<?= $row->linked?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                          </ul>

                         
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
            <div class="footer-bottom bg-ash">
        <div class="container container-1310">
          <div class="row justify-content-lg-between justify-content-center align-items-center">
            <div class="copyright wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
              <p>&copy;  2021 <a  href="<?='https://www.dgsoftwareplus.com/'?>"target="_blank" > SARL DGSoftware</a> Tous droits réservés </p>

            </div>
            <div class="footer-social">
              <ul class="social-media d-flex flex-wrap mb-0">
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s"><a href="<?='https://www.facebook.com/DGSoftware'?>"><i class="fab fa-facebook-f"></i></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s"><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s"><a href=""><i class="fab fa-twitter"></i></a></li>
                <li class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s"><a href=""><i class="fab fa-google-plus-g"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <!-- footer section ending here -->

    <script src="https://kit.fontawesome.com/09ee636c06.js" crossorigin="anonymous"></script>
  <script src="{{ asset('assests/FrontEnd/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/snap.svg-min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/classie.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/main3.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.counterup.min.js') }}"></script>
  <script src='{{ asset('assests/FrontEnd/assets/js/jquery.easing.js') }}'></script> 
    <script src="{{ asset('assests/FrontEnd/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jQuery.scrollSpeed.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.jticker.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/functions.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/theia-sticky-sidebar.js') }}"></script>
  <script src='../../../s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
  <script src="{{ asset('assests/FrontEnd/assets/js/mail.js') }}"></script>
    <script>
      $(window).scroll(function() {
        var theta = $(window).scrollTop() / 300 % Math.PI;
        $('#leftgear').css({ transform: 'rotate(' + theta + 'rad)' });
      });
  </script>
</body>

<!-- Mirrored from labartisan.net/demo/unlimitcon/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:35:12 GMT -->
</html>
