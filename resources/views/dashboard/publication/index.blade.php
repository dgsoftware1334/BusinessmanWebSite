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
            <h1 class="m-0">Les publication</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Les publication</a></li>
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
                        <img src="{{ asset('assests/images/poblication/'.$row->image)  }}"  width="100" style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px">
                         @endif
                      </td>
                      <td>{{$row->context}}</td>

                     <td>
                      {!!$row->contenu!!}
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
                      <a href="" data-toggle="modal" data-target="#edit{{$row->id}}">
                      <i class="fas fa-edit" style="color: blue"></i></a>&ensp; 

                   <a href="{{ url('publication/visiteur', $row->id)}}"  class="cata-icon" target="_blank"> <i class="fas fa-folder" style="color :green"></i>&ensp;</a>
       
                        <a  data-toggle="modal" ></i></a>&ensp; 

                      <!--read user-->
                        <a  href="{{ url('admin/publication/show', $row->id) }}">
                      <i class="fas fa-comment" style="color :green"></i>&ensp; </a>

                       <!--delete user-->
                       <a href="" data-toggle="modal" data-target="#delete{{$row->id}}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp; 
                      <!--deactive-->
                    <!--deactive-->
                       @if($row->status == 0)
                     <a   href="{{ route('admin.deactive_publication',[$row->id]) }}"> 
                      <i class="fas fa-check-circle"></i>

                     </a>
                       @endif
                       <!--active-->
                        @if($row->status == 1)
                        <a  href="{{ route('admin.active_publication',[$row->id]) }}">
                           <i class="fas fa-ban" style="color: orange"></i> 
                        </a>
                         @endif


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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Information du secteur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{ route('admin.edite_publication',[$row->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le sujet<span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer le contexte en (fr)" name="context"  value="{{$row->getTranslation('context', 'fr')}}"  class="@error('context') is-invalid @enderror">
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                      <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >الموضوع</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اكتب الموضوع باللغة العربية" name="context_ar"  value="{{$row->getTranslation('context', 'ar')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >The subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Write the context in english" name="context_en"  value="{{$row->getTranslation('context', 'en')}}">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Le contenu<span style="color:red">*</span></label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Entrer le contenu de votre article"  class="@error('contenu') is-invalid @enderror" id="upfr<?=$row->id; ?>" > {{$row->getTranslation('contenu', 'fr')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="اكتب المحتوى بالعربي ..." id="upar<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'ar')}}</textarea>
                       @error('contenu')
                      <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">The content</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Write the content in english ..." id="upen<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'en')}}</textarea>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Image</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"  class="@error('image') is-invalid @enderror">
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
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
                <form action="{{ route('admin.delete_publication')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="libelle"  value="{{ $row->context }}" disabled  >

                        
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
              </tr>
             
                    
                    
                    
                  </tbody>
                </table>



</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

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
             @if($row->status == 1)
                   <tr>
                      <td>{{$row->id}}</td>
                      <td>
                        @if(is_null($row->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($row->image))
                        <img src="{{ asset('assests/images/poblication/'.$row->image)  }}"  width="100" style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px">
                         @endif
                      </td>
                      <td>{{$row->context}}</td>

                     <td>
                      {!!$row->contenu!!}
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
                      <!--a href="" data-toggle="modal" data-target="#edit{{$row->id}}">
                      <i class="fas fa-edit" style="color: blue"></i></a!-->&ensp; 

                   <a href="{{ url('publication/visiteur', $row->id)}}"  class="cata-icon" target="_blank"> <i class="fas fa-folder" style="color :green"></i>&ensp;</a>
       
                        <a  data-toggle="modal" ></i></a>&ensp; 

                      <!--read user-->
                        <a  href="{{ url('admin/publication/show', $row->id) }}">
                      <i class="fas fa-comment" style="color :green"></i>&ensp; </a>

                       <!--delete user-->
                       <!--a href="" data-toggle="modal" data-target="#delete{{$row->id}}"> <i class="far fa-trash-alt" style="color: red"></i></a-->&ensp; 
                      <!--deactive-->
                    <!--deactive-->
                       @if($row->status == 0)
                     <a   href="{{ route('admin.deactive_publication',[$row->id]) }}"> 
                      <i class="fas fa-check-circle"></i>

                     </a>
                       @endif
                       <!--active-->
                        @if($row->status == 1)
                        <a  href="{{ route('admin.active_publication',[$row->id]) }}">
                           <i class="fas fa-ban" style="color: orange"></i> 
                        </a>
                         @endif


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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Information du secteur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{ route('admin.edite_publication',[$row->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le sujet<span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer le contexte en (fr)" name="context"  value="{{$row->getTranslation('context', 'fr')}}"  class="@error('context') is-invalid @enderror">
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                      <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >الموضوع</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اكتب الموضوع باللغة العربية" name="context_ar"  value="{{$row->getTranslation('context', 'ar')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >The subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Write the context in english" name="context_en"  value="{{$row->getTranslation('context', 'en')}}">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Le contenu<span style="color:red">*</span></label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Entrer le contenu de votre article"  class="@error('contenu') is-invalid @enderror" id="upfr<?=$row->id; ?>" > {{$row->getTranslation('contenu', 'fr')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="اكتب المحتوى بالعربي ..." id="upar<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'ar')}}</textarea>
                       @error('contenu')
                      <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">The content</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Write the content in english ..." id="upen<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'en')}}</textarea>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Image</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"  class="@error('image') is-invalid @enderror">
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
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
                <form action="{{ route('admin.delete_publication')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="libelle"  value="{{ $row->context }}" disabled  >

                        
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

                   @endif
                   @endforeach
              </tr>
             
                    
                    
                    
                  </tbody>
                </table>




</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">



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
             @if($row->status == 0)
                   <tr>
                      <td>{{$row->id}}</td>
                      <td>
                        @if(is_null($row->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($row->image))
                        <img src="{{ asset('assests/images/poblication/'.$row->image)  }}"  width="100" style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px">
                         @endif
                      </td>
                      <td>{{$row->context}}</td>

                     <td>
                      {!!$row->contenu!!}
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
                      <!--a href="" data-toggle="modal" data-target="#edit{{$row->id}}">
                      <i class="fas fa-edit" style="color: blue"></i></a!-->&ensp; 

                   <a href="{{ url('publication/visiteur', $row->id)}}"  class="cata-icon" target="_blank"> <i class="fas fa-folder" style="color :green"></i>&ensp;</a>
       
                        <a  data-toggle="modal" ></i></a>&ensp; 

                      <!--read user-->
                        <a  href="{{ url('admin/publication/show', $row->id) }}">
                      <i class="fas fa-comment" style="color :green"></i>&ensp; </a>

                       <!--delete user-->
                       <!--a href="" data-toggle="modal" data-target="#delete{{$row->id}}"> <i class="far fa-trash-alt" style="color: red"></i></a!-->&ensp; 
                      <!--deactive-->
                    <!--deactive-->
                       @if($row->status == 0)
                     <a   href="{{ route('admin.deactive_publication',[$row->id]) }}"> 
                      <i class="fas fa-check-circle"></i>

                     </a>
                       @endif
                       <!--active-->
                        @if($row->status == 1)
                        <a  href="{{ route('admin.active_publication',[$row->id]) }}">
                           <i class="fas fa-ban" style="color: orange"></i> 
                        </a>
                         @endif


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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Information du secteur</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{ route('admin.edite_publication',[$row->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le sujet<span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Entrer le contexte en (fr)" name="context"  value="{{$row->getTranslation('context', 'fr')}}"  class="@error('context') is-invalid @enderror">
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
                      <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >الموضوع</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اكتب الموضوع باللغة العربية" name="context_ar"  value="{{$row->getTranslation('context', 'ar')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >The subject</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Write the context in english" name="context_en"  value="{{$row->getTranslation('context', 'en')}}">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Le contenu<span style="color:red">*</span></label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Entrer le contenu de votre article"  class="@error('contenu') is-invalid @enderror" id="upfr<?=$row->id; ?>" > {{$row->getTranslation('contenu', 'fr')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="اكتب المحتوى بالعربي ..." id="upar<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'ar')}}</textarea>
                       @error('contenu')
                      <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">The content</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="contenu" placeholder="Write the content in english ..." id="upen<?=$row->id; ?>"> {{$row->getTranslation('contenu', 'en')}}</textarea>

                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Image</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image"  class="@error('image') is-invalid @enderror">
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      @error('context')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
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
                <form action="{{ route('admin.delete_publication')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="libelle"  value="{{ $row->context }}" disabled  >

                        
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

                   @endif
                   @endforeach
              </tr>
             
                    
                    
                    
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