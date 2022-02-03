@extends('layouts.visiteur')

@section('content')

<!-- 404 section start here -->
	<section class="four-jero padding-tb">
		<div class="container container-1310">
			<div class="fore-jero-fore">
				<div class="jero-thumb">
					<img src="{{ asset('assests/FrontEnd/assets/images/404/01.png') }}" alt="404">
				</div>
				<div class="jero-content">
					<h3>Sorry We Can't Find That Page!</h3>
					<p>The page you are looking for was moved, removed, renamed or never existed.</p>
					
					<a href="{{ url('/') }}" class="btn-defult">back to home</a>
				</div>
			</div>
		</div>
	</section>
	<!-- 404 section ending here -->
  
@endsection
