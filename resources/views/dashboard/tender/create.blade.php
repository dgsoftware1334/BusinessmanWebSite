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
                               <option value="Adrar">Adrar</option>
                               <option value="Chlef">Chlef</option>
                               <option value="Laghouat">Laghouat</option>
                               <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                               <option value="Batna">Batna</option>
                               <option value="Bejaia">Bejaia</option>
							                 <option value="Biskra">Biskra </option>
							                 <option value="Béchar">Béchar</option>
							                 <option value="Blida">Blida</option>
							                 <option value="Bouira">Bouira</option>
							                 <option value="Tamanrasset">Tamanrasset</option>
							                 <option value="Tébessa">Tébessa</option>
							                 <option value="Tlemcen">Tlemcen</option>
							                 <option value="Tiaret">Tiaret</option>
							                 <option value="Tizi Ouzou">Tizi Ouzou</option>
							                 <option value="Alger">Alger</option>
							                 <option value="Djelfa">Djelfa</option>
							                 <option value="Jijel">Jijel</option>
							                 <option value="Sétif">Sétif</option>
							                 <option value="Saïda">Saïda</option>
							                 <option value="Skikda">Skikda</option>
							                 <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
							                 <option value="Annaba">Annaba</option>
							                 <option value="Guelma">Guelma</option>
							                 <option value="Constantine">Constantine</option>
							                 <option value="Médéa">Médéa</option>
							                 <option value="Mostaganem">Mostaganem</option>
							                 <option value="MSila">MSila</option>
							                 <option value="Mascara">Mascara</option>
							                 <option value="Ouargla">Ouargla </option>
							                 <option value="Oran">Oran</option>
							                 <option value="Bayadh">Bayadh</option>
							                 <option value="Illizi">Illizi</option>
							                 <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
							                 <option value="Boumerdès">Boumerdès</option>
							                 <option value="El Tarf">El Tarf</option>
							                 <option value="Tindouf">Tindouf</option>
							                 <option value="Tissemsilt">Tissemsilt</option>
							                <option value="El Oued">El Oued</option>
							                <option value="Khenchela">Khenchela</option>
							                <option value="Souk Ahras">Souk Ahras</option>
							                <option value="Tipaza">Tipaza</option>
							                <option value="Mila">Mila</option>
							                <option value="Aïn Defla">Aïn Defla</option>
							                <option value="Naâma">Naâma</option>
							                <option value="Aïn Témouchent">Aïn Témouchent</option>
							                <option value="Ghardaïa">Ghardaïa </option>
							                <option value="Relizane">Relizane</option>
							                <option value="Timimoun">Timimoun</option>
							                <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
							                <option value="Ouled Djellal ">Ouled Djellal </option>
							                <option value="Béni Abbès">Béni Abbès </option>
							                <option value="In Salah">In Salah</option>
							                <option value="In Guezzam">In Guezzam</option>
							                <option value="Touggourt">Touggourt</option>
							                <option value="Djanet">Djanet</option>
							                <option value="MGhair">M'Ghair </option>
							                <option value="El Meniaa">El Meniaa</option>
                        </select>
                      <span class="text-danger">@error('wilaya'){{ $message }} @enderror</span>

                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Wilaya <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                           <select class="form-control search-slt" size="1"  name="wilaya_ar" id="mySelect">
					                     <option value=""> -- الولايات  --</option>
                               <option value="أدرار">أدرار</option>
                               <option value="الشلف">الشلف</option>
                               <option value="الأغواط">الأغواط</option>
                               <option value="أم البواقي">أم البواقي</option>
                               <option value="باتنة">باتنة</option>
                               <option value="بجاية">بجاية</option>
							                 <option value="بسكرة">بسكرة </option>
							                 <option value="بشار">بشار</option>
							                 <option value="البليدة">البليدة</option>
							                 <option value="البويرة">البويرة</option>
							                 <option value="تمنراست">تمنراست</option>
							                 <option value="تبسة">تبسة</option>
							                 <option value="تلمسان">تلمسان</option>
							                 <option value="تيارت">تيارت</option>
							                 <option value="تيزي وزو">تيزي وزو</option>
							                 <option value="الجزائر">الجزائر</option>
							                 <option value="الجلفة">الجلفة</option>
							                 <option value="جيجل">جيجل</option>
							                 <option value="سطيف">سطيف</option>
							                 <option value="السعيدة">السعيدة</option>
							                 <option value="سكيكدة">سكيكدة</option>
							                 <option value="سيدي بلعباس">سيدي بلعباس</option>
							                 <option value="عنابة">عنابة</option>
							                 <option value="قالمة">قالمة</option>
							                 <option value="قسنطينة">قسنطينة</option>
							                 <option value="المدية">المدية</option>
							                 <option value="مستغانم">مستغانم</option>
							                 <option value="المسيلة">المسيلة</option>
							                 <option value="معسكر">معسكر</option>
							                 <option value="ورقلة">ورقلة </option>
							                 <option value="وهران">وهران</option>
							                 <option value="البيض">البيض</option>
							                 <option value="إليزي">إليزي</option>
							                 <option value="برج بوعريريج">برج بوعريريج</option>
							                 <option value="بومرداس">بومرداس</option>
							                 <option value="الطارف">الطارف</option>
							                 <option value="تندوف">تندوف</option>
							                 <option value="تسيمسيلت">تسيمسيلت</option>
							                <option value="الوادي">الوادي</option>
							                <option value="خنشلة">خنشلة</option>
							                <option value="سوق اهراس">سوق اهراس</option>
							                <option value="تيبازة">تيبازة</option>
							                <option value="ميلة">ميلة</option>
							                <option value="عين الدفلى">عين الدفلى</option>
							                <option value="النعامة">النعامة</option>
							                <option value="عين تموشنت">عين تموشنت</option>
							                <option value="غرادية">غرادية </option>
							                <option value="غليزان">غليزان</option>
							                <option value="تيميمون">تيميمون</option>
							                <option value="برج باجي مختار">برج باجي مختار</option>
							                <option value="أولاد جلال">أولاد جلال </option>
							                <option value="بني عباس">بني عباس</option>
							                <option value="عين صالح">عين صالح</option>
							                <option value="عين قزام">عين قزام</option>
							                <option value="توقرت">توقرت</option>
							                <option value="جانت">جانت</option>
							                <option value="المغير">المغير </option>
							                <option value="المنيعة">المنيعة</option>
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
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Secteur<span style="color:red">*</span></label>
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