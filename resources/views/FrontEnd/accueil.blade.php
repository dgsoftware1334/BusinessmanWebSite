@extends('layouts.visiteur')

@section('content')
<section class="banner-section style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }}); background-color: #f2f2f2">
		<div class="banner-content-area">
			<div class="container container-1310">
				<div class="banner-content">
					<h1>We Are Event Professional</h1>
					<span>Find The Conference, Festival, Exhibition, Meetup, Seaker & Vanue</span>
					<div class="banner-search">
						
					</div>
				</div>
			</div>
		</div>
	</section>
 <!-- ======= Intro Section ======= -->


    <!-- publicaion -->
   @include('FrontEnd.section_home.service')
 
   @include('FrontEnd.section_home.publication')
  
      @include('FrontEnd.section_home.users')

   @include('FrontEnd.section_home.newevent')
  <!-- newevent section ending here -->
  
@endsection
