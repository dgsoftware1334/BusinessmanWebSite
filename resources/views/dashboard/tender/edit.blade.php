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
                <form action="{{ route('admin.tender.update',[$tender->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
                      <input type="text" class="form-control" name="intitule" placeholder="Intitule de l'appel d'offre" value="{{ $tender->intitule}}" class="@error('intitule') is-invalid @enderror" required>
                      <span class="text-danger">@error('intitule'){{ $message }} @enderror</span>

                    </div>
                  </div>
                    
            
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Date de parution<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_parution"  value="{{ $tender->date_parution}}">
                         <span class="text-danger">@error('date_parution'){{ $message }} @enderror</span>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Date limite<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="date_limite" value="{{ $tender->date_limite}}">
                         <span class="text-danger">@error('date_limite'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Wilaya <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="wilaya" placeholder="La wilaya de l'appel d'offre" value="{{ $tender->wilaya}}" class="@error('wilaya') is-invalid @enderror" required>
                      <span class="text-danger">@error('wilaya'){{ $message }} @enderror</span>

                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Société <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="societe" placeholder="la sociéte qui lance l'appel d'offre" value="{{ $tender->societe}}">
                     <span class="text-danger">@error('societe'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Adresse <span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="adresse" placeholder="l'adresse de l'entreprise" value="{{ $tender->adresse}}">
                     <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                  </div>
                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="description" placeholder="{{trans('register_trans.Description')}}"> "{{ $tender->description}}"</textarea>
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
                       @if($tender->type=="national_ouvert")
                       <option value="national_ouvert" selected> Appel d'offre national ouvert </option>
                       <option value="national_restreint"> Appel d'offre national restreint </option>
                       <option value="international_ouvert"> Appel d'offre international ouvert </option>
                       <option value="international_restreint"> Appel d'offre international restreint </option>
                       @endif
                       @if($tender->type=="national_restreint")
                       <option value="national_restreint" selected> Appel d'offre national restreint </option>
                       <option value="national_ouvert"> Appel d'offre national ouvert </option>
                       <option value="international_ouvert"> Appel d'offre international ouvert </option>
                       <option value="international_restreint"> Appel d'offre international restreint </option>
                       @endif
                       @if($tender->type=="international_ouvert")
                       <option value="international_ouvert" selected> Appel d'offre international ouvert </option>
                       <option value="national_restreint" > Appel d'offre national restreint </option>
                       <option value="national_ouvert" > Appel d'offre national ouvert </option>
                       <option value="international_restreint"> Appel d'offre international restreint </option>
                       @endif
                       @if($tender->type=="international_restreint")
                       <option value="international_restreint" selected> Appel d'offre international restreint </option>
                       <option value="national_restreint" > Appel d'offre national restreint </option>
                       <option value="national_ouvert"> Appel d'offre national ouvert </option>
                       <option value="international_ouvert"> Appel d'offre international ouvert </option>
                       @endif
            
                    </select>

                    </div>
                  </div><br>
                   <div class="form-group row">
                      <div class="form-check">
                      &nbsp; &nbsp;&nbsp; &nbsp;    &nbsp; &nbsp;
                      @if($tender->genre==1)
                           <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault1" value="1" Checked>
                             <label class="form-check-label" for="flexRadioDefault1">Public</label>
                             &nbsp; &nbsp;    &nbsp; &nbsp;
                            
                             <input class="form-check-input" type="radio" name="genre" value="0" id="flexRadioDefault1">
                             <label class="form-check-label" for="flexRadioDefault1">privé</label>
                             @else
                             <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault1" value="1">
                             <label class="form-check-label" for="flexRadioDefault1">Public</label>
                             &nbsp; &nbsp;    &nbsp; &nbsp;
                            
                             <input class="form-check-input" type="radio" name="genre" value="0" id="flexRadioDefault1" Checked>
                             <label class="form-check-label" for="flexRadioDefault1">privé</label>
                             @endif
                     </div>
                  </div>

            
         

          

             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >prix cahier de charge</label>
                    <div class="col-sm-9">
                   <input type="text" class="form-control" name="prix_cahier" placeholder="prix du cahier de charge ">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Secteur</label>
                    <div class="col-sm-9">
                    <select name="sacteur_id" id="department" class="form-control">
                    <option value="">Aucun</option>

                          @foreach($secteurs as $secteur)
                            @if((isset($tender->secteur->id)))
                                @if( ($tender->secteur->id == $secteur->id))
                                  <option value="{{ $secteur->id }}" selected>{{ $secteur->libelle }}</option>
                                 @endif
                            @endif

                            @if($tender->secteur_id!= $secteur->id   )

                               <option value="{{ $secteur->id }}">{{ $secteur->libelle }}</option>

                             @endif
                          @endforeach
                       </select>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-3 col-form-label" name="image">Copie de l'annonce<span style="color:red">*</span></label>
                    <div class="input-group col-sm-9">
                      <div class="custom-file col-sm-9">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"  class="@error('image') is-invalid @enderror" value="{{  $tender->image }}">
                       
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
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"  value="{{ old('file') }}" class="@error('file') is-invalid @enderror" value="{{  $tender->doc }}">
                       
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