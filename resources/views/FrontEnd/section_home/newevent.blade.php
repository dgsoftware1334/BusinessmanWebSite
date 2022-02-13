<section class="newevent-section padding-tb">
		<div class="container container-1310">
			<div class="section-wrapper">
				<div class="row">
					@foreach($event as $row)
					<div class="col-lg-6 col-12">
						<div class="newevent-left">
							<div class="newevent-thumb wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
								
								<!--img src="{{ asset('assests/FrontEnd/assets/images/service/01.png" alt="service') }}"-->
								<img src="{{ asset('assests/images/events/'.$row->image)}}" alt="newevent" style="height: 600px">
							</div>
							<div class="newevent-time wow fadeInDown" data-wow-duration="1s" data-wow-delay=".3s">
		                        <ul id="countdown" class="countdown count-down" data-date="June 31, 2022 21:14:01">
		                        	
						            <li><span class="count-number days" id="days" ><!--?php
                                      //  $startDate = Carbon\Carbon::now();
                                       $date=new DateTime(Carbon\Carbon::now());

                                        $endDate = new DateTime($row->date_fin);

                                        $difference = $endDate->diff($date);
                                        echo $difference->format(" %a");



                                      ?--></span>
						                <p>Days</p>
						            </li>

						            <li><span class="count-number" id="hours" >0</span>
						                <p>Hours</p>
						            </li>

						            <li><span class="count-number " id="minutes">0</span>
						                <p>Minite</p>
						            </li>

						            <li><span class="count-number" id="seconds">0</span>
						                <p>Seconds</p>


						            </li>
						        </ul>
						          <p id="demo"></p>

							</div>
						</div>
					</div>
					<div class="col-lg-6 col-12">
						<div class="newevent-right">
							<div class="acive-content wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
								<span>PROCHAIN ​​ÉVÉNEMENT</span>
								<h2>{{$row->sujet}}</h2>
								<p>{!!$row->description!!}.</p>
								<ul class="newevent-right-list">
									
									<li>
										<div class="newevent-icon"><i class="far fa-calendar-alt"></i></div>
										<div class="newevent-addres"><span>

											{{$row->date_fin}} à {{$row->date_debut}}

										</span></div>
									</li>
									<li>
										<div class="newevent-icon"><i class="fas fa-link"></i></div>
										<div class="newevent-addres">
											@if(!is_null($row->lien))
											{{$row->lien}}<span></span>
											@endif
											@if(is_null($row->lien))
											<span>(Vide)</span>
											@endif
										</div>
									</li>
									<li>
										<div class="newevent-icon"><i class="fas fa-map-marker-alt"></i></div>
										<div class="newevent-addres">@if(!is_null($row->lieu))
											{{$row->lieu}}<span></span>
											@endif
											@if(is_null($row->lieu))
											<span>(Vide)</span>
											@endif.</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					
						<script type="text/javascript">
		var countDownDate = new Date("{{$row->date_fin}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  //document.getElementById("demo").innerHTML = days + "d " + hours + "h "
 // + minutes + "m " + seconds + "s ";
 document.getElementById("days").innerHTML = days  ;
 document.getElementById("hours").innerHTML = hours ;
  document.getElementById("minutes").innerHTML = minutes ;
    document.getElementById("seconds").innerHTML = seconds ;





  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

</script>

		

					@endforeach
				</div>
			</div>
		</div>
	</section>
	