<<<<<<< HEAD
 
  
 <div class="header-section style-2 d-none d-lg-block">
=======
 <!--div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div-->
 <div class="header-section style-2 d-none d-md-block" >
>>>>>>> 0e382425e566a11b5fb07b33eade91c27978624e
		
		<div class="header-bottom" style="height: 60px; ">
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
									<a href="#">Accueil</a>
									
								</li>
								<li><a href="about.html">Services</a>
									<ul class="submenu">
										<li><a href="registation.html">publication</a></li>
										<li><a href="event-sidebar.html">événement</a></li>
										<li><a href="event-single.html">homme d'affaire</a></li>
			                           
									</ul>
								</li>
								<li><a href="speaker-profile.html">Apropos</a></li>
								<li><a href="#">pages</a>
									
								</li>
								<li><a href="sponsor-reg.html">Contatez-nous</a></li>
								
							
								<li>
								@if (Route::has('user.login'))
                
                    @auth
					<li>  <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::guard('web')->user()->name }}</a>
					<ul >
										<li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> <img src="https://img.icons8.com/ios-glyphs/30/000000/logout-rounded-down.png"/> Se déconnecter</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></li>
										
									</ul></li>
                    @else
                     @if (Route::has('register'))
                            <a href="{{ route('user.register') }}" ><img src="https://img.icons8.com/windows/32/000000/manager.png" sizes="30px" /><!--i class="fas fa-key"></i-->  S'inscrire</a>
                        @endif
                        <a href="{{ route('user.login') }}" > <!--i class="fas fa-sign-in-alt"></i--> <img src="https://img.icons8.com/ios-glyphs/30/000000/login-rounded-right--v1.png"/>  Se connecter </a>

                       
                    @endauth
                
            @endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>
		