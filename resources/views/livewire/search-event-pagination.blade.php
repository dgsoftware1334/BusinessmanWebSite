<div>
<div class="row">
<div class="form-group col-lg-8 mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Rechercher</label>
  
    <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
  </div>
  <div class="col-lg-1 ">
     <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                    <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/>
                        </button>

</div>
</div>
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


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg" style="width: 800px">
          <div class="modal-content" style="width: 800px">
            <div class="modal-header"  style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" >&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
&ensp; &ensp; 
&ensp; &ensp; &ensp;&ensp; &ensp; &ensp;Ajouter un événement</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:800px">

              
            <!-- general form elements disabled -->
             <form action="{{ route('admin.createEven')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr class="solid">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Sujet (fr)<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="sujet" placeholder="Entrer le sujet de cet evenement" class="@error('libelle') is-invalid @enderror"  >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description (fr)<span style="color:red">*</span></label>
                        <textarea class="form-control" rows="3" placeholder="Donner une description sur l'evenement..." name="description"  class="@error('description') is-invalid @enderror" id="fr"></textarea>
                        
                      </div>
                    </div></div>
                    <hr class="solid">
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>الموضوع</label>
                        <input type="text" class="form-control" placeholder="اكتب الموضوع ..." name="sujet_ar" >
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>اوصف</label>
                        <textarea class="form-control" rows="3" placeholder="اوصف الحدث ..." name="description_ar" id="ar"></textarea>
                      </div>
                    </div></div>

                   
                    <hr class="solid">
                  <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                        <label>Subject (en)</label>
                        <input type="text" class="form-control" placeholder="Enter the subject ..." name="sujet_en" >
                      </div>
                    </div>
                  <hr/>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description (en)</label>
                        <textarea class="form-control" rows="3" placeholder="Enter the description ..." name="description_en" id="en"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Date de debut<span style="color:red">*</span></label>
                        <input type="date" class="form-control" name="date_debut" placeholder="Enter ..."  >
                        
                        
                       
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                      <label>Date de fin<span style="color:red">*</span></label>
                        <input type="date" class="form-control" name="date_fin" placeholder="Enter ..."  >
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Duré <span style="color:red">*</span></label>
                        <input type="text" class="form-control" placeholder="Entrer la duré de l'evenement ..." name="dure" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">  
                            <label class="col-sm-4 control-label"><input type="radio" onclick="javascript:yesnoCheck();" name="type" id="yesCheck" value="1"/> <b>En ligne </b></label>&ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp;
                            <label class="col-sm-4 control-label"><input type="radio" onclick="javascript:yesnoCheck();" name="type" id="noCheck" value="0"/> <b>Présentiel</b></label>
                 <div id="ifYes" style="visibility:hidden">
                        Lien: <input type='text'  class="form-control"placeholder="Entrer le lien vers l'evenement ..." id='ifYes' name='lien'><br>
        
                  </div>
        
                 <div id="ifNo" style="visibility:hidden">
                        lieu: <input type='text'  class="form-control"placeholder="Entrer le lieu de l'evenement ..."  id='ifNo' name='lieu'><br>
        
                  </div> 
                      </div>
                    </div> </div>
                 


                  
                  <div class="row">
                    <div class="col-sm-6">
                            <label for="">Ajouter une image<span style="color:red">*</span></label>
                            <input type="file" name="image"  class="course form-control">
                        </div>
                  </div>
                  </div>
                
                  <!-- input states -->
                 
  
                 

                

                 
                  <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary" name="submit">Valider</button>
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



 <table  class="table table-bordered">
                  <thead>
                    <tr>
                    <th>Image</th>
                      <th>Description</th>
                      <th>Date de debut</th>
                      <th>Date de fin</th>
                      <th>Duré</th>
                      <th>Type</th>
                      <th>Adress/Lien</th>

                      <th>Etat</th>
                      <th style="width:20%;">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($events as $event)
                    <tr>
                    <td>
                      
                        @if(is_null($event->image))
                         ( Image n'existe )
                         {{$event->sujet}} 
                         @endif
                         @if(!is_null($event->image))
                        <img src="{{ asset('assests/images/events/'.$event->image)}}"   style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px ">
                        <br>{{$event->sujet}}
                         @endif
                      </td>
                      <td>
                      {!! Str::limit($event->description, 100) !!}</td>
                      <td>{{$event->date_debut}}</td>
                      <td>{{$event->date_fin}}</td>
                      <td>{{$event->dure}}</td>
                      <td>
                        @if($event->type == 0)
                        presentail
                       @else
                        en ligne
                        @endif
                      </td>
                      <td>
                        @if(is_null($event->lien))
                        {{$event->lieu}}
                        @endif
                        @if(is_null($event->lieu))
                        {{$event->lien}}
                        @endif
                      </td>
                      <td>
                         
                     @if($event->status == '0')
                      <span class="badge badge-danger">prive</span>
                      @elseif($event->status == '1')
                       <span class="badge badge-success">publique</span>
                     @endif

                     
                      </td>
                      
                      <td>

                     
                     
                   


              
                      <a data-toggle="modal" data-target="#edit{{$event->id}}">
                       <i class="far fa-edit" style="color: blue"></i>
                        </a>
                        <!--read secteur-->
                       <a href="{{url('/event',$event->id)}}">  <i class="far fa-folder" style="color: blue"></i></a>
                         <!--delete secteur-->
                         <a href="{{ url('admin/Event/supprimer', $event->id) }}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>

                     
                       <!--deactive-->
                         @if($event->status == 1)
                     <a   href="{{ route('admin.deactive_event',[$event->id]) }}"> 
                     
                            <i class="fas fa-ban" style="color: orange"></i> 
                     </a>
                       @endif
                       <!--active-->
                        @if($event->status == 0)
                        <a  href="{{ route('admin.active_event',[$event->id]) }}">
                           
                            <i class="fas fa-check-circle"></i>
                        </a>
                         @endif


                      </td>
                    </tr>


 
      <!------------------------------------------update modal------------------------------------->
          <div class="modal fade" id="edit{{$event->id}}">
        <div class="modal-dialog modal-lg" style="width:800px">
          <div class="modal-content" style="width:800px">
            <div class="modal-header" style="background-color: #4682B4;">
              <h4 class="modal-title" style="color: white">
             
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
              &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                Modifier l'evenement </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:800px">

              
            <!-- general form elements disabled -->
             <form action="{{ url('admin/updateEvent')}}" method="POST" enctype="multipart/form-data">
                @csrf
           
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Sujet (fr)</label>
                        <input type="text" class="form-control" name="sujet" placeholder="Enter ..." class="@error('sujet') is-invalid @enderror" value="{{$event->getTranslation('sujet', 'fr')}}">
                        
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $event->id }}">
                       
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Description (fr)</label>
                     
                        <textarea class="form-control" rows="3"   placeholder="Enter ..." name="description"  class="@error('description') is-invalid @enderror" id="upfr<?=$event->id; ?>">
                        
                        {{$event->getTranslation('description', 'fr')}}
                        
                        </textarea>
                        
                      </div>
                    </div>
                    </div>

                    
                 
                  <div class="row">
                  
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Sujet (ar)</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="sujet_ar" value="{{$event->getTranslation('sujet', 'ar')}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description(ar)</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_ar" id="upar<?=$event->id; ?>" >{{$event->getTranslation('description', 'ar')}}</textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Sujet (en)</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="sujet_en"  value="{{$event->getTranslation('sujet', 'en')}}">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description (en)</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." name="description_en" id="upen<?=$event->id; ?>">{{$event->getTranslation('description', 'en')}}</textarea>
                      </div>
                    </div>
                  
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Date de debut</label>
                        <input type="date" class="form-control" name="date_debut" placeholder="Enter ..." value="{{$event->date_debut}}" >
                        
                        
                       
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                      <label>Date de fin</label>
                        <input type="date" class="form-control" name="date_fin" placeholder="Enter ..."   value="{{$event->date_fin}}">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Duré</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="dure"  value="{{$event->dure}}" >
                      </div>
                    </div>
                  </div>
              

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">  
                            <label class="col-sm-4 control-label"><input type="radio" onclick="javascript:yesnoCheckupdate();" name="type" id="yesCheckup" value="1" @if(old('type')) checked @endif/> <b>En ligne </b></label>&ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp;
                            <label class="col-sm-4 control-label"><input type="radio" onclick="javascript:yesnoCheckupdate();" name="type" id="noCheckup"value="0" @if(!old('type')) checked @endif/> <b>Présentiel</b></label>
                 <div id="ifYes" style="visibility:hidden">
                        Lien: <input type='text'  class="form-control"placeholder="Entrer le lien vers l'evenement ..." id='ifYesup' name='lien' value="{{$event->lien}}"><br>
        
                  </div>
        
                 <div id="ifNo" style="visibility:hidden">
                        lieu: <input type='text'  class="form-control"placeholder="Entrer le lieu de l'evenement ..."  id='ifNoup' name='lieu' value="{{$event->lieu}}"><br>
        
                  </div> 
                      </div>
                    </div> </div>


                  
                    
                    <div class="col-sm-12">
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
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                                   

      <!------------------------------------------delete modal------------------------------------->
      <div class="modal fade" id="delete{{$event->id}}">
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
                <form action="{{ route('admin.destroyEvent')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="sujet"  value="{{ $event->sujet }}" disabled  >

                        
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $event->id }}">
                        
                       
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
        .create( document.querySelector( '#upen<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upar<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upfr<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
    
     
</script>


                
                
                  

                      
                    
              @endforeach

                  </tbody>
                </table>

                {{$events->links('pagination::bootstrap-4')}}












</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <table  class="table table-bordered">
                  <thead>
                    <tr>
                    <th>Image</th>
                      
                      <th>Description</th>
                      <th>Date de debut</th>
                      <th>Date de fin</th>
                      <th>Duré</th>
                      <th>Type</th>
                      <th>Adress/Lien</th>

                      <th>Etat</th>
                      <th style="width:20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($events as $event)
                  @if($event->status ==1)
                    <tr>
                    <td>
                        @if(is_null($event->image))
                         ( Image n'existe )
                         {{$event->sujet}} 
                         @endif
                         @if(!is_null($event->image))
                        <img src="{{ asset('assests/images/events/'.$event->image)}}"   style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px ">
                        <br>{{$event->sujet}}
                         @endif
                      </td>
                      <td>
                      {!! Str::limit($event->description, 100) !!}</td>
                      <td>{{$event->date_debut}}</td>
                      <td>{{$event->date_fin}}</td>
                      <td>{{$event->dure}}</td>
                      <td>
                        @if($event->type == 0)
                        presentail
                       @else
                        en ligne
                        @endif
                      </td>
                      <td>
                        @if(is_null($event->lien))
                        {{$event->lieu}}
                        @endif
                        @if(is_null($event->lieu))
                        {{$event->lien}}
                        @endif
                      </td>
                      <td>
                         
                     @if($event->status == '0')
                      <span class="badge badge-danger">prive</span>
                      @elseif($event->status == '1')
                       <span class="badge badge-success">publique</span>
                     @endif

                     
                      </td>
                      
                      <td>

                        <!--read secteur-->
                       <a href="{{url('/event',$event->id)}}">  <i class="far fa-folder" style="color: blue"></i></a>
                         <!--delete secteur-->
                        <a href="{{ url('admin/Event/supprimer', $event->id) }}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>

                     
                       <!--deactive-->
                         @if($event->status == 1)
                     <a   href="{{ route('admin.deactive_event',[$event->id]) }}"> 
                     
                            <i class="fas fa-ban" style="color: orange"></i> 
                     </a>
                       @endif
                       <!--active-->
                        @if($event->status == 0)
                        <a  href="{{ route('admin.active_event',[$event->id]) }}">
                           
                            <i class="fas fa-check-circle"></i>
                        </a>
                         @endif


                      </td>
                    </tr>


 
    
      <!------------------------------------------delete modal------------------------------------->
      <div class="modal fade" id="delete{{$event->id}}">
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
                <form action="{{ route('admin.destroyEvent')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="sujet"  value="{{ $event->sujet }}" disabled  >

                        
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $event->id }}">
                        
                       
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
        .create( document.querySelector( '#upen<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upar<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upfr<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
    
     
</script>


                
                
                  

              @endif
                    
              @endforeach

                  </tbody>
                </table>






</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

<table  class="table table-bordered">
                  <thead>
                    <tr>
                    <th>Image</th>
                     
                      <th>Description</th>
                      <th>Date de debut</th>
                      <th>Date de fin</th>
                      <th>Duré</th>
                      <th>Type</th>
                      <th>Adress/Lien</th>

                      <th>Etat</th>
                      <th style="width:20%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($events as $event)
                  @if($event->status ==0)
                    <tr>
                    <td>
                        @if(is_null($event->image))
                         ( Image n'existe )
                         {{$event->sujet}} 
                         @endif
                         @if(!is_null($event->image))
                        <img src="{{ asset('assests/images/events/'.$event->image)}}"   style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px ">
                        <br>{{$event->sujet}}
                         @endif
                      </td>
                      <td>
                      {!! Str::limit($event->description, 100) !!}</td>
                      <td>{{$event->date_debut}}</td>
                      <td>{{$event->date_fin}}</td>
                      <td>{{$event->dure}}</td>
                      <td>
                        @if($event->type == 0)
                        presentail
                       @else
                        en ligne
                        @endif
                      </td>
                      <td>
                        @if(is_null($event->lien))
                        {{$event->lieu}}
                        @endif
                        @if(is_null($event->lieu))
                        {{$event->lien}}
                        @endif
                      </td>
                      <td>
                         
                     @if($event->status == '0')
                      <span class="badge badge-danger">prive</span>
                      @elseif($event->status == '1')
                       <span class="badge badge-success">publique</span>
                     @endif

                     
                      </td>
                      
                      <td>

                     
                     



              
                       
                        <!--read secteur-->
                       <a href="{{url('/event',$event->id)}}">  <i class="far fa-folder" style="color: blue"></i></a>
                         <!--delete secteur-->
                          <a href="{{ url('admin/Event/supprimer', $event->id) }}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>

                                          
                       <!--deactive-->
                         @if($event->status == 1)
                     <a   href="{{ route('admin.deactive_event',[$event->id]) }}"> 
                     
                            <i class="fas fa-ban" style="color: orange"></i> 
                     </a>
                       @endif
                       <!--active-->
                        @if($event->status == 0)
                        <a  href="{{ route('admin.active_event',[$event->id]) }}">
                           
                            <i class="fas fa-check-circle"></i>
                        </a>
                         @endif


                      </td>
                    </tr>


 
                           

      <!------------------------------------------delete modal------------------------------------->
      <div class="modal fade" id="delete{{$event->id}}">
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
                <form action="{{ route('admin.destroyEvent')}}" method="POST" >
                {{method_field('Delete')}}
                @csrf
           
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <p>Etes vous sur de vouloir supprimer le secteur</p>
                        <input type="text" class="form-control" name="sujet"  value="{{ $event->sujet }}" disabled  >

                        
                        <input id="id" type="hidden" name="id" class="form-control"  value="{{ $event->id }}">
                        
                       
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
        .create( document.querySelector( '#upen<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upar<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#upfr<?=$event->id; ?>' ) )
        .catch( error => {
            console.error( error );
        } );
    
     
</script>


                
                
                  

                      
              @endif 
              @endforeach

                  </tbody>
                </table>





</div>
</div>
</div>
