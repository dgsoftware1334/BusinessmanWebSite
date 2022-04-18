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
            <h1 class="m-0">Les secteurs d'activité</h1>
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
              <li class="breadcrumb-item"><a href="#">Les secteurs d'activité</a></li>
              <li class="breadcrumb-item active">accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

@if(session('supprimer'))
<div class="alert alert-danger">
 {{ session('supprimer') }}
</div>
@endif
 <div class="animated fadeInUp infinite" alt="Transparent MDB Logo" >      
     <div class="card card-primary card-outline">
        <div class="card-body">
         <div class="container">
<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">

</div>
<div class="col-lg-1 ">
  <a type="button"  class="btn btn-block btn-outline-info" data-toggle="modal" data-target="#modal-lg">
<img src="https://img.icons8.com/ios/32/000000/new-job.png"/>
</a>
</div>
   

   <div class="modal fade" id="modal-lg">
       <div class="modal-dialog"style="width: 800px" >
<div class="modal-content"style="width: 800px">
<div class="modal-header" style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; Ajouter un secteur d'activité </h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

         <div class="modal-body">
           <form action="{{ route('admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Le libellé du secteur <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="libelle" placeholder="Donner le libellé du secteur ..." class="@error('libelle') is-invalid @enderror"  >
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description du secteur<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Donner une description du secteur ..." name="description"  class="@error('description') is-invalid @enderror" id="fr" ></textarea>
                        
                      </div>
                    </div>


               
                  </div>
                  <div class="row">
                 
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>اسم المجال</label>
                        <input type="text" class="form-control" placeholder="اكتب اسم المجال بالعربي ..." name="libelle_ar" >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>وصف المجال</label>
                        <textarea class="form-control" rows="3" placeholder="اكتب وصف المجال بالعربي ..." name="description_ar" id="ar"></textarea>
                      </div>
                    </div>
                   </div>
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Libelle of the activity area</label>
                        <input type="text" class="form-control" placeholder="Enter the libelle of the activity area..." name="libelle_en" >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Give a description of the activity area ..." name="description_en" id="en"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                            <label for="">Ajouter une image<span style="color:red">*</span></label>
                            <input type="file" name="image"  class="course form-control">
                        </div>
                  </div>

                  <!-- input states -->
                 
                 

                

                 
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="submit">Valider</button>
            </div>
                  
                </form>
             
          </div>

           
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
             
<!---ajouter secteur----->






<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Libelle</th>
                      <th>Description</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($secteurs as $row)
                    <tr>
                    <td>
                        @if(is_null($row->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($row->image))
                        <img src="{{ asset('assests/images/secteurs/'.$row->image)  }}"   style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px">
                         @endif
                      </td>
                      <td> {{$row->libelle}}</td>
                      <td> {!! Str::limit($row->description, 100) !!}</td>
                      <td>

                     
                     



              
                       <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit{{$row->id}}">
                       <i class="far fa-edit" style="color: blue"></i>
                        </button>
                        <!--read secteur-->
                        <a href="{{url('/secteur',$row->id)}}"  target="_blank">
                       <i class="fas fa-folder" style="color :green" target="_blank"></i>&ensp; 
                       </a>

                         <!--delete secteur-->
                        <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete{{$row->id}}">
                         <i class="far fa-trash-alt" style="color: red"></i>
                        </button>-->
                        <a href="{{url('admin/destroy',$row->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
                     
                       <!--deactive-->

                      </td>
                    </tr>




      <!------------------------------------------update modal------------------------------------->
      <div class="d-flex justify-content-center">  
 <div class="modal fade" id="edit{{$row->id}}">
         <div class="modal-dialog"style="width: 800px" >
<div class="modal-content"style="width: 800px">
<div class="modal-header" style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; Modifie un secteur d'activité </h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
            <div class="modal-body">

               <form action="{{ route('admin.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Le libellé du secteur<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="libelle" placeholder="Enter ..." class="@error('libelle') is-invalid @enderror" value="{{$row->getTranslation('libelle', 'fr')}}" >
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                      </div></div>
                      <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description du secteur<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"  class="@error('description') is-invalid @enderror"  id="upfr<?=$row->id; ?>"  >{{$row->getTranslation('description', 'fr')}}
                        </textarea>
                        
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Libelle en anglais</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_en" value="{{$row->getTranslation('libelle', 'en')}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description en anglais</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_en"  id="upen<?=$row->id; ?>" >{{$row->getTranslation('description', 'en')}}</textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                 
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description en arabe</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_ar"  id="upar<?=$row->id; ?>" >{{$row->getTranslation('description', 'ar')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Libelle en arabe</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_ar" value="{{$row->getTranslation('libelle', 'ar')}}" >
                      </div>
                    </div>
                    </div>
            
                    <div class="col-sm-12">
                            <label for="">Ajouter une image<span style="color:red">*</span></label>
                            <input type="file" name="image"  class="course form-control" value="{{ $row->image }}">
                        </div>
                  </div>

                  <!-- input states -->
                 
                 

                

                 
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
                  
                </form>
            <!-- general form elements disabled -->
            
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
           















                
                
                     <!------------------------------------------delete modal------------------------------------->
                     
                     <div class="modal fade" id="delete{{$row->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Suppression</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Suppression</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="libelle"  value="{{ $row->libelle }}" disabled  >

                        
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                        
                       
                      </div>
                    </div>
                  
                  
                  </div>
              
                  
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
              <button type="submit" class="btn btn-primary" name="submit">Oui</button>
            </div>
                  
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>

<script>
   
        ClassicEditor
        .create( document.querySelector( '#upen<?=$row->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upar<?=$row->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upfr<?=$row->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
    
     
</script>

                      
                    
              @endforeach

                  </tbody>
                </table>
 
</div>
</div>
</div>
</div>

</div>
     </div>
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
       
    
     
</script>

<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<<script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Etes vous sur de bien vouloir supprimer le secteur?',
        text: 'Le secteur sera supprimer ainsi que les informations attaché avec',
        icon: 'warning',
        buttons: ["Annuler", "Oui!"],
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });
});
</script>




  <!-- /.content-wrapper -->
@endsection