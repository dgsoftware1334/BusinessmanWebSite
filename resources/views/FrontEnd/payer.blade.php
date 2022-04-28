@extends('layouts.visiteur')

@section('content')
<section class="four-jero padding-tb">
		<div class="container container-1310">
			<div class="fore-jero-fore">
				<div class="jero-thumb">
					<img src="{{ asset('assests/FrontEnd/assets/images/404/02.jpg') }}" alt="404">
				</div>
				<div class="jero-content">
					<h3>{{trans('vip.Sorry you have to subscribe to access to VIP space')}}</h3>
					<p>{{trans('vip.If you want to subscribe, please contact the administrator')}}</p>
				
					<a href="{{url('/')}}" class="btn-defult">{{trans('vip.Home')}}</a>
				</div>
			</div>
		</div>
	</section>
      
@endsection