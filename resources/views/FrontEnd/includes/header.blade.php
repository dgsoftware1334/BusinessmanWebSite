 <!--div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div-->
 <div class="header-section style-2 d-none d-lg-block">
		
		<div class="header-bottom">
			<nav class="primary-menu">
				<div class="container container-1310">
					<div class="menu-area">
						<div class="row no-gutters justify-content-between align-items-center">
							<a href="index.html" class="logo">
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
								
								<li><a href="#">S'inscrire</a>
									<li><a href="#">Se connecter</a></li>
									
								</li>
								<li class="head-contact d-none d-xl-block">
								@if (Route::has('user.login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
					<li>  <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::guard('web')->user()->name }}</a>
					<ul class="submenu">
										<li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form></li>
										
									</ul></li>
                    @else
                        <a href="{{ route('user.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('user.register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</div>
	