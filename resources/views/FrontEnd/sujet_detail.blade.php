@extends('layouts.visiteur')

@section('content')
<?php
use App\Models\Signal;
$deja=0;
$authenticated = Auth::guard('web')->user()->id;
$signalers = Signal::all();
foreach($signalers as $signaler){
  if($signaler->user_id == $authenticated){$deja=1;}
  else{$deja=0;}
}


?>

	<!-- page header section -->
    <div class="page-header-section post-title style-1" style="background-image: url(assets/images/pageheader/pageheader.png)">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
                    <div class="page-header-content-inner">
                        <div class="page-title">
                            <span class="title-text">{{trans('forum_trans.Topic details')}}</span>
                        </div>
                        <ol class="breadcrumb">
                          
                            <li><a href="index.html">{{trans('secteur_trans.Home')}}</a></li>
                            <li class="active">{{trans('forum_trans.Topic details')}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page header section -->

    <!-- main blog sectiom start here -->
    <section class="blog-section bg-ash padding-tb">
    	<div class="container container-1310">
    		<div class="main-blog row">
    			<div class="col-lg-8 clo-sm-12">
    				<div class="post-item-wrapper">
    					<div class="post-item">
                            <div class="post-content-header entry-header">
                            <div class="d-flex justify-content-start">
                             <ul class="post-catagory">
                                    <li><a href="#">{{trans('forum_trans.Posted on')}}: {{$sujet->created_at}}</a></li>
                                   
                                </ul>
                             </div>
                            <div class="d-flex justify-content-end">
                         
                                @if(Auth::check())
                                @if($deja == 0 && $sujet->user->id != Auth::user()->id)
                                    <a href=""  data-toggle="modal" data-target="#exampleModalLong">
                                        <span style="color:red;"><i class="fa-solid fa-bell"></i> &nbsp;{{trans('forum_trans.Report')}}</span>
                                        </a>
                                        @endif
                                @if($sujet->user->id == Auth::user()->id)
                                    <a href="{{url('user/sujet/destroy',$sujet->id)}}" style="color:red; width:150px; height:150px;"><i class="fa-solid fa-trash" ></i>&nbsp;Supprimer</a>
                               
                      
                                @endif
                                @endif
                                    </div>
                              
                              
                                <h2>{{$sujet->titre}}</h2>
                                <div class="meta-post entry-meta">
                                    <span class="by">{{trans('forum_trans.Posted by')}} <a class="name" href="#">{{$sujet->user->name}}</a></span>
                                </div>
                            </div>
                            <div class="post-thumb" >
                             <img src="{{ asset('assests/images/sujets/'.$sujet->image)}}" style="width: 900px;height: 400px;" >
                            </div>
                            <div class="post-content entry-content">
                                <div class="post-content-inner">
                                
                                    
                                  
                                   
                                    <p>{{$sujet->details}}</p>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="author-section">
                        	<div class="author-section-item d-md-flex flex-wrap">
                                <div class="post-thumb">
                                @if(is_null($sujet->user->photo))
               <img alt="comments" src="{{ asset('assests/FrontEnd/assets/images/3.png')  }}"width="90" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 90px;width: 90px"  class="img-circle">
               @endif

              @if(!is_null($sujet->user->photo))
             <img alt="comments" src="{{ asset('assests/imgUser/'.$sujet->user->photo)  }}"width="90" style="border-radius: 100px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;"  class="img-circle">
              @endif
                                </div>
                                <div class="post-content">
                                    <h5><a href="#">{{$sujet->user->name}}</a></h5>
                                    <span>{{$sujet->user->diplome}}</span>
                                    <p>{{$sujet->user->description}}</p>
                                    <ul class="social-link-list d-flex flex-wrap">
                                        <li><a href="{{$sujet->user->fb}}" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{$sujet->user->insta}}" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$sujet->user->linked}}" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="{{$sujet->user->twit}}" class="google"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                     

                        <div class="Comments-section">
                            <div class="post-item">
                                <h5 class="comments-title"> {{trans('about_trans.Comments')}}</h5>
                                <ol class="comment-list">
                                   @foreach($sujet->users as $row)
                                   
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
                                               

                                                    @if($row->pivot->user_id ==Auth::guard('web')->user()->id)
                                                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                    <a data-toggle="modal" data-target="#edit{{$row->pivot->id}}" style="color:blue;">
                                                    {{trans('forum_trans.Modify')}} 
                                                    </a>
                                                    @endif
                                                    @if($row->pivot->user_id ==Auth::guard('web')->user()->id)
                                           
                                                   &ensp;&ensp;&ensp;&ensp; <a href="{{ route('user.delete_com',[$row->pivot->id,$row->pivot->sujet_id,$row->pivot->user_id]) }}" style="color:red;">
                                                   {{trans('forum_trans.Delete')}} 
                                                    </a>
                                                    @endif
                                            </div>
                                        </div>
                                    </li> 
                                    <div class="modal fade" id="edit{{$row->pivot->id}}">
        <div class="modal-dialog modal-lg" style="width:700px">
          <div class="modal-content" style="width:700px">
            <div class="modal-header" style="background-color: #4682B4;">
              <h5 class="modal-title" style="color: white">
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              
              {{trans('forum_trans.Modify comment')}}  </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:700px">

              
            <!-- general form elements disabled -->
             <form action="{{ url('user/commentaire/update/'.$row->pivot->id.'/'.$row->pivot->user_id.'/'.$row->pivot->sujet_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Contenu </label>
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->pivot->id }}">

                        <textarea class="form-control" rows="3"   placeholder="Enter ..." name="contenu"  class="@error('contenu') is-invalid @enderror" id="upfr<?=$row->id; ?>">
                        {{$row->pivot->contenu}}
                        </textarea>
                        
                      </div>
                    </div>
                    </div>
                    
                  </div>

                  <!-- input states -->
           
                  <div class="modal-footer justify-content-between">
              <button type="button"  style="background-color: #fffff;width: 70px;" data-dismiss="modal">Fermer</button>
              <button type="submit" style="background-color: #008CBA;width: 70px;" name="submit">Modifier</button>
            </div>
                  
                </form>
          
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div> @endforeach
        <!-- /.modal-dialog -->
      </div>
                                   

                                   
                                     
                                    
                                </ol>
                              
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
                        
                        
                             <form   action="{{ url('user/sujet/commentaire/'.$sujet->id.'/'.Auth::guard('web')->user()->id) }}"  method="POST" autocomplete="off" enctype="multipart/form-data">
                                    
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
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">{{trans('forum_trans.Why do you want to report this topic')}}?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('user/sujet/signal')}}"  method="POST" autocomplete="off" >
          @csrf
          <div class="form-control">
          <label for="">{{trans('forum_trans.Reason of report')}}</label>
          <input type="hidden" name="user_id" value="{{Auth::guard('web')->user()->id}}">
          <input type="hidden" name="sujet_id" value="{{$sujet->id}}">
          <textarea name="motif" id="" cols="30" rows="10"></textarea>
          </div>
          <button type="button" class="btn-defult" data-dismiss="modal">{{trans('forum_trans.Close')}}</button>
        <button type="submit" class="btn-defult">{{trans('forum_trans.Save changes')}}</button>
        </form>
      </div>
      <div class="modal-footer">
    
      </div>
    </div>
  </div>
</div>
    <!-- main blog sectiom ending here -->

    <!-- footer section start here -->
  
    <!-- footer section ending here -->

@endsection
