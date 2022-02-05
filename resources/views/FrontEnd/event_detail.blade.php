@extends('layouts.visiteur')

@section('content')
 <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/11.png') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('about_trans.Event')}}</span>
                        </div>
                        <ol class="breadcrumb">
                            
                             <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>
                            <li class="active">{{trans('about_trans.Event')}}</li>


                           
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('FrontEnd.section_event.detail')

 








@endsection
