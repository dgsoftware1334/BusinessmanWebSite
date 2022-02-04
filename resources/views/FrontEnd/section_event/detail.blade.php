   <section class="event-venues-details style-1 padding-tb bg-ash">
        <div class="container container-1310">
            <div class="event-details-header">
                <div class="event-venue-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}" alt="venue" style="height: 600px">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}" alt="venue" style="height: 600px">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}" alt="venue" style="height: 600px">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}"style="height: 600px" alt="venue">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}"style="height: 600px" alt="venue">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}"style="height: 600px" alt="venue">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}"style="height: 600px" alt="venue">
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="event-thumb">
                                <img src="{{ asset('assests/images/events/'.$event->image)}}"style="height: 600px" alt="venue">
                            </div>
                        </div>
                    </div>
                    <div class="event-title">
                        <p>événement</p>
                    </div>
                    <div class="event-pagination"></div>
                </div>
            </div>
            <div class="event-details-wraper no-gutters">
                <div class="col-xl-8 col-12">
                    <div class="events-content">
                        <h3>{{$event->sujet}}.</h3>
                        <p>{!!$event->description!!}.</p>
                     
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="events-sidebar">
                        
                        <div class="venue-info">
                               <h5>Evénement Info</h5>
                            <ul>
                                <li>
                                    <p>Date début</p>:<span>{{$event->date_debut}}.</span>
                                </li>
                                
                                <li>
                                    <p>Date Fin </p>:<span>{{$event->date_fin}}</span>
                                </li>
                                <li>
                                    <p>Duré</p>:<span>{{$event->dure}}</span>
                                </li>
                                
                                <li>
                                    <p>Type</p>:<span>
                                         @if($event->type == 0)
                                            presentail
                                           @else
                                            en ligne
                                            @endif
                                    </span>
                                </li>
                                <li>
                                    <p>Lieu</p>:<span>{{ $event->lieu ?? '(vide)' }} </span>
                                </li>
                                <li>
                                    <p>Lien</p>:<span>{{ $event->lien ?? '(vide)' }} </span>
                                </li>
                                <li>
                                   
                                </li>
                            </ul>
                        </div>
                         <br>
                    </div>
                </div>
            </div>
        </div>
    </section>