	<!-- about section start here -->
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
   
    @foreach($video as $v)
	<section class="about-section style-1 padding-tb" style="background-image: url(assets/images/pub.jpg)">
		<div class="container container-1310">
    <div class="d-flex justify-content-center"><h2>{{trans('video.Advertising videos')}}</h2></div>
    <br><br><br>
			<div class="row align-items-center">
      
				<div class="col-lg-6">
                <div class="containerr">
                              <video controls crossorigin playsinline poster="" id="player<?=$v->id; ?>">
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
                                                <button type="button" class="btn-defult js-rewind">{{trans('video.Rewind')}}</button-->
                                                
                                              </div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- about section ending here -->
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