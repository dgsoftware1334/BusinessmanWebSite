<section class="speaker-section style-1 padding-tb bg-ash">
        <div class="container container-1310">
            <div class="section-header sticky-widget">
                <h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">Les hommes d'affaires </h2>
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Le meilleur les hommes d'affaire du secteur {{$secteur->libelle}}</p>
            </div>
            <div class="section-wrapper d-flex flex-wrap justify-content-lg-center">
               

                @foreach($users as $row)
                <div class="speaker-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                    <div class="speaker-item-inner">
                        <div class="item-thumb">
                          

                               @if(is_null($row->photo))
                                <img src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}" alt="speaker" style="height: 220px;width: 500px">
                               @endif
                                @if(!is_null($row->photo))
                                <img src="{{ asset('assests/imgUser/'.$row->photo)  }}" alt="speaker" style="height: 220px;width: 500px" >
                                @endif



                            </a>
                            <div class="item-overlay"></div>
                            <div class="social-profile">
                                <div class="icon facebook">
                                    <a href="<?=$row->lienfb?>"><i class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="icon twitter">
                                    <a href="<?=$row->lientwit?>"><i class="fab fa-twitter"></i></a>
                                </div>
                                <div class="icon google" style="background-color: #FF1493;">
                                    <a href="<?=$row->lieninsta?>"><i class="fab fa-instagram"></i></a>
                                </div>
                                <div class="icon linkedin">
                                    <a href="<?=$row->linked?>"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="item-content">
                            <a href="#" class="name">{{$row->name}}  {{$row->lastname}}</a>
                            <p>  <a href="{{url('/show',$row->id)}}">Visiter son profil</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="pagination-area d-flex flex-wrap justify-content-center">
                   @if ($users->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                                <li class="prev"> <a ref="{{ $users->url(1) }}" class="{{ ($users->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                    <span>« Précédent</span></a></li>
                                @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="{{ ($users->currentPage() == $i) ? ' active' : '' }} page-item">
                                       <a href="{{ $users->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                                @endfor
                                
                                <li class="dot">....</li>
                               
                                <li  class="{{ ($users->currentPage() == $users->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $users->url($users->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                            </ul>
                   @endif
                        </div>
        </div>
    </section>