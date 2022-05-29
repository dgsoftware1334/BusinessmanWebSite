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
            <h1 class="m-0">Ajouter une vidéo publicitaire </h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ajouter une vidéo publicitaire</a></li>
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

   <div class="row">
        <div class="col-sm-1 col-md-1 "></div>
        <br/>
        <div class="col-sm-6 col-md-10 col-md-offset-1 py-3">

           <div class="card card-primary card-outline">
        
            <form class="form-horizontal" method="POST" action="{{ route('admin.video.store') }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le titre <span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer le titre en (fr)" name="title" class="@error('title') is-invalid @enderror">
                      <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le Titre (ar)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اكتب العنوان باللغة العربية" name="title_ar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le titre (en)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Write the title in english" name="title_en">
                    </div>
                  </div>
                 
     
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Catégorie <span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer la catégorie en (fr)" name="categorie" class="@error('sujet') is-invalid @enderror">
                      <span class="text-danger">@error('sujet'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Catégorie (ar) </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer la catégorie en (ar)" name="categorie_ar" class="@error('sujet') is-invalid @enderror">
                      <span class="text-danger">@error('sujet'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Categorie (en) </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer la catégorie en (en)" name="categorie_en" class="@error('sujet') is-invalid @enderror">
                      <span class="text-danger">@error('sujet'){{ $message }} @enderror</span>
                    </div>
                  </div>
              
                 
                  
                  
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description<span style="color:red">*</span></label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="description" id="fr" placeholder="Entrer une description sur la chambre" class="@error('description') is-invalid @enderror"></textarea>
                      <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description(ar) </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="description_ar" id="ar" placeholder="اكتب المحتوى بالعربي ..."></textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description(en)</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" id="en" name="description_en" placeholder="Write the description in english ..."></textarea>

                    </div>
                  </div>
               

                
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >date d'expiration <span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputEmail3" placeholder="Entrer le titre en (fr)" name="date_expiration" class="@error('sujet') is-invalid @enderror">
                      <span class="text-danger">@error('sujet'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  

          
                  <br/>
                  <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Vidéo<span style="color:red">*</span></label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"  class="@error('photo') is-invalid @enderror">
                       
                        <label class="custom-file-label" for="exampleInputFile">Choisis une video</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <span class="text-danger">@error('photo'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <br/>
                   <div class="form-group row">
                      <div class="input-group col-sm-12">
                  <!--button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button-->
<br/>

                  <button type="submit" class="btn btn-outline-info btn-block btn-flat"><img src="https://img.icons8.com/fluency/26/000000/save.png"/> Enregistrer</button>


                   </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!--div class="card-footer">
               
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div-->
                <!-- /.card-footer -->
              </form>
            </div>
<!---end div col-sm-12 col-md-10 col-md-offset-1--->
        </div>
<!--end div row------>
</div>



</div>




<script>
    ClassicEditor
        .create( document.querySelector( '#fr' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#ar' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#en' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#pofr' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#poar' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#poen' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

    
  <!-- /.content-wrapper -->
@endsection