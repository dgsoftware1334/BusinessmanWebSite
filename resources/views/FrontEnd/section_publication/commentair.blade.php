  <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text"> <span>Publication</span></span>
                        </div>
                        <ol class="breadcrumb">
                            <li>Tu es là : </li>
                            <li><a href="index.html">Accueil</a></li>
                            <li class="active">publication</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <section class="blog-section bg-ash padding-tb">
      <div class="container container-1310">
        <div class="main-blog row">
          <div class="col-lg-8 clo-sm-12">
            <div class="post-item-wrapper">
              <div class="post-item">
                            <div class="post-content-header entry-header">
                                <ul class="post-catagory">
                                    <li><a href="#">Se rencontrer</a></li>
                                    <li class="date"><a href="#">{{$publication->updated_at}}</a></li>
                                </ul>
                                <h2>{{$publication->context}}.</h2>
                                <div class="meta-post entry-meta">&ensp;&ensp;&ensp;
                                  <i class="fas fa-comments"></i><a href="#">{{count($publication->users)}} Comments </a> </span>
                                </div>
                            </div>
                            <div class="post-thumb">
                            
                                 @if(!is_null($publication->image))
                                <a href="{{ asset('assests/images/poblication/'.$publication->image)  }}" data-rel="lightcase">
                                  <img src="{{ asset('assests/images/poblication/'.$publication->image)  }}" width="900px"></a>
                                @endif
                               @if(is_null($publication->image))
                                 <img src="{{ asset('assests/FrontEnd/assets/images/blog/7.jpg') }}" alt="rel-blog">
                                 @endif

                            </div>
                            <div class="post-content entry-content">
                                <div class="post-content-inner">
                                    <p>{{$publication->contenu}}</p>
                                    <div class="tags-section entry-footer justify-content-md-between justify-content-center">
                                        <ul class="tags-part d-flex flex-wrap">
                                            <li><i class="fa fa-tags"></i></li>
                                            <li><span>tags : </span> </li>
                                            <li><a href="#">meetup</a>,</li>
                                            <li><a href="#">confarance</a>,</li>
                                            <li><a href="#">events</a></li>
                                        </ul>
                                        <ul class="social-link-list d-flex flex-wrap">
                                            <li><a href="#" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                       

                        <div class="Comments-section">
                            <div class="post-item">
                                <h5 class="comments-title">{{count($publication->users)}} Comments</h5>
                                <ol class="comment-list">
                                   @foreach($publication->users as $row)
                                    <li id="comment-5" class="comment even thread-even depth-1">
                                        <div class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <img alt="comments" src="{{ asset('assests/imgUser/'.$row->photo)  }}"width="90" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
                                                </div>

                                                <div class="comment-metadata">
                                                    <div class="fn">
                                                        <a href="http://example.org/" rel="external nofollow" class="url">{{$row->name}}</a>
                                                       
                                                    </div>
                                                    <a href="http://localhost/check/template-comments/#comment-5">
                                                        <time datetime="2012-09-03T10:18:04+00:00">{{$row->pivot->updated_at}}</time>
                                                    </a>
                                                </div>
                                            </footer>

                                            <div class="comment-content">
                                                <p>{{$row->pivot->contenu}}.</p>
                                            </div>
                                        </div>
                                    </li>
                                     @endforeach
                                    
                                </ol>
                            </div>
                        </div>

                        
            </div>
          </div>

                <div class="col-lg-4 clo-sm-12 sticky-widget">
                    <div class="get-sidebar">
              

              <div class="sidebar-item sidebar-media no-gutters">
                <div class="sidebar-inner">
                  <div class="sidebar-wrapper">
                    <div class="sidebar-header">
                     <h5>Connecte-toi avec nous</h5>
                      <p>Connectez-vous à nos réseaux sociaux</p>
                    </div>
                    <div class="sidebar-wrapper">
                      <div class="sidebar-social-media">
                                            <div class="social-item">
                                                <a href="#" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#" class="icon-title">facebook</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon twitter"><i class="fab fa-twitter"></i></a>
                                                <a href="#" class="icon-title">twitter</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon linkedin"><i class="fab fa-linkedin-in"></i></a>
                                                <a href="#" class="icon-title">linkedin</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon behance"><i class="fab fa-behance"></i></a>
                                                <a href="#" class="icon-title">behance</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon google"><i class="fab fa-google-plus-g"></i></a>
                                                <a href="#" class="icon-title">google</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon instagram"><i class="fab fa-instagram"></i></a>
                                                <a href="#" class="icon-title">instagram</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon tumblr"><i class="fab fa-tumblr"></i></a>
                                                <a href="#" class="icon-title">tumblr</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="#" class="icon youtube"><i class="fab fa-youtube"></i></a>
                                                <a href="#" class="icon-title">youtube</a>
                                            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

  

              <div class="sidebar-item sidebar-comments no-gutters">
                <div class="sidebar-inner mb-0">
                  <div class="sidebar-wrapper">
                    <div class="sidebar-header">
                      <h5>laissez un commentaire</h5>
                    </div>
                    <div class="sidebar-wrapper">
                      <div class="sidebar-comments-list">
                        
                        
                             <form   action="{{ url('user/publication/commentair/'.$publication->id.'/'.Auth::guard('web')->user()->id) }}"  method="POST" autocomplete="off" enctype="multipart/form-data">
                                    
         @csrf
          <div class="form-inner">
         <textarea name="contenu" rows="8" id="message" placeholder="Your Message" required ></textarea>

                         
           
                      
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">confirmer</button>
           

                </div>
              </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
                    </div>
                </div>
        </div>
      </div>
    </section>













