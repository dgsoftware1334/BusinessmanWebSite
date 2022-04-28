@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">{{trans('vip.Space')}}  <span>{{trans('vip.VIP')}}</span></span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="{{url('/')}}">{{trans('vip.Home')}}</a></li>
							<li class="active">{{trans('vip.Space')}} &nbsp; {{trans('vip.VIP')}} </li>
						</ol>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page header section -->

    <!-- sponsor-opportunity section start here -->
	<section class="pricing-section style-1 padding-tb">
		<div class="container container-1310">
			<div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                <h2>{{trans('vip.Our VIP services')}}</h2>
                <p>{{trans('vip.This is a premium space, If you want to access please contact the administrator to pay')}}</p>
            </div>
			<div class="section-wrapper">
				<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
					<div class="pricing-item-inner">
						<div class="pricing-head wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							<h3>{{trans('vip.Tenders')}}</h3>
							<span>{{trans('vip.Pay to see our tenders')}}</span>
						</div>
						<ul class="pricing-body">
							<li>{{trans('vip.Tenders')}}</li>
							<li>{{trans('vip.Different sector')}}</li>
							<li>{{trans('vip.All in details')}}</li>
							<li>{{trans('vip.Possibility to navigate')}}</li>
						</ul>
						<div class="pricing-footer d-flex align-items-center">
							
							<div class="reg">
							@if(auth()->check())
							         @if(auth()->user()->paye)
								<a href="{{route('user.tenders')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								     @else
								<a href="{{route('not.subscribed')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								     @endif 
								@else
								<a href="{{route('user.login')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								@endif
							</div>
						</div>
					</div>
				</div>
				
				<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
					<div class="pricing-item-inner">
						<div class="pricing-head wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							<h3>{{trans('vip.Commercial codes')}}</h3>
							<span>{{trans('vip.Pay to see our commercial codes')}}</span>
						</div>
						<ul class="pricing-body">
							<li>{{trans('vip.List of commercial codes')}}</li>
							<li>{{trans('vip.With all details')}}</li>
							<li>{{trans('vip.Possibility to navigate')}}</li>
							<li>{{trans('vip.Premium space')}}</li>
						</ul>
						<div class="pricing-footer d-flex align-items-center">
						
							<div class="reg">
								@if(auth()->check())
								        @if(auth()->user()->paye)
								               <a href="{{route('user.codes')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								        @else
								               <a href="{{route('not.subscribed')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								        @endif 
								@else
								<a href="{{route('user.login')}}"><span style="font-size:24px">{{trans('vip.Access')}}</span></a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- sponsor-opportunity section ending here -->



    <!-- sponsor-opportunity masonary section start here -->


@endsection