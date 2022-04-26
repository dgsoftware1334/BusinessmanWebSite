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
            <h1 class="m-0">commentaire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">commentaire</a></li>
              <li class="breadcrumb-item active">publication</li>
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

@if(session('deactive'))
<div class="alert alert-danger">
 {{ session('deactive') }}
</div>
@endif
@if(session('active'))
<div class="alert alert-success">
 {{ session('active') }}
</div>
@endif
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
<li class="nav-item1">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Publie</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Prive</a>
</li>
</ul>


</div>


<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      
                    
                      <th>Homme d'affaire</th>
                      <th>Commentaire</th>
                      <th >Etat</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
             @foreach ($publications->users as $row)
                    <tr>
                      
                        <td>{{$row->name}} </td>
                       <td>
                       
                        {{$row->pivot->contenu}}
                      </td>

                      <td>
                        @if($row->pivot->is_valide == 0 )
                      
                           <span class="badge badge-danger">déactive</span>
                        @endif
                         @if($row->pivot->is_valide == 1 )
                   
                        <span class="badge badge-success">active</span>
                        @endif
                       </td>                   
                       <td>
                    
                       <!--delete user-->
                      <a  href="{{ route('admin.delete_commentair',[$row->pivot->id,$row->pivot->publication_id,$row->pivot->user_id]) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp; 

                      @if($row->pivot->is_valide == '1')
                       <a   href="{{ route('admin.active.deactive',[$row->pivot->publication_id,$row->pivot->user_id,$row->pivot->id]) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>
                       @endif
                       <!--active-->
                        @if($row->pivot->is_valide == '0')
                         <a  href="{{ route('admin.active.active',[$row->pivot->publication_id,$row->pivot->user_id,$row->pivot->id]) }}"> <i class="fas fa-check-circle"></i></a>
                         @endif

                     </td>
                   </tr>


   
 
                   @endforeach
              </tr>
             
                    
                    
                    
                  </tbody>
                </table>

    


</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

              </div>
              <!-- edit publication--->
 
</div>
</div>
</div>
</div>

              </div>
     </div>
</div>
  
</div>








  <!-- /.content-wrapper -->
@endsection