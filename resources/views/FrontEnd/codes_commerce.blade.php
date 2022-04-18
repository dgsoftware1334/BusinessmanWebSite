@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">{{trans('vip.Commercial codes')}}</span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="">{{trans('vip.Home')}}</a></li>
							<li class="active">{{trans('vip.Commercial codes')}}</li>
						</ol>
					</div>
                </div>
            </div>
        </div>
    </div>

<br><br>

                
	<section class="search-sec">
    <div class="container">
        <form action="{{route('user.search.code')}}" method="GET" novalidate="novalidate" autocomplete="off">
        @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="text" name="title" placeholder="{{trans('vip.Search with the title')}}" id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
							
					   <div class="col-lg-3 col-md-3 col-sm-12 p-0"> 
                       <input type="text" name="code" placeholder="{{trans('vip.Search with the code')}}" id="text" class="px-2 py-2 w-full">

					   </div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp;
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="text" name="description" placeholder="{{trans('vip.Search with the description')}}"  id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        
                            <button type="submit" class="button" style="width:280px;height:45px;background-color:#F73087">{{trans('vip.Search')}}</button>
                       
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>



	<!-- event schedule section start here -->
	<section class="event-schedule style-1 padding-tb" style="background-color: #A2DED0;">
		<div class="container container-1310">
			<div class="section-wrapper">
				
				<div id="1st-Day" class="tabcontent active">
				  	<div class="schedule-tabs wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                   		<div class="schedule-table table-responsive">
    
                      		<table>
                         		<thead>
                            		<tr>
                                       <th class="time">{{trans('vip.Code')}}</th>
                                       <th class="session">{{trans('vip.Title')}}</th>
                                       <th class="spekers">{{trans('vip.Release date')}}</th>
                            		</tr>
                         		</thead>
                         		<tbody>
                                     @if(count($codes) > 0)
                                     @foreach($codes as $code)
                                    <tr>
                                       	<td class="time" data-title="Time">{{$code->code}}</td>
                                       	<td class="session" data-title="Session">{{$code->title}}</td>
                                       	<td class="about" data-title="About Speaker"><span>{{$code->created_at->toDateString()}} </span>
                                       	<p class="td-icon"><i class="fas fa-angle-down"></i></p></td>
                                    </tr>
                                    <tr class="event-sd">
                                    	<td colspan="3">
                                       		<div class="content">
		                                       	<div class="row align-items-center">
		                                       		<div class="col-lg-8 col-12">
			                                       		<div class="tdc-ls">
			                                       			<h4>{{trans('vip.The content of the')}} {{$code->code}} </h4>
			                                       			<p>{!!$code->description!!}</p>
			                                       		</div>
		                                       		</div>
		                                       	
		                                       	</div>
	                                       	</div>
	                                    </td>
                                    </tr>


                                   @endforeach
                                   @else
                        <div class="alert alert-danger" role="alert">
                        {{trans('about_trans.No result about your search')}}
                         </div>
                        <div class="d-flex justify-content-center">
                             <a href="">

                             
                                <img src="{{ asset('assests/images/noresult.png')  }}" alt="speaker"  style="height: 500px;width: 1000px">
                            



                            </a>
                            </div>
                         @endif
                             	</tbody>
                      		</table>
							  <div class="pagination-area d-flex flex-wrap justify-content-center">
                                @if ($codes->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                                <li class="prev"> <a ref="{{ $codes->url(1) }}" class="{{ ($codes->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                    <span>« Précédent</span></a></li>
                                @for ($i = 1; $i <= $codes->lastPage(); $i++)
                                <li class="{{ ($codes->currentPage() == $i) ? ' active' : '' }} page-item">
                                       <a href="{{ $codes->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                                @endfor
                                
                                <li class="dot">....</li>
                               
                                <li  class="{{ ($codes->currentPage() == $codes->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $codes->url($codes->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                            </ul>
                                @endif
                        </div>
                   		</div>
                  	</div>
				</div>



					
			</div>
		</div>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"   
  type="text/javascript"></script> 
<script type="text/javascript">
$(document).ready(function(){        
    $("select#mySelect").change(function(){
      //$("#selText").html($($(this).children("option:selected")[0]).text());
       var txt = $($(this).children("option:selected")[0]).text();
       $("<span>" + txt + "<br/></span>").appendTo($("#selText span:last"));
    });
});
</script>	
    @endsection