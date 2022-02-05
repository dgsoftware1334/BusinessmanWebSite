  <?php
 
  $cont=0;
  foreach($publication->users as $row){
      if($row->pivot->is_valide == 1){
      $cont= $cont+1;
    }
    }
  
 ?>
  <div class="page-header-section post-title style-1" style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/02.png') }})">

        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('about_trans.Post')}}</span>
                        </div>
                        <ol class="breadcrumb">
                           
                          <li><a href="{{url('/')}}">{{trans('header_trans.Home')}}</a></li>

                            <li class="active">{{trans('about_trans.Post')}}</li>
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
                                    <li><a href="#">{{trans('about_trans.Posted on')}}</a></li>
                                    <li class="date"><a href="#">{{$publication->updated_at}}</a></li>
                                </ul>
                                <h2>{{$publication->context}}.</h2>
                                <div class="meta-post entry-meta">&ensp;&ensp;&ensp;
                                  <i class="fas fa-comments"></i><a href="#">&ensp;{{$cont}}  &ensp; {{trans('about_trans.Comments')}} </a> </span>
                                </div>
                            </div>
                            <div class="post-thumb">
                            
                                 @if(!is_null($publication->image))
                                <a href="{{ asset('assests/images/poblication/'.$publication->image)  }}" data-rel="lightcase">
                                  <img src="{{ asset('assests/images/poblication/'.$publication->image)  }}"  style="height: 400px;width: 1000px"></a>
                                @endif
                               @if(is_null($publication->image))
                                 <img src="{{ asset('assests/FrontEnd/assets/images/blog/7.jpg') }}" alt="rel-blog" style="height: 400px;width: 1000px">
                                 @endif

                            </div>
                            <div class="post-content entry-content">
                                <div class="post-content-inner">
                                    <p>{!!$publication->contenu!!}</p>
                                    <div class="tags-section entry-footer justify-content-md-between justify-content-center">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

 

                       

                        <div class="Comments-section">
                            <div class="post-item">
                                <h5 class="comments-title">{{$cont}} {{trans('about_trans.Comments')}}</h5>
                                <ol class="comment-list">
                                   @foreach($publication->users as $row)
                                    @if($row->pivot->is_valide == 1)
                                    <li id="comment-5" class="comment even thread-even depth-1">
                                        <div class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">

                                                    



                                                @if(is_null($row->photo))
               <img alt="comments" src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}"width="90" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 90px;width: 90px"  class="img-circle">
               @endif

              @if(!is_null($row->photo))
             <img alt="comments" src="{{ asset('assests/imgUser/'.$row->photo)  }}"width="90" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
              @endif






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
                                    @endif
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
                     <h5>{{trans('about_trans.Connect you with us')}}</h5>
                      <p>{{trans('about_trans.Connect you to our social medias')}}</p>
                    </div>
                    <div class="sidebar-wrapper">
                      @foreach($chambres as $chambre)
                      <div class="sidebar-social-media">
                                            <div class="social-item">
                                                <a href="<?= $chambre->fb?>" class="icon facebook"><i class="fab fa-facebook-f"></i></a>
                                                <a href="<?= $chambre->fb?>" class="icon-title">facebook</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="<?= $chambre->twit?>" class="icon twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                                <a href="<?= $chambre->twit?>" class="icon-title" target="_blank">twitter</a>
                                            </div>
                                            <div class="social-item">
                                                <a href="<?= $chambre->linked?>" class="icon linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                                <a  href="<?= $chambre->linked?>"class="icon-title" target="_blank">linkedin</a>
                                            </div>
                                            
                                            
                                            <div class="social-item">
                                                <a href="<?= $chambre->insta?>" class="icon instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                                <a href="<?= $chambre->insta?>" class="icon-title" target="_blank">instagram</a>
                                            </div>
                                            
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>

  

              <div class="sidebar-item sidebar-comments no-gutters">
                <div class="sidebar-inner mb-0">
                  <div class="sidebar-wrapper">
                    <div class="sidebar-header">
                      <h5>{{trans('about_trans.Leave a comment')}}</h5>
                    </div>
                    <div class="sidebar-wrapper">
                      <div class="sidebar-comments-list">
                        
                        
                             <form   action="{{ url('user/publication/commentair/'.$publication->id.'/'.Auth::guard('web')->user()->id) }}"  method="POST" autocomplete="off" enctype="multipart/form-data">
                                    
         @csrf
          <div class="form-inner">
         <textarea name="contenu" rows="8" id="message" placeholder="{{trans('about_trans.Your comment')}}" required ></textarea>

                         
           
                      
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">{{trans('about_trans.Comment')}}</button>
           

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













