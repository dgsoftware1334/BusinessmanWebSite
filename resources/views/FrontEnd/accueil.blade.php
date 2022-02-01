@extends('layouts.visiteur')

@section('content')
<section class="banner-section style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }}); background-color: white">
		<div class="banner-content-area">
			<div class="container container-1310">
				<div class="banner-content">
					<h1>{{trans('accueil_trans.Platform of Algerian businessmen')}}</h1>
					<span>{{trans('accueil_trans.Here you find Algerian businessmen and their sectors of activity')}}</span>
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
