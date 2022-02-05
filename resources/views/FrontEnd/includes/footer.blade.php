 <?php
 $chambre=App\Models\Chambre::all();
 ?>
 <section class="footer-section">
    	<div class="top"><a href="#" class="scrollToTop"><i class="fas fa-angle-up"></i></a></div>
    	<div class="footer-top padding-tb">
	    	<div class="container container-1310">
	    		<div class="row">
	    			<div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
	    				<div class="footer-content">
	    					<a href="#" class="footer-logo"><img src="{{ asset('assests/FrontEnd/assets/images/logo/01.png') }}" alt="logo"></a>
	    					<p>World Business Conference one of the best famouse conference in 2020. Most of the speaker of this event ar business magnet. So its a great opportunitee to know the secrate of business success policies Policy.</p>
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
	    									<a class="footer-img"  data-rel="lightcase"><img src="{{ asset('assests/images/chambre/'.$row->photo)}}" alt="blog-single" style="height:160px; width: 200px"></a>
	    								
	    						</div>
	    						
	    						
	    					</div>

	    				</div>
	    			</div>
	    			<div class="col-12 col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
	    				<h5>{{trans('about_trans.Contact us')}}</h5>
	    				<div class="footer-content">
	                        <nav class="nav flex-column">
                            
                              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-home" style="color: #fd3d6b"></i>&ensp;{{ $row->adresse}}</a>
                               <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-phone-square" style="color: #fd3d6b"></i>&ensp;{{ $row->telephone}}</a>
                              
                            </nav>








                             <ul class="social-link-list d-flex flex-wrap mt-3">
	                              <li><a href="<?= $row->fb?>" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>

						         <li><a href="<?= $row->insta?>" class="icon instagram"><i class="fab fa-instagram"></i></a></li>

						         <li><a href="#<?= $row->twit?>" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
						         <li><a href="#<?= $row->linked?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
	                        </ul>

	                       
	    				</div>
	    			</div>
	    			@endforeach
	    		</div>
	    	</div>
	    </div>
	    
    </section>