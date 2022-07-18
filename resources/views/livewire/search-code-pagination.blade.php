<div>
<div class="row">
<div class="form-group col-lg-9 mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Rechercher</label>
  
    <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
  </div>
  <div class="col-lg-1 ">
     <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                    <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/>
                        </button>

</div></div>
<br><br>
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
                        <label>Description (fr)<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Donner une description sur l'evenement..." name="description"  class="@error('description') is-invalid @enderror" id="upfr<?=$code->id; ?>">{{$code->getTranslation('description', 'fr')}}</textarea>
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>اوصف</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_ar" id="upar<?=$code->id; ?>">{{$code->getTranslation('description', 'ar')}}</textarea>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>The description</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_en" id="upen<?=$code->id; ?>">{{$code->getTranslation('description', 'en')}}</textarea>
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
    <p class="card-text"> {!!$code->description!!}</p>
  
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


                {{$codes->links('pagination::bootstrap-4')}}


</div>
