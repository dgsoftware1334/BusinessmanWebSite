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
            <h1 class="m-0">Publication</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Publication</a></li>
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
<div class="col-lg-1 ">
  <a  class="btn btn-block btn-outline-info" href="{{ url('admin/publication/create') }}">
<img src="https://img.icons8.com/windows/32/000000/add-property.png"/>
</a>

  

</div>

<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Image</th>
                      <th>Context</th>
                      <th>contenu</th>
                      <th>Etat</th>
                      
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
             @foreach ($publications as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>
                        @if(is_null($row->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($row->image))
                        <img src="{{ asset('assests/images/poblication/'.$row->image)  }}"  width="100" style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                         @endif
                      </td>
                      <td>{{$row->context}}</td>

                     <td>
                      {{$row->contenu}}
                   </td>

                     <td>
                     @if($row->status == '0')
                      <span class="badge badge-danger">prive</span>
                      @elseif($row->status == '1')
                       <span class="badge badge-success">publique</span>
                     @endif

                     </td>
                     <td>

                     
                     
                      <!---edit user-->
                      <a href="" data-toggle="modal" data-target="#modal-default{{$row->id}}">
                      <i class="fas fa-edit" style="color: blue"></i></a>&ensp; 

                     

                      <!--read user-->
                        <a  href="{{ url('admin/publication/show', $row->id) }}">
                      <i class="fas fa-comment" style="color :green"></i>&ensp; </a>

                       <!--delete user-->
                      <a  href="{{ url('admin/publication/delete', $row->id) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp; 
                      <!--deactive-->
                    <!--deactive-->
                       @if($row->status == 1)
                     <a   href="{{ route('admin.deactive_publication',[$row->id]) }}"> <i class="fas fa-ban" style="color: orange"></i> </a>
                       @endif
                       <!--active-->
                        @if($row->status == 0)
                        <a  href="{{ route('admin.active_publication',[$row->id]) }}"> <i class="fas fa-check-circle"></i></a>
                         @endif


                     </td>
                   </tr>


   <div class="modal fade" id="modal-default{{$row->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #4682B4;">
              <h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; Modifie publication</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
 <form class="form-horizontal" method="POST" action="{{ route('admin.edite_publication',[$row->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Context</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Context" name="context" value="{{$row->context}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Contenu</label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Enter ..."value="{{$row->contenu}}">{{$row->contenu}}</textarea>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-3 col-form-label" name="image">Image</label>
                    <div class="input-group col-sm-9">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" >
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
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
               
              </form>



            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                   @endforeach
              </tr>
             
                    
                    
                    
                  </tbody>
                </table>


  <div class="pagination-area d-flex flex-wrap justify-content-center">
                 @if ($publications->lastPage() > 1)

                            <ul class="pagination d-flex flex-wrap m-0">
                              <li class="prev"> <a ref="{{ $publications->url(1) }}" class="{{ ($publications->currentPage() == 1) ? ' disabled' : '' }} page-link" aria-label="Previous">
                                <span>« Précédent</span></a></li>
                              @for ($i = 1; $i <= $publications->lastPage(); $i++)
                              <li class="{{ ($publications->currentPage() == $i) ? ' active' : '' }} page-item">
                                   <a href="{{ $publications->url($i) }}" class="page-link">{{ $i }}</a>
                              </li>
                              @endfor
                              
                              <li class="dot">....</li>
                             
                              <li  class="{{ ($publications->currentPage() == $publications->lastPage()) ? ' disabled' : '' }} page-item"> <a href="{{ $publications->url($publications->currentPage()+1) }}" class="page-link" aria-label="Next"><span>Suivant »</span></a></li>
                            </ul>
                   @endif
                        </div>
    


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