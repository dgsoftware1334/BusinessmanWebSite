<section class="blog-section padding-tb">
		<div class="container container-1310">
			<div class="section-header d-flex align-items-center flex-wrap wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
				<h2>Nouvelle publication</h2>
				<a href="{{ route('user.list.publicaiton') }}" class="all-view">Afficher tous les publication</a>
				<div class="blog-btn">
	                <div class="blog-btn-prev blog-navy"></div>
	                <div class="blog-btn-next blog-navy"></div>
				</div>
			</div>
			<div class="section-wrapper">
				<div class="blog-slider">
					<div class="swiper-wrapper">
   @foreach ($publications as $row)
                    <div class="swiper-slide wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
							<div class="post-item">
								<div class="post-item-inner">
									<div class="post-thumb">
										<a href="#"><img src="{{ asset('assests/images/poblication/'.$row->image)  }}" alt="blog"></a>
									</div>
									<div class="post-content">
										<span></span>
										<h5><a href="#">{{$row->context}}</a></h5>
										<p>
											{{ Str::limit($row->contenu, 30) }}

										</p>
										 	

										 	<a href="{{ route('user.publicaiton', [$row->id])}}" class="btn-defult">plus detais <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/26/000000/external-arrow-ui-essentials-flatart-icons-outline-flatarticons.png"/></a>
										 
										<div class="meta-post">
                                          
                                        </div>
									</div>
								</div>
							</div>
						</div>
   @endforeach          	
                    	
					</div>
				</div>
			</div>




		</div>
	</section>