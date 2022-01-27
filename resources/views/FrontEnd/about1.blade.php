@extends('layouts.visiteur')

@section('content')
 	<!-- banner section start here -->
     <section class="banner-section style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }}); background-color: #f2f2f2">
		<div class="banner-content-area">
			<div class="container container-1310">
				<div class="banner-content">
					<h1>We Are Event Professional</h1>
					<span>Find The Conference, Festival, Exhibition, Meetup, Seaker & Vanue</span>
					<div class="banner-search">
						<input type="text" name="type" placeholder="Search by Artist, Team or Vanue">
						<i class="fas fa-search"></i>
						<a href="#" class="btn-defult">View Latest Events</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- banner section ending here -->
@foreach($chambres as $chambre)
    <!-- about-us section start here -->
    <section class="about-section style-2 padding-tb">
        <div class="container container-1310">
            <div class="section-header">
                <p>Qui sommes nous</p>
                <h2>{{$chambre->sujet}}</h2>
            </div>
            <div class="section-wrapper">
            	<div class="row">
	            	<div class="col-lg-6 col-12">
		                <div class="about-item-left">
		                    <div class="about-content">
		                        <p>{{$chambre->description}}</p>
		                    </div>
		                    <div class="about-counter feature-rsb d-md-flex">
								<div class="rsb-list">
									<div class="rsb-icon"><img src="{{asset('BusinessmanWebSite\assests\images\chambre1.jpg')}}" alt="counter-up"></div>
									<span class="counter">56</span>
									<p>Team Member</p>
								</div>
								<div class="rsb-list">
									<div class="rsb-icon"><img src="{{asset('assets/images/chambre/2.jpg')}}" alt="counter-up"></div>
									<span class="counter">279</span>
									<p>Events Organized</p>
								</div>
								<div class="rsb-list">
									<div class="rsb-icon"><img src="{{asset('assets/images/chambre/3.jpg')}}" alt="counter-up"></div>
									<span class="counter">32</span>
									<p>Years of Experience</p>
								</div>
							</div>
		                </div>
		            </div>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('assests/FrontEnd/assets/images/banner/chambre/02.jpg') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('assets/images/chambre/2.jpg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('assets/images/chambre/3.jpg')}}" alt="Third slide">
    </div>
  </div>
</div>
		           <!-- <div class="col-lg-6 col-12">
		                <div class="about-item-right">
		                    <div class="about-item-slider">
		                        <div class="swiper-wrapper">
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{asset('BusinessmanWebSite\assests\images\chambre1.jpg')}}" alt="">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{asset('assets/images/chambre/2.jpg')}}" alt="">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{asset('assets/images/chambre/3.jpg')}}" alt="">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{asset('assets/images/chambre/2.jpg')}}" alt="">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{asset('assets/images/chambre/1.jpg')}}" alt="">
	                                    </div>
		                            </div>
		                        </div>
		                        <div class="about-item-pagination"></div>
		                    </div>
		                </div>
		            </div>-->
	            </div>
            </div>
        </div>
    </section>
    <!-- about-us section ending here -->

    <!-- achivement section start here  -->
    <section class="achivement-section padding-tb p-md-0 style-2">
    	<div class="row no-gutters align-items-center">
    		<div class="col-lg-5 col-12">
	        	<div class="achive-left"></div>
	        </div>
	        <div class="col-lg-7 col-12">
	        	<div class="container container-1310">
		        <div class="achive-right">
	                <div class="section-header">
	                    <p>Unlimitcon Achivement</p>
	                    <h2>Our Winning Award</h2>
	                </div>
	                <div class="section-wrapper">
                        <div class="achive-content">
                            <div class="achive-item">
                                <div class="achive-thumb">
                                    <img src="assets/images/achive/01.png" alt="achive">
                                </div>
                                <div class="content">
                                    <h4>Event Master 2020</h4>
                                    <p>Unlimitcon recently wined the Master of Event Award 2020 Award. It was the largest achivement for them. In last year they ware worked 200+ events successfully. Globally revolutionize B2B e-markets without superior.</p>
                                </div>
                            </div>
                            <div class="achive-item">
                                <div class="achive-thumb">
                                    <img src="assets/images/achive/02.png" alt="achive">
                                </div>
                                <div class="content">
                                    <h4>Event Boss Award 2016</h4>
                                    <p>Unlimitcon recently wined the Master of Event Award 2020 Award. It was the largest achivement for them. In last year they ware worked 200+ events successfully. Globally revolutionize B2B e-markets without superior.</p>
                                </div>
                            </div>
                            <div class="achive-item">
                                <div class="achive-thumb">
                                    <img src="assets/images/achive/03.png" alt="achive">
                                </div>
                                <div class="content">
                                    <h4>Hero Award 2014</h4>
                                    <p>Unlimitcon recently wined the Master of Event Award 2020 Award. It was the largest achivement for them. In last year they ware worked 200+ events successfully. Globally revolutionize B2B e-markets without superior.</p>
                                </div>
                            </div>
                        </div>
	                </div>
		        </div>
		        </div>
		    </div>
	    </div>
    </section>
    <!-- achivement section ending here -->

    <!-- managent section start here -->
    <section class="management-section style-1 padding-tb">
        <div class="container container-1310">
            <div class="section-header">
                <h2>The Board of Management</h2>
                <p>More then 30 dedicated people are working for our event management system</p>
            </div>
            <div class="section-wrapper">
                <div class="management-head  d-lg-flex no-gutters">
                	<div class="col-lg-6 col-12">
                        <div class="management-item">
                            <div class="management-thumb">
                                <img src="assets/images/speaker/06.png" alt="speaker">
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="#">Sargio Lam</a>
                                    <p>Chairman</p>
                                </div>
                                <p>Sargio Lam is the Chairman of Unlimitcon event management company. In 1980, He was founded this company at selicon velly with his friend.</p>
                                <div class="social-profile">
                                    <a href="#" class="icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="icon google">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a href="#" class="icon linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="management-item">
                            <div class="management-thumb">
                                <img src="assets/images/speaker/07.png" alt="speaker">
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="#">Mansile</a>
                                    <p>CEO & Managing Derector</p>
                                </div>
                                <p>Sargio Lam is the Chairman of Unlimitcon event management company. In 1980, He was founded this company at selicon velly</p>
                                <div class="social-profile">
                                    <a href="#" class="icon facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="icon twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="icon google">
                                        <i class="fab fa-google-plus-g"></i>
                                    </a>
                                    <a href="#" class="icon linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="other-member row no-gutters">
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/08.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">angelina jolie</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/09.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">Rajib Ahmed</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/10.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">Angel Zaara</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/11.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">Sajahan Sagor</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/12.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">Somrat Islam</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                    <div class="management-item">
	                    <div class="management-item-inner">
	                        <div class="management-thumb">
	                            <img src="assets/images/speaker/13.png" alt="speaker">
	                        </div>
	                        <div class="content">
	                            <div class="name">
	                                <a href="#">Rajib Raj</a>
	                                <p>Event Manager</p>
	                            </div>
	                            <div class="social-profile">
	                                <div class="icon facebook">
	                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
	                                </div>
	                                <div class="icon twitter">
	                                    <a href="#"><i class="fab fa-twitter"></i></a>
	                                </div>
	                                <div class="icon linkedin">
	                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  managent section ending here -->

    <!-- testimonial section start here -->
    <section class="testimonial" style="background-image: url(assets/images/testimonial/bg-4.png); padding-bottom: 50px;">
		<div class="container container-1310">
			<div class="testimonial-section style-1 style-4">
	            <div class="section-heading wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
	                <h2>What people Say</h2>
	            </div>
	            <div class="section-wrapper">
	                <div class="testimonial-slider">
	                    <div class="swiper-wrapper">
	                        <div class="swiper-slide wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
	                        	<div class="slide-item">
	                                <div class="item-content">
	                                    <p class="client-comment">
	                                        Globally expedite robust meta-services withoutorthogonal "outside the box" thinking. Globally deploy premier potentialities
	                                    </p>
	                                    <div class="name">
	                                        <a href="#" class="client-name">Richi Borhan</a>
	                                        <span class="designation">Ceo at WebCode Limited</span>
	                                    </div>
	                                </div>
	                                
	                                <div class="item-thumb">
	                                    <img src="assets/images/testimonial/01.png" alt="testimonial">
	                                </div>
	                            </div>
	                        </div>
	                        <div class="swiper-slide wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
	                        	<div class="slide-item">
	                                <div class="item-content">
	                                    <p class="client-comment">
	                                        Globally expedite robust meta-services withoutorthogonal "outside the box" thinking. Globally deploy premier potentialities
	                                    </p>
	                                    <div class="name">
	                                        <a href="#" class="client-name">Zinat Zaara</a>
	                                        <span class="designation">Ceo at zaraj Limited</span>
	                                    </div>
	                                </div>
	                                
	                                <div class="item-thumb">
	                                    <img src="assets/images/testimonial/02.png" alt="testimonial">
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="testimonial-btn-prev btn"><i class="fas fa-chevron-left"></i></div>
	                <div class="testimonial-btn-next btn"><i class="fas fa-chevron-right"></i></div>
	            </div>
	    	</div>
		</div>
	</section>
	<!-- testimonial section ending here -->

	<!-- choose-us section start here -->
    <section class="choose-us style-1 padding-tb" style="background-image: url(assets/images/choose-us/bg.png)">
        <div class="container container-1310">
            <div class="section-header">
                <h2>Why Choose Us</h2>
                <p>More then 30 dedicated people are working for our event management system</p>
            </div>
            <div class="section-wrapper">
            	<div class="row no-gutters">
                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>1</span>
                            </div>
                            <div class="content">
                                <h6>The No.1 Event Management Company</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>2</span>
                            </div>
                            <div class="content">
                                <h6>World-Wide Event Management System</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>3</span>
                            </div>
                            <div class="content">
                                <h6>30+ Years of Experience</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>4</span>
                            </div>
                            <div class="content">
                                <h6>100% Security Ansure</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>5</span>
                            </div>
                            <div class="content">
                                <h6>Height Quality Event Design</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>6</span>
                            </div>
                            <div class="content">
                                <h6>Payment After Completing Event</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>7</span>
                            </div>
                            <div class="content">
                                <h6>Professional Team Members</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>

                    <div class="choose-item">
                        <div class="item-inner">
                            <div class="choose-icon">
                                <span>8</span>
                            </div>
                            <div class="content">
                                <h6>All Kinds of Event Services</h6>
                                <p>We are ready for lighting of any kinds of like Music Festival, Conference, Wedding, Birthday etc.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  choose-us section ending here -->

    <!-- contact-us section start here  -->
    <section class="contact-section style-2 padding-tb" style="background-image: url(assets/images/contact/bg.png)">
        <div class="container container-1310">
            <div class="contact-info">
                <div class="section-header">
                    <h5>Need Any Help?</h5>
                </div>
                <div class="section-wrapper">
                    <div class="number">+880 1234 567890</div>
                    <ul class="address">
                        <li>Wari DOHS, Dhaka- 1100</li>
                        <li>contact@yourmail.com</li>
                    </ul>
                    <ul class="social-link-list d-flex flex-wrap">
                        <li><a href="#" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#" class="behance"><i class="fab fa-behance"></i></a></li>
                        <li><a href="#" class="tumblr"><i class="fab fa-tumblr"></i></a></li>
                        <li><a href="#" class="youtube"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="subscribe mt-5">
                <div class="section-header">
                    <h5>Subscrive for Newsletter</h5>
                </div>
                <div class="section-wrapper">
                    <div class="email">
                        <input type="email" name="email" placeholder="Enter Your Email Here">
                    </div>
                    <div class="sc-btn">
                        <input type="submit" class="btn-defult" value="Submit Now">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact-us section ending here -->

    <!-- sponsor section start here -->
	<section class="sponsor-section style-2 bg-ash">
        <div class="container container-1310">
        	<div class="section-header">
        		<h4>View Partners</h4>
        		<p>We have 200+ Happy customers in all over the world</p>
        	</div>
        	<div class="section-wrapper">
        		<div class="sponsor-slider wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
        			<div class="swiper-wrapper">
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/4.png" alt="sponsor">
                        	</div>
                        </div>
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/1.png" alt="sponsor">
                        	</div>
                        </div>
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/3.png" alt="sponsor">
                        	</div>
                        </div>
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/15.png" alt="sponsor">
                        	</div>
                        </div>
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/12.png" alt="sponsor">
                        	</div>
                        </div>
                        <div class="swiper-slide">
                        	<div class="sponsor-thumb">
                        		<img src="assets/images/sponsor/11.png" alt="sponsor">
                        	</div>
                        </div>
                    </div>
        		</div>
        	</div>
        </div>
    </section>

@endforeach

  <!-- newevent section ending here -->
  
@endsection
