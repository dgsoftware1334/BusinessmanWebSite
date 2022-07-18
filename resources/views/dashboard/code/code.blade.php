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
                        <label>Description (fr)<span style="color:red">*</span></label>
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
                        <textarea class="form-control" rows="3" placeholder="Give a description" name="description_en" id="en"></textarea>
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



 <!-------------------------------------------------------------------->
 @livewire('search-code-pagination')









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