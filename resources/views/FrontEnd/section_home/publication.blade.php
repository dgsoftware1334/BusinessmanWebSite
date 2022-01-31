  <section class="blog-section bg-ash padding-tb" style="background-color: white">
    	<div class="container container-1310">
            <div class="section-header d-flex align-items-center flex-wrap wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                <h2>Nouvelle publication
                                     </h2>
                <a href="{{ url('/publications/') }}" class="all-view">Afficher tous les publication</a>
                <div class="blog-btn">
                    <div class="blog-btn-prev blog-navy"></div>
                    <div class="blog-btn-next blog-navy"></div>
                </div>
            </div>
    		<div class="row">
    			<div class="col-lg-12 clo-sm-12 sticky-widget">
    				<div class="post-item-wrapper">
    					<div class="row">
    						 @foreach ($publications as $row)  


    						<div class="col-md-4">
    							<div class="post-item" style="border-color: black; font-size: 10px">
									<div class="post-thumb">
										<a href="blog-single.html"><img src="{{ asset('assests/images/poblication/'.$row->image)  }}" style="height: 160px;width: 360px" alt="blog"></a>
									</div>
									<div class="post-content">
                                        @if (Route::has('user.login'))
               
                                            @auth
                                            <a href="{{ route('user.publicaiton', [$row->id])}}"  class="cata-icon">   <i class="fas fa-link"></i></a>
                                             @else
                                            <a href="{{ url('publication/visiteur', $row->id)}}"  class="cata-icon">  <i class="fas fa-link"></i></a>

                      
                                            @endauth
                                            @endif




                                        <ul class="post-catagory">
                                            <li><a href="#">Meetup,</a></li>
                                            <li><a href="#">publication</a></li>
                                        </ul>
                                        <a href="blog-single.html">
                                            <h5>{{$row->context}}.</h5>
                                        </a>
                                        <div class="meta-post">
                                            <span class="by">{{ Str::limit($row->contenu, 30) }}</span><br> at &ensp;{{$row->updated_at}}</a>
                                        </div>
									</div>
    							</div>
    						</div>
    						@endforeach

    					
    					</div>
    					
    				</div>
    			</div>
                
    			
    		</div>
    	</div>
    </section>