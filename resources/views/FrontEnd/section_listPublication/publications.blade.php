     <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('listpub_trans.All posts')}} </span>
                        </div>
                        <ol class="breadcrumb">
                           
                            <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>

                            <li class="active">{{trans('header_trans.Publications')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="event-with-sidebar-section">
	    <div class="container container-1310">
	    	<div class="section-wrapper">
			    <div class="row">
				    <div class="col-lg-9">
				    	<div class="event-main-part">
						  
							<!-- related event section start here -->
							<section class="related-even-section style-1 padding-tb">
								<div class="container container-1310 p-0 p-md-auto">
									<div class="section-header">
										<br>
										<h3>{{trans('listpub_trans.All posts')}} </h3>
									</div>
									<div class="section-wrapper">
										@foreach($publications as $row)
										 
										<div class="post-item">
											<div class="post-item-inner">
												<div class="post-thumb">
                                  

                                                  @if(!is_null($row->image))
													<img src="{{ asset('assests/images/poblication/'.$row->image)  }}" alt="rel-blog" style="height: 300px">
                                                   @endif

                                                  @if(is_null($row->image))
													<img src="{{ asset('assests/FrontEnd/assets/images/blog/7.jpg') }}" alt="rel-blog" style="height: 300px">
                                                   @endif

													<!--a href="{{ route('user.publicaiton', [$row->id])}}" class="catagory">puls détait&ensp;<i class="fas fa-angle-double-right"></i></a-->
													 @if (Route::has('user.login'))
			   
				                                        @auth
				                                       <a href="{{ route('user.publicaiton', [$row->id])}}" class="catagory">puls détait&ensp;   <i class="fas fa-angle-double-right"></i></a>
				                                        @else
				                                     	<a href="{{ url('publication/visiteur', $row->id)}}" class="catagory">puls détait&ensp;<i class="fas fa-angle-double-right"></i></a>

					  
				                                       @endauth
			   
		   @endif
												</div>
												<div class="post-content">
													<h5><a href="#">{{$row->context}}</a></h5>
													<p>{{$row->contenu}}.  </p>
													<div class="meta-post">
							                            <span class="by"><i class="fas fa-clock"></i> <a class="date" href="#">{{$row->updated_at}}</a></span>
							                             <span class="by"><i class="fas fa-comment-alt"></i> {{count($row->users)}} Comments </span>
							                            <span class="by"><i class="fas fa-map-marker-alt"></i> Algérie.</span>
							                        </div>
												</div>
											</div>
										</div>

                                         @endforeach


        
									</div>
								</div>

								<div class="pagination-area d-flex flex-wrap justify-content-center">
        	       @if ($publications->lastPage() > 1)

                          	<ul class="pagination d-flex flex-wrap m-0">
	                            <li class="prev"> <a ref="{{ $publications->url(1) }}" class="{{ ($publications->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
	                            	<span>« Précédent</span></a></li>
	                            @for ($i = 1; $i <= $publications->lastPage(); $i++)
	                            <li class="{{ ($publications->currentPage() == $i) ? ' active' : '' }} page-item">
	                            	   <a href="{{ $publications->url($i) }}" class="page-link">{{ $i }}</a>
	                            </li>
	                            @endfor
	                            
	                            <li class="dot">....</li>
	                           
	                            <li  class="{{ ($publications->currentPage() == $publications->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $publications->url($publications->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                          	</ul>
                   @endif
                        </div>
							</section>
							<!-- related event section ending here -->
						</div>
					</div>
					<div class="col-lg-3 sticky-widget">
						<div class="event-sidebar-widget">
							<!-- map section start here -->
						    <section id="gmaps" class="gmap-section style-3 padding-tb">
						    	<div class="container container-1310">
						    		<div class="row">
						    			<div class="col-lg-12">
						    				@foreach($chambres as $chambre)
						    				<div class="gmap-widget">
						    					<h5>Contectez-nous</h5>
						    					<ul class="widget-list">
						    						<li><i class="fas fa-home"></i>{{ $chambre->adresse}}</li>
						    						<li><i class="fas fa-phone-square"></i> {{ $chambre->telephone}}</li>
						    						<li><i class="fas fa-globe"></i><a  href="<?= $chambre->lien?>"  target="_blank">{{ $chambre->lien}}</a></li>

						    					</ul>
						    					<ul class="social-link-list d-flex flex-wrap">
						                            <li><a href="<?= $chambre->fb?>" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>

						                            <li><a href="<?= $chambre->insta?>" class="icon instagram"><i class="fab fa-instagram"></i></a></li>

						                            <li><a href="#<?= $chambre->twit?>" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
						                            <li><a href="#<?= $chambre->linked?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
						                            
						                        </ul>
						    				</div>
						    				@endforeach
						    			</div>
						    			<div class="col-lg-12">
						    				<div id="map">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2275990948147!2d90.38698831543141!3d23.739261895117753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c740f17d1%3A0xdd3daab8c90eb11f!2sCodexCoder!5e0!3m2!1sen!2sbd!4v1601792708245!5m2!1sen!2sbd" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
											</div>
						    			</div>
						    		</div>
						        </div>
						    </section>
						    <!-- map section ending here -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>