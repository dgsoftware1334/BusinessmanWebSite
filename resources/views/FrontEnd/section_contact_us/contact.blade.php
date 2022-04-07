 <div class="page-header-section post-title style-1">
        <div class="page-header-content">
            <div id="gmaps" class="gmap-section style-4">
				<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2275990948147!2d90.38698831543141!3d23.739261895117753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b85c740f17d1%3A0xdd3daab8c90eb11f!2sCodexCoder!5e0!3m2!1sen!2sbd!4v1601792708245!5m2!1sen!2sbd" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
        </div>
    </div>
    <!-- page header section ending here -->

    <!-- contact us section start here -->
    <section class="contact-us style-1 bg-ash">
    	<div class="container container-1310">
    		<div class="section-wrapper">
	    		<div class="row no-gutters">
	    			<div class="col-lg-8">
	    				<div class="contact-info">
	                        <div id="respond" class="comment-respond contact-from7">
	                            <h4 id="reply-title" class="comment-reply-title">{{trans('contact_trans.Leave a message')}}</h4>
	                            <p>{{trans('contact_trans.Send us a message if you have any questions')}}</p>       
	                             <form  method="get" action="{{ route('contactus')}}" >
                <div class="form-group">
                  <div class="input-group">
                 <br>
                 <br>
                     <input type="email" placeholder="{{trans('contact_trans.Email')}}"  id="email" name="email">
                      <input type="text" placeholder="{{trans('contact_trans.Name')}}"  id="name" name="name">
                                   
	                <textarea name="message" rows="8" id="message" placeholder="{{trans('contact_trans.Message')}}" ></textarea>
                      
                     <div class="col-lg-12"> 
					 <div class="d-flex justify-content-center">
                     <input name="submit" type="submit" id="submit" class="submit" value="{{trans('contact_trans.Send your message')}}" style="background-color:  #fd3d6b;width: 700px" >
                  </div>  </div></div>
                </div>
              </form>

								<p class="form-message"></p>
	                        </div>
	                    </div>
	    			</div>
	    			<div class="col-lg-4">
	    				<div class="address-info">
	    					<div class="address-title">
	    						<h4></h4>
	    						<p>{{trans('contact_trans.Contact us for all kinds of help')}}</p>
	    					</div>
	    					<div class="contact-address">
	    						@foreach($chambres as $chambre)
	                            <ul>
	                                <li>
	                                    <p>Address:</p><span>{{ $chambre->adresse}}</span>
	                                </li>
	                                <li>
	                                    <p>Mobile:</p><span>+231 {{ $chambre->telephone}}</span>
	                                </li>
	                                <li>
	                                    <p>Site:</p><span>{{ $chambre->lien}}</span>
	                                </li>
	                               
	                            </ul>
	                        </div>
	                        <ul class="social-link-list d-flex flex-wrap mt-3">
	                              <li><a href="<?= $chambre->fb?>" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>

						                            <li><a href="<?= $chambre->insta?>" class="icon instagram"><i class="fab fa-instagram"></i></a></li>

						                            <li><a href="#<?= $chambre->twit?>" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
						                            <li><a href="#<?= $chambre->linked?>" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
	                        </ul>
	                        @endforeach
	                    </div>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </section>