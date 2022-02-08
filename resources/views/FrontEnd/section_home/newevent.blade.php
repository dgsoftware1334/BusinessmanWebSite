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
		                        	
						            <li><span class="count-number "><?php
                                      //  $startDate = Carbon\Carbon::now();
                                       $date=new DateTime(Carbon\Carbon::now());

                                        $endDate = new DateTime($row->date_fin);

                                        $difference = $endDate->diff($date);
                                        echo $difference->format(" %a");



                                      ?></span>
						                <p>Days</p>
						            </li>

						            <li><span class="count-number ">0</span>
						                <p>Hours</p>
						            </li>

						            <li><span class="count-number ">0</span>
						                <p>Minite</p>
						            </li>

						            <li><span class="count-number ">0</span>
						                <p>Seconds</p>
						            </li>
						        </ul>
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
						!function(t){t.fn.countdown=function(e,u){
							var l=t.extend(
								{date:null,offset:null,day:"Day",days:"Days",hour:"Hour",hours:"Hours",minute:"Minute",minutes:"Minutes",second:"Second",seconds:"Seconds"},e);l.date||t.error("Date is not defined."),Date.parse(l.date)||t.error("Incorrect date format, it should look like this, 12/24/2012 12:00:00.");
							var c=this,h=function(){
								var e=new Date,t=e.getTime()+6e4*e.getTimezoneOffset();
								return new Date(t+36e5*l.offset)},x=setInterval(function(){var e=new Date(l.date)-h();if(e<0)return clearInterval(x),void(u&&"function"==typeof u&&u());var t=36e5,n=Math.floor(e/864e5),o=Math.floor(e%864e5/t),r=Math.floor(e%t/6e4),i=Math.floor(e%6e4/1e3),s=1===n?l.day:l.days,d=1===o?l.hour:l.hours,a=1===r?l.minute:l.minutes,f=1===i?l.second:l.seconds;n=2<=String(n).length?n:"0"+n,o=2<=String(o).length?o:"0"+o,r=2<=String(r).length?r:"0"+r,i=2<=String(i).length?i:"0"+i,c.find(".days").text(n),c.find(".hours").text(o),c.find(".minutes").text(r),c.find(".seconds").text(i),c.find(".days_text").text(s),c.find(".hours_text").text(d),c.find(".minutes_text").text(a),c.find(".seconds_text").text(f)},1e3)}}(jQuery);




						
          document.addEventListener('readystatechange', event => {
    if (event.target.readyState === "complete") {
        var clockdiv = document.getElementsByClassName("count-down");
        var countDownDate = new Array();
        for (var i = 0; i < clockdiv.length; i++) {
            countDownDate[i] = new Array();
            countDownDate[i]['el'] = clockdiv[i];
            countDownDate[i]['time'] = new Date(clockdiv[i].getAttribute('data-date')).getTime();
            countDownDate[i]['days'] = 0;
            countDownDate[i]['hours'] = 24;
            countDownDate[i]['seconds'] = 60;
            countDownDate[i]['minutes'] = 60;
        }

        var countdownfunction = setInterval(function () {
            for (var i = 0; i < countDownDate.length; i++) {
                var now = new Date().getTime();
                var distance = countDownDate[i]['time'] - now;
                countDownDate[i]['days'] = Math.floor(distance / (1000 * 60 * 60 * 24));
                countDownDate[i]['hours'] = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                countDownDate[i]['minutes'] = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                countDownDate[i]['seconds'] = Math.floor((distance % (1000 * 60)) / 1000);

                if (distance < 0) {
                    countDownDate[i]['el'].querySelector('.days').innerHTML = 0;
                    countDownDate[i]['el'].querySelector('.hours').innerHTML = 0;
                    countDownDate[i]['el'].querySelector('.minutes').innerHTML = 0;
                    countDownDate[i]['el'].querySelector('.seconds').innerHTML = 0;
                } else {
                    countDownDate[i]['el'].querySelector('.days').innerHTML = countDownDate[i]['days'];
                    countDownDate[i]['el'].querySelector('.hours').innerHTML = countDownDate[i]['hours'];
                    countDownDate[i]['el'].querySelector('.minutes').innerHTML = countDownDate[i]['minutes'];
                    countDownDate[i]['el'].querySelector('.seconds').innerHTML = countDownDate[i]['seconds'];
                }
            }
        }, 1000);
    }
});

					</script>

					@endforeach
				</div>
			</div>
		</div>
	</section>
	