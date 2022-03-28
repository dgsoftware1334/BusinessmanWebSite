@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">Les codes <span>Commerciaux</span></span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="">Accueil</a></li>
							<li class="active">Les codes commerciaux</li>
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
                        <input type="text" name="title" placeholder="Rechercher par titre" id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                         &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
							
					   <div class="col-lg-3 col-md-3 col-sm-12 p-0"> 
                       <input type="text" name="code" placeholder="Rechercher par code" id="text" class="px-2 py-2 w-full">

					   </div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp;
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="text" name="description" placeholder="Rechercher par description"  id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        

                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" class="button" style="width:280px;height:45px;background-color:#F73087">Rechercher</button>
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
                                       <th class="time">Code</th>
                                       <th class="session">Titre</th>
                                       <th class="spekers">Date de publication</th>
                            		</tr>
                         		</thead>
                         		<tbody>
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
			                                       			<h4>Le contenu du {{$code->code}} :</h4>
			                                       			<p>{{$code->description}}</p>
			                                       		</div>
		                                       		</div>
		                                       	
		                                       	</div>
	                                       	</div>
	                                    </td>
                                    </tr>


                                   @endforeach
                             	</tbody>
                      		</table>
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