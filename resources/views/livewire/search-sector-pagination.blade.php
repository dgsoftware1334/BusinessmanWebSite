<div>
<div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Rechercher</label>
  
    <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
  </div>


<br><br>
<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Libellé</th>
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
                      @if($row->id != 40)
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
                      @else
                      <td></td>
                      @endif
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
                {{$secteurs->links('pagination::bootstrap-4')}}       
</div>
