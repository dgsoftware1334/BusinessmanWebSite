@extends('layouts.visiteur')

@section('content')
<!-- page header section start here  -->
<div class="page-header-section post-title style-1" style="background-image: url(assets/images/pageheader/pageheader.png)">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">Event  <span>Vanue</span></span>
						</div>
						<ol class="breadcrumb">
							<li>You Are Here : </li>
							<li><a href="index.html">Home</a></li>
							<li class="active">event venue</li>
						</ol>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- page header section ending here -->

    <!-- event venues section start here  -->
    <section class="event-venue padding-tb bg-ash">
        <div class="container container-1310">
       
            <div class="row my-15">
            @foreach ($secteurs  as $row)
                <div class="col-md-6">
                    <div class="venue-item">
                        <div class="venue-thumb">
                            <img src=" {{ asset('assests/images/secteurs/'.$row->image)}}" alt="">
                        </div>
                        <div class="venue-content">
                            <a href="#"><h6>{{$row->libelle}}</h6></a>
                            <div class="meta-post">
                                <span class="by"> 
                                	350 Reception 
                                	<a href="#"><i class="fa fa-heart"></i> 2. k</a>
                                	<span class="rating">
	                                	<i class="fa  fa-star"></i>
	                                	<i class="fa  fa-star"></i>
	                                	<i class="fa  fa-star"></i>
	                                	<i class="fa  fa-star"></i>
	                                	<i class="fa  fa-star-half"></i>
	                                </span> 
                            	</span>
                            </div>
                            <p>{{$row->description}}.</p>
                            <div class="venue-location">
                            	<p><i class="fa fa-home"></i> Gulshan, Link Road, Dhaka-1105</p>
                            </div>
                        </div>
                    </div>
                </div>
           
            
          
                @endforeach
               
            </div>
            <div class="pagination-area  d-flex flex-wrap justify-content-center">
              	<ul class="pagination  d-flex flex-wrap m-0">
                    <li class="prev">
                      <a href="#"> <i class="fas fa-angle-double-left"></i> previous</a>
                    </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#" class="active d-none d-md-block">2</a></li>
                    <li><a href="#" class="d-none d-md-block">3</a></li>
                    <li class="dot">....</li>
                    <li><a href="#" class="d-none d-md-block">4</a></li>
                    <li class="next">
                      <a href="#">next <i class="fas fa-angle-double-right"></i> </a>
                    </li>
              	</ul>
            </div>
        </div>
    </section>
    <!-- event venues section ending here  -->

 <!-- ======= Intro Section ======= -->
  @include('FrontEnd.section_home.service')
  <!-- achivement section start here ->
	@include('FrontEnd.section_home.achivement')
	<!-- achivement section ending here -->
	<!-- newevent section start here -->
   @include('FrontEnd.section_home.newevent')
  <!-- newevent section ending here -->
  
@endsection
