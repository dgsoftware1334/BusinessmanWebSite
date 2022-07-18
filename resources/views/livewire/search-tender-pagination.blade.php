<div>
<div class="animated fadeInUp infinite" alt="Transparent MDB Logo" >      
     <div class="card card-primary card-outline">
        <div class="card-body">
         <div class="container">
         <div class="row">
         <div class="form-group col-lg-9 mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Rechercher</label>
  
    <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
  </div>
  <div class="col-lg-1 ">
   <a  class="btn btn-block btn-outline-info" href="{{ url('admin/tender/create') }}">
   <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/></button>
</a>

</div></div>
<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item1">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">tous</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">En cours</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">expiré</a>
</li>
</ul>


</div>


<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                   
                      <th>Intitulé</th>
                      <th>Description</th>
                      <th>Société</th>
                      <th>Sacteur d'activité</th>
                      <th>Public/Privé</th>
                      <th>Etat</th>
                      <th>Document</th>
                     
                      <th style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($tenders as $tender)
                    <tr>
                   
                      <td>{{$tender->intitule}}</td>
                      <td>{!! Str::limit($tender->description, 100) !!}...</td>
                     <td>{{$tender->societe}}</td>
                     <td>{{$tender->secteur->libelle}}</td>
                     <td>
                       @if($tender->genre ==1)
                          public
                       @else
                       privé
                       @endif
                     </td>
                   <?php  $mytime = Carbon\Carbon::now();?>
                   <td>
                     @if($tender->date_limite <= $mytime)
                     <?php $tender->etat=0?>
                     <span class="badge badge-danger">expiré</span>
                     @else
                     <span class="badge badge-success">En cours</span>
                     @endif
                   </td>
                     <td>
                    @if(is_null($tender->doc))
                     vide
                         @endif
                     @if(!is_null($tender->doc))
                     <a href=" {{url('admin/tender/download',$tender->doc)}}"><i class="fas fa-download"></i></a>

                         @endif
                     
                      
                   </td>
                  
            
                     <td >

                     
                     
                      <!---edit user-->
                       <a  href="{{ url('admin/tender/edit', $tender->id) }}">
                      <i class="fas fa-user-edit" style="color: blue"></i></a>&ensp; 

                      <!--read user-->
                         <a  href="{{ url('admin/tender/show', $tender->id) }}">
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 
                          </a>
                       <!--delete user-->
                    <a href="{{url('admin/tender/delete',$tender->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
&ensp; 

                        
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
                   
                      <th>Intitlé</th>
                      <th>Description</th>
                      <th>Société</th>
                      <th>Sacteur d'activité</th>
                      <th>Public/Privé</th>
                      <th>Etat</th>
                      <th>Document</th>
                     
                      <th style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($tenders as $tender)
                     @if($tender->etat ==1)
                    <tr>
                   
                      <td>{{$tender->intitule}}</td>
                      <td>{!! Str::limit($tender->description, 100) !!}...</td>
                     <td>{{$tender->societe}}</td>
                     <td>{{$tender->secteur->libelle}}</td>
                     <td>
                       @if($tender->genre ==1)
                          public
                       @else
                       privé
                       @endif
                     </td>
                   <?php  $mytime = Carbon\Carbon::now();?>
                   <td>
                     @if($tender->date_limite <= $mytime)
                     <?php $tender->etat=0?>
                     <span class="badge badge-danger">expiré</span>
                     @else
                     <span class="badge badge-success">En cours</span>
                     @endif
                   </td>
                     <td>
                    @if(is_null($tender->doc))
                     vide
                         @endif
                     @if(!is_null($tender->doc))
                     <a href=" {{url('admin/tender/download',$tender->doc)}}"><i class="fas fa-download"></i></a>

                         @endif
                     
                      
                   </td>
                  
            
                     <td >

                     
                     
                      <!---edit user-->
                       <a  href="">
                      <i class="fas fa-user-edit" style="color: blue"></i></a>&ensp; 

                      <!--read user-->
                         <a  href="">
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 
                          </a>
                       <!--delete user-->
                    <a href="{{url('admin/tender/delete',$tender->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
&ensp; 
        
    
                        
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
                   
                      <th>Intitlé</th>
                      <th>Description</th>
                      <th>Société</th>
                      <th>Sacteur d'activité</th>
                      <th>Public/Privé</th>
                      <th>Etat</th>
                      <th>Document</th>
                     
                      <th style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($tenders as $tender)
                     @if($tender->etat ==0)
                    <tr>
                   
                      <td>{{$tender->intitule}}</td>
                      <td>{!! Str::limit($tender->description, 100) !!}...</td>
                     <td>{{$tender->societe}}</td>
                     <td>{{$tender->secteur->libelle}}</td>
                     <td>
                       @if($tender->genre ==1)
                          public
                       @else
                       privé
                       @endif
                     </td>
                  
                   <td>
                     @if($tender->etat == 0)
                    
                     <span class="badge badge-danger">expiré</span>
                     @else
                     <span class="badge badge-success">En cours</span>
                     @endif
                   </td>
                     <td>
                    @if(is_null($tender->doc))
                     vide
                         @endif
                     @if(!is_null($tender->doc))
                     <a href=" {{url('admin/tender/download',$tender->doc)}}"><i class="fas fa-download"></i></a>

                         @endif
                     
                      
                   </td>
                  
            
                     <td >

                     
                     
                      <!---edit user-->
                       <a  href="">
                      <i class="fas fa-user-edit" style="color: blue"></i></a>&ensp; 

                      <!--read user-->
                         <a  href="">
                      <i class="fas fa-folder" style="color :green"></i>&ensp; 
                          </a>
                       <!--delete user-->
                    <a href="{{url('admin/tender/delete',$tender->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
&ensp; 

                        
                     </td>
                   </tr>
               
                    @endif
                    @endforeach
                    
                  </tbody>
                </table>
</div>
</div>
{{$tenders->links('pagination::bootstrap-4')}}
</div>
</div>
</div>

              </div>
     </div>
</div>
  
</div>
</div>
