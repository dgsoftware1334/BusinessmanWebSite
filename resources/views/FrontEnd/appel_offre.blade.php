@extends('layouts.visiteur')

@section('content')

	<!-- page header section -->
    <div class="page-header-section post-title style-1"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/banner/11.jpg') }})">
        <div class="overlay">
            <div class="page-header-content">
                <div class="container container-1310">
					<div class="page-header-content-inner">
						<div class="page-title">
							<span class="title-text">Les appels <span>D'offre</span></span>
						</div>
						<ol class="breadcrumb">
							
							<li><a href="">Accueil</a></li>
							<li class="active">Les appels d'offre</li>
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
                        <input type="text" name="nom" placeholder="Désignation..." id="text" class="px-2 py-2 w-full">
                        </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-slt" name="secteur" id="exampleFormControlSelect1">
                            <option value="">Secteur...</option>
                         
							@foreach ($secteurs as $secteur)
                            <option value="{{ $secteur->libelle }}">{{ $secteur->libelle }}</option>
                            @endforeach
                           
                            </select></div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
							<div class="col-lg-3 col-md-3 col-sm-12 p-0">
							<select class="form-control search-slt" name="type" id="exampleFormControlSelect1">
							<option value=""> -- Choisir --</option>
                       <option value="national ouvert"> national ouvert </option>
                       <option value="national restreint"> national restreint </option>
                       <option value="international ouvert"> international ouvert </option>
                       <option value="international restreint"> international restreint </option>
					   </select></div>
					   <div class="col-lg-3 col-md-3 col-sm-12 p-0"> 
					   <select class="form-control search-slt" size="1"  name="wilaya" id="mySelect">
					   <option value=""> -- Wilaya --</option>
                               <option value="01">Adrar</option>
                               <option value="02">Chlef</option>
                               <option value="03">Laghouat</option>
                               <option value="04">Oum El Bouaghi</option>
                               <option value="05">Batna</option>
                               <option value="06">Bejaia</option>
							   <option value="07">Biskra </option>
							   <option value="08">Béchar</option>
							   <option value="09">Blida</option>
							   <option value="10">Bouira</option>
							   <option value="11">Tamanrasset</option>
							   <option value="12">Tébessa</option>
							   <option value="13">Tlemcen</option>
							   <option value="14">Tiaret</option>
							   <option value="15">Tizi Ouzou</option>
							   <option value="16">Alger</option>
							   <option value="17">Djelfa</option>
							   <option value="18">Jijel</option>
							   <option value="19">Sétif</option>
							   <option value="20">Saïda</option>
							   <option value="21">Skikda</option>
							   <option value="22">Sidi Bel Abbès</option>
							   <option value="23">Annaba</option>
							   <option value="24">Guelma</option>
							   <option value="25">Constantine</option>
							   <option value="26">Médéa</option>
							   <option value="27">Mostaganem</option>
							   <option value="28">MSila</option>
							   <option value="29">Mascara</option>
							   <option value="30">Ouargla </option>
							   <option value="31">Oran</option>
							   <option value="32">Bayadh</option>
							   <option value="33">Illizi</option>
							   <option value="34">Bordj Bou Arreridj</option>
							   <option value="35">Boumerdès</option>
							   <option value="36">El Tarf</option>
							   <option value="37">Tindouf</option>
							   <option value="38">Tissemsilt</option>
							   <option value="39">El Oued</option>
							   <option value="40">Khenchela</option>
							   <option value="41">Souk Ahras</option>
							   <option value="42">Tipaza</option>
							   <option value="43">Mila</option>
							   <option value="44">Aïn Defla</option>
							   <option value="45">Naâma</option>
							   <option value="46">Aïn Témouchent</option>
							   <option value="47">Ghardaïa </option>
							   <option value="48">Relizane</option>
							   <option value="49">Timimoun</option>
							   <option value="50">Bordj Badji Mokhtar</option>
							   <option value="51">Ouled Djellal </option>
							   <option value="52">Béni Abbès </option>
							   <option value="53">In Salah</option>
							   <option value="54">In Guezzam</option>
							   <option value="55">Touggourt</option>
							   <option value="56">Djanet</option>
							   <option value="57">M'Ghair </option>
							   <option value="58">El Meniaa</option>


                        </select></div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						&nbsp; &nbsp; &nbsp;
						<div class="col-lg-3 col-md-3 col-sm-12 p-0">
                        <input type="date" name="date"  id="text" class="px-2 py-2 w-full">
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
                                       <th class="time">Date de parution -Date limite</th>
                                       <th class="session">L'intitulé de l'appel d'offre</th>
                                       <th class="spekers">Le secteur de l'offre</th>
                            		</tr>
                         		</thead>
                         		<tbody>
                                     @foreach($tenders as $tender)
                                    <tr>
                                       	<td class="time" data-title="Time">Parution :{{$tender->date_parution}} <br> Limite :{{$tender->date_limite}}</td>
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
			                                       			<h4>Détails de l'appel d'offre</h4>
			                                       			<p>{{$tender->description}}</p>
			                                       		</div>
		                                       		</div>
		                                       		<div class="col-lg-4 col-12">
		                                       			<div class="tdc-rs d-flex flex-wrap align-items-center">
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
				                                       				<a href="#" class="name">Par la société : {{$tender->societe}}</a>
				                                       			
				                                       			</div>
				                                       		</div>
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