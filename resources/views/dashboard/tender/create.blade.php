@extends('dashboard.layouts.sidebar')
@section('content')
 <!-- Main content -->
 <style type="text/css">
  
.tab-head{
padding-left: 0px !important;
padding-right: 0px !important;
}
.nav-item1 a:focus{
outline: unset;
}
.nav-item1 a:hover{
border: 1px solid #fff !important;
}
.nav-item1 a{
color: black !important;
font-weight: 600;
padding-left: 28px;
padding-right: 28px;
}
.nav-item1 .active{
color: #5741A3 !important;
border:none !important;
border-bottom: 3px solid blue !important;
font-weight: 600;
}
.nav-item1 .active:hover{
border:none !important;
border-bottom: 3px solid blue !important;
}
.nav-tabs{
border-bottom: none !important;
}
.tab-pane h5{
border-left: 4px solid blue;
}
.tab-pane p{
border-top: 1px solid blue;
}
 </style>
 <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajouter un appel d'offre</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ajouter un appel d'offre</a></li>
              <li class="breadcrumb-item active">Accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@if(session('success'))
<div class="alert alert-success">
 {{ session('success') }}
</div>
@endif



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card card-default">
         
       
          <div class="card-body">
            <div class="row">
               <br/> <br/> <br/> <br/>
              <div class="col-md-6">
                <div class="card card-primary">
              <div class="card-header">
             
                <h3 class="card-title">Information générales</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.tender.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
               @if (Session::get('success'))
                         <div class="alert alert-success">
                             {{ Session::get('success') }}
                         </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Intitule <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="intitule" placeholder="Intitule de l'appel d'offre" value="{{ old('intitule') }}" class="@error('intitule') is-invalid @enderror" required>
                      <span class="text-danger">@error('intitule'){{ $message }} @enderror</span>

                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >العنوان <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="intitule_ar" placeholder="Intitule de l'appel d'offre" value="{{ old('intitule') }}" class="@error('intitule') is-invalid @enderror" required>
                      <span class="text-danger">@error('intitule'){{ $message }} @enderror</span>

                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >The title <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="intitule_en" placeholder="Intitule de l'appel d'offre" value="{{ old('intitule') }}" class="@error('intitule') is-invalid @enderror" required>
                      <span class="text-danger">@error('intitule'){{ $message }} @enderror</span>

                    </div>
                  </div>
                    
            
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Date de parution<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_parution"  value="{{ old('date_parution') }}">
                         <span class="text-danger">@error('date_parution'){{ $message }} @enderror</span>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Date limite<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_limite" value="{{ old('date_limite') }}">
                         <span class="text-danger">@error('date_limite'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Wilaya <span style="color:red">*</span></label>
                    <div class="col-sm-9">
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
                        </select>
                      <span class="text-danger">@error('wilaya'){{ $message }} @enderror</span>

                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Wilaya <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                           <select class="form-control search-slt" size="1"  name="wilaya_ar" id="mySelect">
					                     <option value=""> -- الولايات  --</option>
                               <option value="01">أدرار</option>
                               <option value="02">الشلف</option>
                               <option value="03">الأغواط</option>
                               <option value="04">أم البواقي</option>
                               <option value="05">باتنة</option>
                               <option value="06">بجاية</option>
							                 <option value="07">بسكرة </option>
							                 <option value="08">بشار</option>
							                 <option value="09">البليدة</option>
							                 <option value="10">البويرة</option>
							                 <option value="11">تمنراست</option>
							                 <option value="12">تبسة</option>
							                 <option value="13">تلمسان</option>
							                 <option value="14">تيارت</option>
							                 <option value="15">تيزي وزو</option>
							                 <option value="16">الجزائر</option>
							                 <option value="17">الجلفة</option>
							                 <option value="18">جيجل</option>
							                 <option value="19">سطيف</option>
							                 <option value="20">السعيدة</option>
							                 <option value="21">سكيكدة</option>
							                 <option value="22">سيدي بلعباس</option>
							                 <option value="23">عنابة</option>
							                 <option value="24">قالمة</option>
							                 <option value="25">قسنطينة</option>
							                 <option value="26">المدية</option>
							                 <option value="27">مستغانم</option>
							                 <option value="28">المسيلة</option>
							                 <option value="29">معسكر</option>
							                 <option value="30">ورقلة </option>
							                 <option value="31">وهران</option>
							                 <option value="32">البيض</option>
							                 <option value="33">إليزي</option>
							                 <option value="34">برج بوعريريج</option>
							                 <option value="35">بومرداس</option>
							                 <option value="36">الطارف</option>
							                 <option value="37">تندوف</option>
							                 <option value="38">تسيمسيلت</option>
							                <option value="39">الوادي</option>
							                <option value="40">خنشلة</option>
							                <option value="41">سوق اهراس</option>
							                <option value="42">تيبازة</option>
							                <option value="43">ميلة</option>
							                <option value="44">عين الدفلى</option>
							                <option value="45">النعامة</option>
							                <option value="46">عين تموشنت</option>
							                <option value="47">غرادية </option>
							                <option value="48">غليزان</option>
							                <option value="49">تيميمون</option>
							                <option value="50">برج باجي مختار</option>
							                <option value="51">أولاد جلال </option>
							                <option value="52">بني عباس</option>
							                <option value="53">عين صالح</option>
							                <option value="54">عين قزام</option>
							                <option value="55">توقرت</option>
							                <option value="56">جانت</option>
							                <option value="57">المغير </option>
							                <option value="58">المنيعة</option>
                        </select>
                      <span class="text-danger">@error('wilaya'){{ $message }} @enderror</span>

                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Société <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="societe" placeholder="la sociéte qui lance l'appel d'offre" value="{{ old('societe') }}">
                     <span class="text-danger">@error('societe'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الشركة المسؤولة <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="societe_ar" placeholder="la sociéte qui lance l'appel d'offre" value="{{ old('societe') }}">
                     <span class="text-danger">@error('societe'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Adresse <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="adresse" placeholder="l'adresse de l'entreprise" value="{{ old('adresse') }}">
                     <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >العنوان <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="adresse_ar" placeholder="l'adresse de l'entreprise" value="{{ old('adresse') }}">
                     <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                  </div>
                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="description" placeholder="{{trans('register_trans.Description')}}" value="{{ old('description') }}"></textarea>
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الوصف<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="description_ar" placeholder="{{trans('register_trans.Description')}}" value="{{ old('description') }}"></textarea>
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >The description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="description_en" placeholder="{{trans('register_trans.Description')}}" value="{{ old('description') }}"></textarea>
                          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>
                  </div>



                  <br/>
                   
                </div>
               
              
             
                <!-- /.form group -->
              </div>
              
              <!-- /.card-body -->
            </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informations détaillées</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                    
             
                <div class="card-body">      

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Type</label>
                    <div class="col-sm-9">
                   <select name="type" class="form-control">
                       <option value=""> -- Choisir --</option>
                       <option value="national ouvert"> national ouvert </option>
                       <option value="national restreint"> national restreint </option>
                       <option value="international ouvert"> international ouvert </option>
                       <option value="international restreint"> international restreint </option>
            
                    </select>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >النوع</label>
                    <div class="col-sm-9">
                   <select name="type_ar" class="form-control">
                       <option value=""> -- اختر --</option>
                       <option value="وطنية مفتوحة"> وطنية مفتوحة </option>
                       <option value="وطنية محدودة"> وطنية محدودة </option>
                       <option value="دولية مفتوحة"> دولية مفتوحة </option>
                       <option value="دولية محدودة"> دولية محدودة </option>
            
                    </select>

                    </div>
                  </div>
                  <br>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >The type</label>
                    <div class="col-sm-9">
                   <select name="type_en" class="form-control">
                       <option value=""> -- Choose --</option>
                       <option value="National open"> National open </option>
                       <option value="Restricted National"> Restricted National </option>
                       <option value="International open"> International open </option>
                       <option value="International restricted"> International restricted </option>
            
                    </select>

                    </div>
                  </div>
                   <div class="form-group row">
                      <div class="form-check">
                      &nbsp; &nbsp;&nbsp; &nbsp;    &nbsp; &nbsp;
                           <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault1" value="1">
                             <label class="form-check-label" for="flexRadioDefault1">Public</label>
                             &nbsp; &nbsp;    &nbsp; &nbsp;
                             <input class="form-check-input" type="radio" name="genre" value="0" id="flexRadioDefault1">
                             <label class="form-check-label" for="flexRadioDefault1">privé</label>
                     </div>
                  </div>

            
         

          

             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >prix cahier de charge</label>
                    <div class="col-sm-9">
                   <input type="text" class="form-control" name="prix_cahier" placeholder="Prix du cahier de charge">

                    </div>
                  </div>
<?php

use App\Models\Secteur;
  $secteurs=Secteur::all();
?>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Secteur</label>
                    <div class="col-sm-9">
                   <select name="sacteur_id" id="department" class="form-control">
                  <option value=""> -- Select One --</option>
                  @foreach ($secteurs as $secteur)
                  <option value="{{ $secteur->id }}"  {{ (isset($secteur->id) || old('id'))? :"" }}>{{ $secteur->libelle }}</option>
                    @endforeach 
            </select>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-3 col-form-label" name="image">Copie de l'annonce<span style="color:red">*</span></label>
                    <div class="input-group col-sm-9">
                      <div class="custom-file col-sm-9">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"  class="@error('image') is-invalid @enderror">
                       
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                    
                      <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  
                </div>


                <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-3 col-form-label" name="file">Document<span style="color:red">*</span></label>
                    <div class="input-group col-sm-9">
                      <div class="custom-file col-sm-9">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"  value="{{ old('file') }}" class="@error('file') is-invalid @enderror">
                       
                        <label class="custom-file-label" for="exampleInputFile">Choisir un document</label>
                      </div>
                    
                      <span class="text-danger">@error('file'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  
                </div>
                
             <br><br><br><br><br>
            


              </div>
           
            </div>
              
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group row">
              <div class="input-group col-sm-12">
               <br/>
                  <button type="submit" class="btn btn-outline-info btn-block btn-flat"><img src="https://img.icons8.com/fluency/26/000000/save.png"/> Enregistrer</button>


                   </div>
                    </div>
                    </form>
           
          </div>
          
        </div>

</div>






    
  <!-- /.content-wrapper -->
@endsection