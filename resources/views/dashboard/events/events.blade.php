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
            <h1 class="m-0">Les événements</h1>
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
              <li class="breadcrumb-item"><a href="#">Les événements</a></li>
              <li class="breadcrumb-item active">accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

 <div class="animated fadeInUp infinite" alt="Transparent MDB Logo" >      
     <div class="card card-primary card-outline">
        <div class="card-body">
         <div class="container">
<!--------------------------------------ici se trouve les tables des evenement --------------------->
<livewire:search-event-pagination /> 
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
        title: 'Etes vous sur de bien vouloir supprimer l\' evenement?',
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