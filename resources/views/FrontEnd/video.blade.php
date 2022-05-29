@extends('layouts.visiteur')

@section('content')
<style>
	.containerr {
  max-width: 800px;
  margin: 0 auto;
}
.plyr {
  border-radius: 4px;
  margin-bottom: 15px;
  --plyr-color-main:#C70039;
  
}
</style>
	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">{{trans('video.Advertising videos')}} </span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="{{url('/')}}">{{trans('vip.Home')}}</a></li>
							<li class="active">{{trans('video.Advertising videos')}} </li>
						</ol>
					</div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page header section -->
    @foreach ($videos as $k => $v)
    @if($k % 2 == 0)
	<!-- about section start here -->
	<section class="about-section style-1 padding-tb" style="background-image: url(assets/images/pub.jpg)">
		<div class="container container-1310">
			<div class="row align-items-center">
			<div class="col-lg-6">
				              <div class="containerr">
                              <video controls crossorigin playsinline poster="{{$v->cover}}" id="player<?=$v->id; ?>">
                              <!-- Video files -->
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="576">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="720">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="1080">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="1440">

                              <!-- Caption files -->
                              <track kind="captions" label="English" srclang="en" src="{{URL::asset("/assests/images/videos/$v->video")}}"
                                   default>
                              <track kind="captions" label="Français" srclang="fr" src="{{URL::asset("/assests/images/videos/$v->video")}}">

                              <!-- Fallback for browsers that don't support the <video> element -->
                              <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                          </video>
  
                                           
                              </div>
			
				</div>
				<div class="col-lg-6">
					<div class="about-content wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
						<div class="about-contant-inner">
							
							<h2>{{$v->title}}</h2>
                            <span>{{$v->categorie}}</span>
							<p>{!!$v->description!!}</p>
						                                	<div class="actions">
                                                <!--button type="button" class="btn-defult js-play">{{trans('video.Play')}}</!--button>
                                                <button type="button" class="btn-defult js-pause">{{trans('video.Pause')}}</button>
                                                <button type="button" class="btn-defult js-stop">{{trans('video.Stop')}}</button>
                                                <button-- type="button" class="btn-defult js-rewind">{{trans('video.Rewind')}}</button-->
                                                
                                              </div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<hr>
		</div>
	</section>
	<!-- about section ending here -->
	
	
    @else
	<!-- speaker section start here -->

	<!-- about section start here -->
	<section class="about-section style-1 padding-tb" style="background-image: url(assets/images/pub.jpg)">
		<div class="container container-1310">
			<div class="row align-items-center">
				
				<div class="col-lg-6">
					<div class="about-content wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
						<div class="about-contant-inner">
							
                            <h2>{{$v->title}}</h2>
                            <span>{{$v->categorie}}</span>
							<p>{!!$v->description!!}</p>
              <div class="actions">
                                                <!--button type="button" class="btn-defult js-play">{{trans('video.Play')}}</!--button>
                                                <button type="button" class="btn-defult js-pause">{{trans('video.Pause')}}</button>
                                                <button type="button" class="btn-defult js-stop">{{trans('video.Stop')}}</button>
                                                <button-- type="button" class="btn-defult js-rewind">{{trans('video.Rewind')}}</button-->
                                                
                                              </div>
						</div>
					</div>
				</div>
                <div class="col-lg-6">
				<div class="containerr">
                              <video controls crossorigin playsinline poster="{{$v->cover}}" id="player<?=$v->id; ?>">
                              <!-- Video files -->
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="576">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="720">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="1080">
                              <source src="{{URL::asset("/assests/images/videos/$v->video")}}" type="video/mp4" size="1440">

                              <!-- Caption files -->
                              <track kind="captions" label="English" srclang="en" src="{{URL::asset("/assests/images/videos/$v->video")}} default>
                              <track kind="captions" label="Français" srclang="fr" src="{{URL::asset("/assests/images/videos/$v->video")}}">

                              <!-- Fallback for browsers that don't support the <video> element -->
                              <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                          </video>
  
                                       
                              </div>
				</div>
			</div>
			<br>
			<hr>
		</div>
	</section>
    @endif
	<script>
document.addEventListener('DOMContentLoaded', () => { 
  // This is the bare minimum JavaScript. You can opt to pass no arguments to setup.
  const player = new Plyr('#player<?=$v->id; ?>');
  
  // Expose
  window.player = player;

  // Bind event listener
  function on(selector, type, callback) {
    document.querySelector(selector).addEventListener(type, callback, false);
  }

  // Play
  on('.js-play', 'click', () => { 
    player.play();
  });

  // Pause
  on('.js-pause', 'click', () => { 
    player.pause();
  });

  // Stop
  on('.js-stop', 'click', () => { 
    player.stop();
  });

  // Rewind
  on('.js-rewind', 'click', () => { 
    player.rewind();
  });

  // Forward
  on('.js-forward', 'click', () => { 
    player.forward();
  });
});
    </script>
    @endforeach
	<!-- about section ending here -->
	<!-- event schedule section start here -->
	
	<!-- event schedule section ending here -->

	<!--  sponser section start here -->
  
    <!--  sponser section ending here -->

    <!-- testimonial section start here -->
   
    <!-- testimonial section ending here -->

    <!--  pricing section start here -->
    
    <!-- testimonial section ending here -->

    <!-- map section start here -->

    <!-- map section ending here -->

    <!-- contact section -->
 
    <!-- end contact section -->

    <!-- footer section start here -->

  @endsection