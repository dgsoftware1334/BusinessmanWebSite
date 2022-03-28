@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">Espace  <span>VIP</span></span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="{{url('/')}}">Accueil</a></li>
							<li class="active">VIP</li>
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
                <h2>Nos services VIP</h2>
                <p>Cet espace est premium, Pour payer contacter l'administration</p>
            </div>
			<div class="section-wrapper">
				<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
					<div class="pricing-item-inner">
						<div class="pricing-head wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							<h3>Appels d'offres</h3>
							<span>Payer pour consulter nos appel d'offres</span>
						</div>
						<ul class="pricing-body">
							<li>Appels d'offres</li>
							<li>Différents secteurs</li>
							<li>Tous en détails</li>
							<li>Possibilité de naviguer</li>
						</ul>
						<div class="pricing-footer d-flex align-items-center">
							
							<div class="reg">
							@if(auth()->check() && auth()->user()->paye)
								<a href="{{route('user.tenders')}}"><span style="font-size:24px">Accéder</span></a>
								@else
								<a href="{{route('user.login')}}"><span style="font-size:24px">Accéder</span></a>
								@endif
							</div>
						</div>
					</div>
				</div>
				
				<div class="pricing-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
					<div class="pricing-item-inner">
						<div class="pricing-head wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
							<h3>Codes Commerciaux</h3>
							<span>Payer pour voir les codes commerciaux de la chambre</span>
						</div>
						<ul class="pricing-body">
							<li>Liste des codes de commerces</li>
							<li>Avec tous les détails</li>
							<li>Possibilité de naviguer</li>
							<li>Espace payant</li>
						</ul>
						<div class="pricing-footer d-flex align-items-center">
						
							<div class="reg">
								@if(auth()->check() && auth()->user()->paye)
								<a href="{{route('user.codes')}}"><span style="font-size:24px">Accéder</span></a>
								@else
								<a href="{{route('user.login')}}"><span style="font-size:24px">Accéder</span></a>
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