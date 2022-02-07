
 <div class="header-section style-2 d-none d-lg-block">

<!--div class="preloader">
	   <div class="preloader-inner">
		   <div class="preloader-icon">
			   <span></span>
			   <span></span>
		   </div>
	   </div>
   </div-->
   
<div class="header-section style-2 d-none d-md-block" >

	   
	   <div class="header-bottom" >
		   <nav class="primary-menu">
			   <div class="container container-1310">
				   <div class="menu-area">
					   <div class="row no-gutters justify-content-between align-items-center">
						   <a href="index.html" class="logo" >
							   <img src="{{ asset('assests/FrontEnd/assets/images/logo/01.png') }}" alt="logo">
							   <img src="{{ asset('assests/FrontEnd/assets/images/logo/01.png') }}" alt="logo">
						   </a>
						   <ul class="main-menu d-flex align-items-center">
							   <li class="active">
								   <a href="{{ url('/') }}">{{trans('header_trans.Home')}}</a>
								   
							   </li>
							     <li><a href="{{ url('/businessmans') }}">{{trans('header_trans.Businessmans')}}</a></li>
									   <li><a href="{{ url('/secteurs') }}">{{trans('header_trans.Secteur')}}</a></li>
							   <li><a href="about.html">{{trans('header_trans.Services')}}</a>
								   <ul class="submenu">

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
				   <ul >
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


	   