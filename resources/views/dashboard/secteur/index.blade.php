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
            @error('libelle')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
@error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Les secteurs d'activité</a></li>
             
              
              <li class="breadcrumb-item active">accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  
                <h3 class="card-title">Responsive Hover Table</h3>
               

                <div class="card-tools">
                
                <div class="card-body">
                       <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                              Ajouter un secteur
                        </button>
                </div>
                  <div class="input-group input-group-sm" style="width: 150px;">
                  
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ajouter un secteur d'activité</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Information du secteur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Le libellé du secteur</label>
                        <input type="text" class="form-control" name="libelle" placeholder="Enter ..." class="@error('libelle') is-invalid @enderror"  >
                        
                        
                       
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Libelle en arabe</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_ar" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Libelle en anglais</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_en" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description du secteur</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"  class="@error('description') is-invalid @enderror" ></textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Description en arabe</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_ar" ></textarea>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Description en anglais</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_en" ></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="">Ajouter une image</label>
                            <input type="file" name="image"  class="course form-control">
                        </div>
                  </div>

                  <!-- input states -->
                 
                 

                

                 
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
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
                      <td>{{$row->description}}</td>
                      <td>

                     
                     



              
                       <button type="button" class="btn btn-default" data-toggle="modal" data-target="#edit{{$row->id}}">
                       <i class="far fa-edit" style="color: blue"></i>
                        </button>
                        <!--read secteur-->
                        <a href="{{url('/secteur',$row->id)}}"  target="_blank">
                       <i class="fas fa-folder" style="color :green" target="_blank"></i>&ensp; 
                       </a>

                         <!--delete secteur-->
                         <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete{{$row->id}}">
                         <i class="far fa-trash-alt" style="color: red"></i>
                        </button>
                     
                       <!--deactive-->

                      </td>
                    </tr>




      <!------------------------------------------update modal------------------------------------->
      <div class="modal fade" id="edit{{$row->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier le secteur d'activité</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Information du secteur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{ route('admin.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Le libellé du secteur</label>
                        <input type="text" class="form-control" name="libelle" placeholder="Enter ..." class="@error('libelle') is-invalid @enderror" value="{{$row->getTranslation('libelle', 'fr')}}" >
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                        
                       
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Libelle en arabe</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_ar" value="{{$row->getTranslation('libelle', 'ar')}}" >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Libelle en anglais</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="libelle_en" value="{{$row->getTranslation('libelle', 'en')}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description du secteur</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description"  class="@error('description') is-invalid @enderror" >{{$row->getTranslation('description', 'fr')}}</textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Description en arabe</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_ar" >{{$row->getTranslation('description', 'ar')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Description en anglais</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_en" >{{$row->getTranslation('description', 'en')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="">Ajouter une image</label>
                            <input type="file" name="image"  class="course form-control" value="{{ $row->image }}">
                        </div>
                  </div>

                  <!-- input states -->
                 
                 

                

                 
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
                <form action="{{ route('admin.destroy')}}" method="POST" >
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



                      
                    
              @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
       
        </div>

         </div>

  <!-- /.content-wrapper -->
@endsection