	<section class="related-even-section style-1 padding-tb pricing-section style-3 padding-tb">

		<div class="pri-shape1"></div>
		<div class="pri-shape2"></div>
		<div class="pri-shape3"></div>

		<div class="container container-1310">
			
			<div class="section-header">
					<br><br>
                <h2>{{trans('service_trans.Sectors of activity')}}</h2>
                <p><a href="{{ url('/secteurs/') }}" class="all-view">{{trans('service_trans.Show all Sectors of activity')}}</a></p>
            </div>
			<div class="section-wrapper" >
				  @foreach ($secteurs as $row1)
				<div class="post-item">
					<div class="post-item-inner">
						<div class="post-thumb">
							<img src="{{ asset('assests/images/secteurs/'.$row1->image)  }}" alt="rel-blog" style="height: 130px" >
						<a  href="{{ url('/secteur',$row1->id) }}" class="catagory"><img src="https://img.icons8.com/carbon-copy/24/000000/arrow.png"/>

							</a>
						</div>
						<div class="post-content">
							<h5><a href="{{ url('/secteur',$row1->id) }}">{{$row1->libelle}}</a></h5>
							<div class="meta-post">
								<span class="by">{!! Str::limit($row1->description, 60) !!}.</span>
	                            <span class="by"><i class="fas fa-user-tie"></i><a class="date" href="#">{{count($row1->users->where('status',0))}}</a></span>
	                          
	                        </div>
						</div>
					</div>
				</div>
				@endforeach
		
			</div>
		</div>
	</section>