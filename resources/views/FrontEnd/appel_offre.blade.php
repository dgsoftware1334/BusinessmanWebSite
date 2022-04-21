@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">{{trans('vip.Tenders')}} </span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="">{{trans('vip.Home')}}</a></li>
							<li class="active">{{trans('vip.Tenders')}}</li>
						</ol>
					</div>
                </div>
            </div>
        </div>
    </div>

<br><br>

                
	<section class="search-sec">
    <div class="container">
        <form action="{{route('user.search.offer')}}" method="GET" novalidate="novalidate" autocomplete="off">
        @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="text" name="nom" placeholder="{{trans('vip.Name')}}" id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" name="secteur" id="exampleFormControlSelect1">
                            <option value="">{{trans('vip.Sectors')}}...</option>
                         
							@foreach ($secteurs as $secteur)
                            <option value="{{ $secteur->libelle }}">{{ $secteur->libelle }}</option>
                            @endforeach
                           
                            </select></div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
							<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<select class="form-control search-slt" name="type" id="exampleFormControlSelect1">
							<option value=""> -- {{trans('vip.Choose')}} --</option>
                       <option value="national ouvert"> {{trans('vip.National open')}} </option>
                       <option value="national restreint"> {{trans('vip.Restricted National')}} </option>
                       <option value="international ouvert"> {{trans('vip.International open')}} </option>
                       <option value="international restreint">{{trans('vip.International restricted')}} </option>
					   </select></div>
					   <div class="col-lg-3 col-md-3 col-sm-12 p-0"> 
					   <select class="form-control search-slt" size="1"  name="wilaya" id="mySelect">
					   <option value=""> -- {{trans('vip.City')}} --</option>
                               <option value="01">{{trans('vip.Adrar')}}</option>
                               <option value="02">{{trans('vip.Chlef')}}</option>
                               <option value="03">{{trans('vip.Laghouat')}}</option>
                               <option value="04">{{trans('vip.Oum El Bouaghi')}}</option>
                               <option value="05"> {{trans('vip.Batna')}}</option>
                               <option value="06">{{trans('vip.Bejaia')}} </option>
							   <option value="07">{{trans('vip.Biskra')}}  </option>Biskra Béchar Blida Bouira Tamanrasset Tébessa Tlemcen
							   <option value="08">{{trans('vip.Béchar')}} </option>
							   <option value="09">{{trans('vip.Blida')}} </option>
							   <option value="10">{{trans('vip.Bouira')}} </option>
							   <option value="11">{{trans('vip.Tamanrasset')}} </option>
							   <option value="12">{{trans('vip.Tébessa')}} </option>
							   <option value="13">{{trans('vip.Tlemcen')}} </option>
							   <option value="14">{{trans('vip.Tiaret')}}</option> 
							   <option value="15">{{trans('vip.Tizi Ouzou')}}</option>
							   <option value="16">{{trans('vip.Alger')}}</option>
							   <option value="17">{{trans('vip.Djelfa')}}</option>
							   <option value="18">{{trans('vip.Jijel')}}</option>
							   <option value="19">{{trans('vip.Sétif')}}</option>
							   <option value="20">{{trans('vip.Saïda')}}</option>
							   <option value="21">{{trans('vip.Skikda')}}</option>
							   <option value="22">{{trans('vip.Sidi Bel Abbès')}}</option>
							   <option value="23">{{trans('vip.Annaba')}}</option>
							   <option value="24">{{trans('vip.Guelma')}}</option>
							   <option value="25">{{trans('vip.Constantine')}}</option>
							   <option value="26">{{trans('vip.Médéa')}}</option>
							   <option value="27">{{trans('vip.Mostaganem')}}</option>
							   <option value="28">{{trans('vip.MSila')}}</option>
							   <option value="29">{{trans('vip.Mascara')}}</option> 
							   <option value="30">{{trans('vip.Ouargla')}} </option>
							   <option value="31">{{trans('vip.Oran')}}</option>
							   <option value="32">{{trans('vip.Bayadh')}}</option>
							   <option value="33">{{trans('vip.Illizi')}}</option>
							   <option value="34">{{trans('vip.Bordj Bou Arreridj')}}</option>
							   <option value="35">{{trans('vip.Boumerdès')}}</option>
							   <option value="36">{{trans('vip.El Tarf')}}</option>
							   <option value="37">{{trans('vip.Tindouf')}}</option>
							   <option value="38">{{trans('vip.Tissemsilt')}}</option>
							   <option value="39">{{trans('vip.El Oued')}}</option>
							   <option value="40">{{trans('vip.Khenchela')}}</option> 
							   <option value="41">{{trans('vip.Souk Ahras')}}</option>
							   <option value="42">{{trans('vip.Tipaza')}}</option>
							   <option value="43">{{trans('vip.Mila')}}</option>
							   <option value="44">{{trans('vip.Aïn Defla')}}</option>
							   <option value="45">{{trans('vip.Naâma')}}</option>
							   <option value="46">{{trans('vip.Aïn Témouchent')}}</option>
							   <option value="47">{{trans('vip.Ghardaïa')}} </option>
							   <option value="48">{{trans('vip.Relizane')}}</option>
							   <option value="49">{{trans('vip.Timimoun')}}</option>
							   <option value="50">{{trans('vip.Bordj Badji Mokhtar')}}</option>
							   <option value="51">{{trans('vip.Ouled Djellal')}} </option>
							   <option value="52">{{trans('vip.Béni Abbès')}} </option>
							   <option value="53">{{trans('vip.In Salah')}}</option>
							   <option value="54">{{trans('vip.In Guezzam')}}</option>
							   <option value="55">{{trans('vip.Touggourt')}}</option>
							   <option value="56">{{trans('vip.Djanet')}}</option>
							   <option value="57">{{trans('vip.MGhair')}} </option>
							   <option value="58">{{trans('vip.El Meniaa')}}</option>


                        </select></div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp;
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="date" name="date"  id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        

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
                                       <th class="time">{{trans('vip.Release date')}} -{{trans('vip.deadline')}}</th>
                                       <th class="session">{{trans('vip.Title of the tender')}}</th>
                                       <th class="spekers">{{trans('vip.The sector of the tender')}}</th>
									   
                            		</tr>
                         		</thead>
                         		<tbody>
									 <?php $isset = isset($message) ?>
								 @if($isset)
                                      <div class="alert alert-danger">
                                             <ul>
                                                           
                                                     <li>{{ $message }}</li>
                                                        
                                             </ul>
                                         </div>
		                                    <div class="d-flex justify-content-center">
                                              <a href="">
                                                             <img src="{{ asset('assests/images/noresult.png')  }}" alt="speaker"  style="height: 500px;width: 1000px">
                                              </a>
                                            </div> 
                                  @endif           
												
								 @if(count($tenders) >0)
                                     @foreach($tenders as $tender)
									
                                    <tr>
                                       	<td class="time" data-title="Time">{{trans('vip.Release')}} :{{$tender->date_parution}} <br> {{trans('vip.Deadline')}} :{{$tender->date_limite}}</td>
                                       	<td class="session" data-title="Session">{{$tender->intitule}}</td>
                                       	<td class="about" data-title="About Speaker"><span>{{$tender->secteur->libelle}} </span>
                                       	<p class="td-icon"><i class="fas fa-angle-down"></i></p></td>
                                    </tr>
                                    <tr class="event-sd">
                                    	<td colspan="3">
                                       		<div class="content">
		                                       	<div class="row align-items-center">
		                                       		<div class="col-lg-8 col-12">
			                                       		<div class="tdc-ls">
			                                       			<h4>{{trans('vip.Detail of the tender')}} </h4>
			                                       			<p>{{$tender->description}}</p>
															   <h4>{{trans('vip.The type of the tender')}} </h4>
			                                       			<p>{{$tender->type}}</p>
			                                       		</div>
		                                       		</div>
													   <div class="col-lg-8 col-12">
			                                       		<div class="tdc-ls">
			                                       			<h4>{{trans('vip.Public or private')}} </h4>
															   @if($tender->genre == 0)
			                                       			<p>{{trans('vip.Private')}}</p>
															 @else
			                                       			<p>{{trans('vip.Public')}}</p>
															   @endif
			                                       		</div>
		                                       		</div>
		                                       		<div class="col-lg-4 col-12">
		                                       			<div class="tdc-rs d-flex flex-wrap align-items-center">
														   <div class="col-12 col-lg-7">
			                                       				<div class="tdc-info">
				                                       				<p>{{trans('vip.Adress')}} : {{$tender->adresse}} {{$tender->wilaya}}</p>
				                                       			
				                                       			</div>
				                                       		</div>
		                                       				<div class="col-12 col-lg-5">
			                                       				<div class="tdc-thumb">
                                                                   @if(is_null($tender->doc))
                                                                             vide
                                                                   @endif
                                                                   @if(!is_null($tender->doc))
                                                                      <a href=" {{url('user/tender/download',$tender->doc)}}"><i class="fas fa-download"></i></a>

                                                                         @endif
				                                       			</div>
				                                       		</div>
													
				                                       		<div class="col-12 col-lg-7">
			                                       				<div class="tdc-info">
				                                       				<a href="#" class="name">{{trans('vip.Published by the company')}} : {{$tender->societe}}</a>
				                                       			
				                                       			</div>
				                                       		</div>
		                                       			</div>
		                                       		</div>
		                                       	</div>
	                                       	</div>
	                                    </td>
                                    </tr>


                                   @endforeach
								

                         @endif
                             	</tbody>
								
                      		</table>
							  <div class="pagination-area d-flex flex-wrap justify-content-center">
                                @if ($tenders->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                                <li class="prev"> <a ref="{{ $tenders->url(1) }}" class="{{ ($tenders->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                    <span>« Précédent</span></a></li>
                                @for ($i = 1; $i <= $tenders->lastPage(); $i++)
                                <li class="{{ ($tenders->currentPage() == $i) ? ' active' : '' }} page-item">
                                       <a href="{{ $tenders->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                                @endfor
                                
                                <li class="dot">....</li>
                               
                                <li  class="{{ ($tenders->currentPage() == $tenders->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $tenders->url($tenders->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
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