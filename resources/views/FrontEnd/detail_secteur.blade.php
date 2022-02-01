@extends('layouts.visiteur')

@section('content')

 <!-- ======= Intro Section ======= -->
<div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text"> Secteur d'activité</span>
                        </div>
                        <ol class="breadcrumb">
                            
                             <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>

                            <li><a href="{{url('/secteurs')}}">Secteur</a></li>
                            <li class="active">{{$secteur->libelle}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- publicaion -->
  
@include('FrontEnd.section_detail_secteur.secteur')
@include('FrontEnd.section_detail_secteur.businessmans')

  
@endsection
