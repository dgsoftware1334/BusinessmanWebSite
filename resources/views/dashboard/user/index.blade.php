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
            <h1 class="m-0">homme d'affaire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">homme d'affaire</a></li>
              <li class="breadcrumb-item active">accueil</li>
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
<li class="nav-item1">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">active</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">desactive</a>
</li>
</ul>


</div>
<div class="col-lg-1 ">
  <button type="button" class="btn btn-block btn-outline-info" ><img src="https://img.icons8.com/dotty/33/000000/add-administrator.png"/></button>

</div>

<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nom complet</th>
                      <th>Date de naissance</th>
                      <th>Email</th>
                      <th>Sacteur d'activité</th>
                      <th>Etat</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name }}&ensp;{{$row->lastname}}</td>
                      <td>{{$row->datenaissance }}</td>
                     <td>{{$row->email }}</td>
                     <td>
                       <!--  @if(is_null(true))
                         @endif
                       -->
                       vide
                   </td>
                     <td>
                     @if($row->status == '1')
                      <span class="badge badge-danger">Déactive</span>
                      @elseif($row->status == '0')
                       <span class="badge badge-success">Active</span>
                     @endif

                     </td>
                     <td>

                     
                     
                      <!---edit user-->
                      <i class="fas fa-user-edit" style="color: blue"></i>&ensp; 

                      <!--read user-->
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 

                       <!--delete user-->
                      <i class="far fa-trash-alt" style="color: red"></i>&ensp; 
                      <!--deactive-->
                       @if($row->status == '0')
                       <a  href="{{ url('admin/user/desactive', $row->id) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>
                       @endif
                       <!--active-->
                        @if($row->status == '1')
                        <a  href="{{ url('admin/user/active', $row->id) }}"> <i class="fas fa-check-circle"></i></a>
                         @endif
                     </td>
                   </tr>
                    @endforeach
                    
                    
                    
                  </tbody>
                </table>

</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nom complet</th>
                      <th>Date de naissance</th>
                      <th>Email</th>
                      <th>Sacteur d'activité</th>
                      <th>Etat</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $row)
                       @if($row->status == '0')
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name }}&ensp;{{$row->lastname}}</td>
                      <td>{{$row->datenaissance }}</td>
                     <td>{{$row->email }}</td>
                     <td>
                       <!--  @if(is_null(true))
                         @endif
                       -->
                       vide
                   </td>
                     <td>
                     
                       <span class="badge badge-success">Active</span>
                    

                     </td>
                     <td>

                     
                     
                      <!---edit user-->
                      <i class="fas fa-user-edit" style="color: blue"></i>&ensp; 

                      <!--read user-->
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 

                       <!--delete user-->
                      <i class="far fa-trash-alt" style="color: red"></i>&ensp; 
                      <!--deactive-->
                      <a  href="{{ url('admin/user/desactive', $row->id) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>

                      <!--active-->
                      
                     <!--deactive-->
                       @if($row->status == '0')
                       <a  href="{{ url('admin/user/desactive', $row->id) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>
                       @endif
                       <!--active-->
                        @if($row->status == '1')
                        <a  href="{{ url('admin/user/active', $row->id) }}"> <i class="fas fa-check-circle"></i></a>
                         @endif
                      

                     </td>
                   </tr>
                    @endif
                    @endforeach
                    
                    
                    
                  </tbody>
                </table>

</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nom complet</th>
                      <th>Date de naissance</th>
                      <th>Email</th>
                      <th>Sacteur d'activité</th>
                      <th>Etat</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $row)
                       @if($row->status == '1')
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->name }}&ensp;{{$row->lastname}}</td>
                      <td>{{$row->datenaissance }}</td>
                     <td>{{$row->email }}</td>
                     <td>
                       <!--  @if(is_null(true))
                         @endif
                       -->
                       vide
                   </td>
                     <td>
                     
                       <span class="badge badge-danger">Déactive</span>
                    

                     </td>
                     <td>

                     
                     
                      <!---edit user-->
                      <i class="fas fa-user-edit" style="color: blue"></i>&ensp; 

                      <!--read user-->
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 

                       <!--delete user-->
                      <i class="far fa-trash-alt" style="color: red"></i>&ensp; 
                     

                     <!--deactive-->
                       @if($row->status == '0')
                       <a  href="{{ url('admin/user/desactive', $row->id) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>
                       @endif
                       <!--active-->
                        @if($row->status == '1')
                        <a  href="{{ url('admin/user/active', $row->id) }}"> <i class="fas fa-check-circle"></i></a>
                         @endif

                     </td>
                   </tr>
                    @endif
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
    
  <!-- /.content-wrapper -->
@endsection