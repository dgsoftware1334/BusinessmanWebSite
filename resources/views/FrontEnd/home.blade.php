@extends('layouts.visiteur')

@section('content')
 <!-- ======= Intro Section ======= -->
  @include('FrontEnd.section_home.service')
  <!-- achivement section start here ->
	@include('FrontEnd.section_home.achivement')
	<!-- achivement section ending here -->
	<!-- newevent section start here -->
   @include('FrontEnd.section_home.newevent')
  <!-- newevent section ending here -->
  
@endsection
