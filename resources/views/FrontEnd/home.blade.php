@extends('layouts.visiteur')

@section('content')
<section class="banner-section style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }}); background-color: #f2f2f2;background-color: white;">
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
 <!-- ======= Intro Section ======= -->
  @include('FrontEnd.section_home.service')
  <!-- achivement section start here ->
	@include('FrontEnd.section_home.achivement')
	<!-- achivement section ending here -->
	<!-- newevent section start here -->
   @include('FrontEnd.section_home.newevent')
    @include('FrontEnd.section_home.publication')
  <!-- newevent section ending here -->
  
@endsection
