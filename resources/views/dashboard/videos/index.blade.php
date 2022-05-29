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
            <h1 class="m-0">La liste des vidéos publicitaires</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">La liste des vidéos publicitaires</a></li>
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
   <a  class="btn btn-block btn-outline-info" href="{{ route('admin.video.create')}}">
   <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/></button>
</a>

</div>

<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Vidéo</th>
                      <th>Titre</th>
                      <th>Description</th>
                      <th>catégorie</th>
                      <th>Date d'expiration</th>
                     
                      <th>Afficher/Enlever de l'accueil</th>
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($videos as $video)
                     
                    <tr>
                   
                      <td>
                          
                          
                      <video width="320" height="240" controls>
                                 <source src="{{URL::asset("/assests/images/videos/$video->video")}}" type="video/mp4">
                                          Your browser does not support the video tag.
                                </video>
                          
                      </td>
                      <td>{{$video->title}}</td>
                     <td>{!! Str::limit($video->description, 100) !!}</td>
                     <td>{{$video->categorie}}</td>
                     <td>
                     {{$video->date_expiration}}
                     </td>
                       <td>
                         @if($video->show ==0)
                         <a href="{{ url('admin/video/autorize', $video->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> &nbsp;Afficher</a>
                         @else
                         <a href="{{ url('admin/video/inautorize', $video->id) }}" class="btn btn-warning"><i class="fa-solid fa-eye-slash"></i> &nbsp;Enlever</a>
                         @endif
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

              </div>
     </div>
</div>
  
</div>

<script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title: 'Etes vous sur de bien vouloir supprimer cet homme d affaire?',
        text: 'L homme d affaire sera supprimer ainsi que les informations attaché avec',
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