<section class="event-schedule style-3 padding-tb">
		<div class="container container-1310">
			<div class="section-header wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
				<h2>View Our Upcoming Events</h2>
				<span>More then 200 upcoming exclusive events are comming in this year. You can join our event & get unlimited of happyness.</span>
			</div>
			@foreach($event as $row)
			<div class="section-wrapper">
				<div class="tabcontent">
					<ul>
						<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
							<div class="con-schedule">
								<div class="con-schedule-thumb">
									<img src="assets/images/speaker/14.png" alt="speaker">
								</div>
								<div class="con-schedule-content">
									<h4>{{$row->id}}</h4>
									<p>Tech Conference 2020 is one of the largest conference. Monotonectal build principle center expertise before interdependent partnerships. Objectively engage sticky relationships.</p>
									<ul>
										<li>
											<div class="con-info-title">Time</div>
											<div class="con-info-text">26 December 2020 at 8:00am</div>
										</li>
										<li>
											<div class="con-info-title">Vanue</div>
											<div class="con-info-text">Shahera Tropical Center, Dhaka</div>
										</li>
									</ul>
									<ul class="meta-con-speaker">
										<li><img src="assets/images/speaker/meta-con/01.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/02.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/03.png" alt="meta-con"></li>
										<li><a href="#">32 More Speakers</a></li>
									</ul>
								</div>
							</div>
							<div class="con-ticket">
								<img src="assets/images/speaker/ticket.png" alt="meta-con">
								<span class="con-t-text">Ticket From</span>
								<span class="con-t-price">$99.00</span>
								<a href="#" class="btn-defult">Buy Ticket</a>
							</div>
						</li>
						<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">
							<div class="con-schedule">
								<div class="con-schedule-thumb">
									<img src="assets/images/speaker/15.png" alt="speaker">
								</div>
								<div class="con-schedule-content">
									<h4>Tech Conference 2020</h4>
									<p>Tech Conference 2020 is one of the largest conference. Monotonectal build principle center expertise before interdependent partnerships. Objectively engage sticky relationships.</p>
									<ul>
										<li>
											<div class="con-info-title">Time</div>
											<div class="con-info-text">26 December 2020 at 8:00am</div>
										</li>
										<li>
											<div class="con-info-title">Vanue</div>
											<div class="con-info-text">Shahera Tropical Center, Dhaka</div>
										</li>
									</ul>
									<ul class="meta-con-speaker">
										<li><img src="assets/images/speaker/meta-con/01.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/02.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/03.png" alt="meta-con"></li>
										<li><a href="#">32 More Speakers</a></li>
									</ul>
								</div>
							</div>
							<div class="con-ticket">
								<img src="assets/images/speaker/ticket.png" alt="meta-con">
								<span class="con-t-text">Ticket From</span>
								<span class="con-t-price">$99.00</span>
								<a href="#" class="btn-defult">Buy Ticket</a>
							</div>
						</li>
						<li class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
							<div class="con-schedule">
								<div class="con-schedule-thumb">
									<img src="assets/images/speaker/16.png" alt="speaker">
								</div>
								<div class="con-schedule-content">
									<h4>Tech Conference 2020</h4>
									<p>Tech Conference 2020 is one of the largest conference. Monotonectal build principle center expertise before interdependent partnerships. Objectively engage sticky relationships.</p>
									<ul>
										<li>
											<div class="con-info-title">Time</div>
											<div class="con-info-text">26 December 2020 at 8:00am</div>
										</li>
										<li>
											<div class="con-info-title">Vanue</div>
											<div class="con-info-text">Shahera Tropical Center, Dhaka</div>
										</li>
									</ul>
									<ul class="meta-con-speaker">
										<li><img src="assets/images/speaker/meta-con/01.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/02.png" alt="meta-con"></li>
										<li><img src="assets/images/speaker/meta-con/03.png" alt="meta-con"></li>
										<li><a href="#">32 More Speakers</a></li>
									</ul>
								</div>
							</div>
							<div class="con-ticket">
								<img src="assets/images/speaker/ticket.png" alt="meta-con">
								<span class="con-t-text">Ticket From</span>
								<span class="con-t-price">$99.00</span>
								<a href="#" class="btn-defult">Buy Ticket</a>
							</div>
						</li>
					</ul>
				</div>
              	<ul class="pagination d-flex flex-wrap justify-content-center">
                    <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><a href="#">1</a></li>
                    <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><a href="#" class="active">2</a></li>
                    <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s"><a href="#">3</a></li>
                    <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s"><a href="#">4</a></li>
                    <li class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s"><a href="#">5</a></li>
              	</ul>	
			</div>
			@endforeach
		</div>
	</section>	