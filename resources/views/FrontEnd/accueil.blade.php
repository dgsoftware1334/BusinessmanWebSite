@extends('layouts.visiteur')

@section('content')
<section class="banner-section style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/0002.png') }}); background-color: white;margin-top: -60px;margin-left: 10px">
   <div class="banner-content-area">
			<div class="container container-1310">
				<div class="banner-content">
					<h1>{{trans('accueil_trans.Platform of Algerian businessmen')}}</h1>
					<span>{{trans('accueil_trans.Here you find Algerian businessmen and their sectors of activity')}}</span>
					<div class="banner-search">
						 <form action="{{route('search')}}" method="GET" class="flex justify-start items-center">
                    @csrf
                     <div style="float:left;visibility: hidden;"  >
                        <select name="secteur"  class="px-2 py-2 w-full" >
                        <option value="" type="hidden">{{trans('about_trans.Sector')}}...</option>
                            @foreach ($secteurs as $secteur)
                            <option value="{{ $secteur->libelle }}" type="hidden">{{ $secteur->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
						<input  type="text" name="nom" placeholder="{{trans('about_trans.Search for businessmen by name')}}" >
						
                        
						<button type="submit" class="btn-defult"> {{trans('about_trans.Search')}}</a>
					</form>
					</div>
				</div>






			</div>
		</div>
  </section>
 <!-- ======= Intro Section ======= -->


  @include('FrontEnd.section_home.service')
  @include('FrontEnd.section_home.publication')
  @include('FrontEnd.section_home.users')
  @include('FrontEnd.section_home.newevent')

   
  <!-- newevent section ending here -->
  
@endsection
