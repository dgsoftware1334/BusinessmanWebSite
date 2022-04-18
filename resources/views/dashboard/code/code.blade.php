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
 <script>
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
        document.getElementById('ifNo').style.visibility = 'hidden';
    }
    else {
      document.getElementById('ifNo').style.visibility = 'visible';
      document.getElementById('ifYes').style.visibility = 'hidden';
      
      }

}

function yesnoCheckupdate() {
    if (document.getElementById('yesCheckup').checked) {
        document.getElementById('ifYesup').style.visibility = 'visible';
        document.getElementById('ifNoup').style.visibility = 'hidden';
    }
    else {
      document.getElementById('ifNoup').style.visibility = 'visible';
      document.getElementById('ifYesup').style.visibility = 'hidden';
      
      }

}

 </script>
 <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Les codes commerciaux</h1>
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
              <li class="breadcrumb-item"><a href="#">Les codes commerciaux</a></li>
              <li class="breadcrumb-item active">Accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

 <div class="animated fadeInUp infinite" alt="Transparent MDB Logo" >      
     <div class="card card-primary card-outline">
        <div class="card-body">
         <div class="container">
<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item1">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">tous</a>
</li>


</ul>


</div>
<div class="col-lg-1 ">
     <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                    <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/>
                        </button>

</div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg" style="width: 800px">
          <div class="modal-content" style="width: 800px">
            <div class="modal-header"  style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" >
&ensp; &ensp; &ensp; &ensp; 
&ensp; &ensp; &ensp;&ensp; &ensp; &ensp;Ajouter un nouveau code commercial</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:800px">

              
            <!-- general form elements disabled -->
             <form action="{{ route('admin.code.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr class="solid">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Code<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="code" placeholder="Entrer le code commercial" class="@error('code') is-invalid @enderror"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>الكود<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="code_ar" placeholder="Entrer le code commercial" class="@error('code') is-invalid @enderror"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Titre<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>العنوان<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title_ar" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>The title<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title_en" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror"  >
                      </div>
                    </div>
              
                </div>
                    <hr class="solid">
                    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description (fr))<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Donner une description sur l'evenement..." name="description"  class="@error('description') is-invalid @enderror" id="fr"></textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>اوصف</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_ar" id="ar"></textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>The description</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_en" id="en"></textarea>
                      </div>
                    </div>
                  </div>

                   
               
              
                  </div>
                
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
            </div>
                  
                </form>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



 <table  class="table table-bordered">
                  <thead>
                    <tr>
                    <th>code</th>
                      <th>Description</th>
                     
                      <th style="width:20%;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($codes as $code)
                    <tr>
                    <td>{{$code->code}}</td>
                      <td>
                      {!! Str::limit($code->description, 100) !!}</td>
                      
                     
                      
                     
                      
                     
                      
                      <td>

                      <a data-toggle="modal" data-target="#edit{{$code->id}}">
                       <i class="far fa-edit" style="color: blue"></i>
                        </a>
                        <a data-toggle="modal" data-target="#show{{$code->id}}">
                        <i class="far fa-folder" style="color: blue"></i>
                        </a>
                        <!--read secteur-->
                       <!--<a href="{{url('/event',$code->id)}}">  <i class="far fa-folder" style="color: blue"></i></a>-->
                         <!--delete secteur-->
                         <a href="{{ url('admin/code/delete', $code->id) }}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>

                     
                       <!--deactive-->
                       


                      </td>
                    </tr>


 
      <!------------------------------------------update modal------------------------------------->
          <div class="modal fade" id="edit{{$code->id}}">
        <div class="modal-dialog modal-lg" style="width:800px">
          <div class="modal-content" style="width:800px">
            <div class="modal-header" style="background-color: #4682B4;">
              <h4 class="modal-title" style="color: white">
              
              &ensp;&ensp;&ensp;&ensp;&ensp;
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                Modifier le code commercial </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:800px">

              
            <!-- general form elements disabled -->
            <form action="{{ url('admin/code/update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr class="solid">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Code<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="code" placeholder="Entrer le code commercial" class="@error('code') is-invalid @enderror" value="{{$code->getTranslation('code', 'fr')}}" >
                        <input type="hidden" class="form-control" name="id" placeholder="Entrer le code commercial" class="@error('code') is-invalid @enderror" value="{{$code->id}}" >

                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>الكود<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="code_ar" placeholder="Entrer le code commercial" class="@error('code') is-invalid @enderror" value="{{$code->getTranslation('code', 'ar')}}"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Titre<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror" value="{{$code->getTranslation('title', 'fr')}}"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>العنوان<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title_ar" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror"  value="{{$code->getTranslation('title', 'ar')}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>The title<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="title_en" placeholder="Entrer le titre du code commercial" class="@error('code') is-invalid @enderror" value="{{$code->getTranslation('title', 'en')}}"  >
                      </div>
                    </div>
              
                </div>
                    <hr class="solid">
                    <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description (fr))<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Donner une description sur l'evenement..." name="description"  class="@error('description') is-invalid @enderror" id="fr">{{$code->getTranslation('description', 'fr')}}</textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>اوصف</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_ar" id="ar">{{$code->getTranslation('description', 'ar')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>The description</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_en" id="en">{{$code->getTranslation('description', 'en')}}</textarea>
                      </div>
                    </div>
                  </div>

                   
               
              
                  </div>
                
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
            </div>
                  
                </form>
          
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


       <!------------------------------------------show modal------------------------------------->
       <div class="modal fade" id="show{{$code->id}}">
        <div class="modal-dialog modal-lg" style="width:1200px">
          <div class="modal-content" style="width:1200px">
            <div class="modal-header" style="background-color: #4682B4;">
              <h4 class="modal-title" style="color: white">
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                Modifier le code commercial </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:1200px">

              
            <div class="card">
  <div class="card-header">
  Code N°:  {{$code->code}}
  </div>
  <div class="card-body">
    <h5 class="card-title">Description du code</h5>
    <p class="card-text"> {{$code->description}}</p>
  
  </div>
</div>
            
          
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                                   

     


     <script>
  
        ClassicEditor
        .create( document.querySelector( '#upen<?=$code->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upar<?=$code->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upfr<?=$code->id; ?>' ) )
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
        title: 'Etes vous sur de bien vouloir supprimer ce code commercial?',
        text: 'l\' evenement sera supprimer ainsi que les informations attaché avec',
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