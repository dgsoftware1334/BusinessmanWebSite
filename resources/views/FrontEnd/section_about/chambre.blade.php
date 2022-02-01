     
     <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/6.jpg') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('header_trans.About')}}</span>
                        </div>
                        <ol class="breadcrumb">
                         
                            <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>

                            <li class="active">{{trans('header_trans.About')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

@foreach($chambres as $chambre)

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
		                        <p>{!!$chambre->description!!}</p>
		                       
		                    </div>
		                    <div class="about-counter feature-rsb d-md-flex">
								
								<div class="rsb-list">
									<div class="rsb-icon">
                                <img src="https://img.icons8.com/cotton/44/000000/businessman.png"/>									</div>
									<span class="counter">{{count($users)}}</span>
									<p>{{trans('header_trans.Businessmans')}}</p>
								</div>
								
								<div class="rsb-list">
									<div class="rsb-icon"><img src="https://img.icons8.com/cotton/44/000000/development--v1.png"/></div>
									<span class="counter">{{count($secteurs)}}</span>
									<p>{{trans('header_trans.Secteur')}}</p>
								</div>
								<div class="rsb-list">
									<div class="rsb-icon"><img src="https://img.icons8.com/cotton/44/000000/baby-calendar.png"/></div>
									<span class="counter">{{count($events)}}</span>
									<p>{{trans('header_trans.Events')}}</p>
								</div>
							</div>
		                </div>
		            </div>
		            <div class="col-lg-6 col-12">
		                <div class="about-item-right">
		                    <div class="about-item-slider">
		                        <div class="swiper-wrapper">
		                           
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" alt="about">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" alt="about">
	                                    </div>
		                            </div>
		                            <div class="swiper-slide">
	                                    <div class="about-thumb">
	                                        <img src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" alt="about">
	                                    </div>
		                            </div>
		                            
		                        </div>
		                        <div class="about-item-pagination"></div>
		                    </div>
		                </div>
		            </div>
	            </div>
            </div>
        </div>
    </section>

      <section class="achivement-section padding-tb p-md-0 style-2">
    	<div class="row no-gutters align-items-center">
    		<div class="col-lg-5 col-12">
	        	<div>
	        		 <img src="{{ asset('assests/FrontEnd/assets/images/banner/9.jpg') }}" alt="about">
	        		
	        		
	        	</div>
	        </div>
	        <div class="col-lg-7 col-12">
	        	<div class="container container-1310">
		        <div class="achive-right">
	                <div class="section-header">
	                   
	                    <h2>&ensp; Politique de confidentialité</h2>
	                </div>
	                <div class="section-wrapper">
                        <div class="achive-content">
                            <div class="achive-item">
                                
                                <div class="content">
                                    <h4></h4>
                                    <p>  {!!$chambre->politique!!}.</p>
                                </div>
                            </div>
                            
                            
                        </div>
	                </div>
		        </div>
		        </div>
		    </div>
	    </div>
    </section>
    <br>
    <br>
   <section class="testimonial-section style-2 padding-tb" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/10.jpg') }})">
        <div class="container container-1310">
            <div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                <p></p>
                <h2>NOS FONDATEURS</h2>
            </div>
            <div class="section-wrapper">
				<div class="testimonial-slider-two">
                    <div class="swiper-wrapper">
                    	@foreach($fondateurs as $row3)
                        <div class="swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        	<div class="slide-item">
                        		<div class="testi-thumb">
                        			<img src="{{ asset('assests/images/fondateurs/'.$row3->image)}}" class="rounded-circle" style="width: 140px;height: 190px" >


                        		</div>
                        		<div class="testi-content">
                        			<span class="testi-text">{!!$row3->description!!}.</span>
                        			<h6 class="name">{{$row3->nom}} {{$row3->prenom}}</h6>
                        			<span class="desc">,{{$row3->diplom}}</span>
                        			<br>
                        				<img src="https://img.icons8.com/doodle/44/000000/ringer-volume--v1.png"/><h6 class="name"> {{$row3->Telephone}}</h6>
                        			
                        		</div>
                        	</div>
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="testimonial-btn-prev btn d-none d-md-block"><i class="fas fa-chevron-left"></i></div>
                    <div class="testimonial-btn-next btn d-none d-md-block"><i class="fas fa-chevron-right"></i></div>
                </div>
			</div>
        </div>
    </section>


  <section class="contact-section style-2 padding-tb" style="background-image: url(assets/images/contact/bg.png)">
        <div class="container container-1310">
            <div class="contact-info">
                <div class="section-header">
                    <h5>Contectez-nous</h5>
                </div>
                <div class="section-wrapper">
                    <div class="number">{{ $chambre->telephone}}</div>
                    <ul class="address">
                        <li>{{ $chambre->adresse}}</li>
                        <li><a  href="<?= $chambre->lien?>"  target="_blank">{{ $chambre->lien}}</a></li>
                    </ul>
                    <ul class="social-link-list d-flex flex-wrap">
                        <li><a href="<?= $chambre->fb?>" class="facebook" target="_blank"><i class=" fab fa-facebook-f"></i></a></li>
                         <li><a href="<?= $chambre->insta?>" class="facebook" target="_blank" style="background-color: #FF1493;"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#<?= $chambre->twit?>" class="twitter-sm" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#<?= $chambre->linked?>" class="linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </a></li>
                    </ul>
                </div>
            </div>
       
        </div>
    </section>



@endforeach

    