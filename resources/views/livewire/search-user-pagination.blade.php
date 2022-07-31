<div>
<div class="row">

          <div class="form-group col-lg-8">
               <label for="inputPassword2" class="sr-only">Rechercher</label>
               <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
         </div>
         <div class="col-lg-1 ">
              <a  class="btn btn-block btn-outline-info" href="{{ url('admin/user/create') }}">
                  <img src="https://img.icons8.com/dotty/33/000000/add-administrator.png"/></button>
              </a>
          </div>
</div>
<!-- filtrage par activation email -->
<div class="row">
<div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  wire:model="etat" value="all" />
    <label class="form-check-label" for="flexRadioDefault1"> <b>Tous</b> </label>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"  wire:model="etat" value="actif"/>
    <label class="form-check-label" for="flexRadioDefault1"> <b>Email actif</b>  </label>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <!-- Default checked radio -->
  <div class="form-check">
    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"  wire:model="etat" value="desactif"/>
    <label class="form-check-label" for="flexRadioDefault2"> <b> Email desactif</b> </label>
  </div>
</div>
<!-- filtrage par accés à l'espace vip -->
<!-- Default unchecked -->
<div class="row">
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault11"  wire:model="vip" value="tous" />
        <label class="form-check-label" for="flexRadioDefault1"> <b>Tous</b> </label>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault11"  wire:model="vip" value="oui"/>
        <label class="form-check-label" for="flexRadioDefault1"> <b>Vip accessible</b>  </label>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <!-- Default checked radio -->
      <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault1" id="flexRadioDefault21"  wire:model="vip" value="non"/>
        <label class="form-check-label" for="flexRadioDefault2"> <b> Vip inaccessible</b> </label>
      </div>
    </div>


<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item1">
<a class="nav-link active" id="home-tab"S data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">tous</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">active</a>
</li>
<li class="nav-item1">
<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">desactive</a>
</li>
</ul>


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
                      <th>Fichier</th>
                      <th>Etat</th>
                      <th>Vip</th>
                      <th>Date de limite d'autorisation</th>
                      <th>Email verifié</th>
                      <th style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>


                     @foreach ($users as $row)


                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$row->name }}&ensp;{{$row->lastname}}</td>
                      <td>{{$row->datenaissance }}</td>
                     <td>{{$row->email }}</td>
                     <td>
                    @if(is_null($row->sacteur_id))
                     vide
                         @endif
                     @if(!is_null($row->sacteur_id))
                       {{ $row->secteur->libelle}}
                         @endif


                   </td>
                   <td>
                    @if(is_null($row->file))
                     vide
                         @endif
                     @if(!is_null($row->file))
                     <a href=" {{url('admin/download',$row->file)}}"><i class="fas fa-download"></i></a>

                         @endif


                   </td>
                     <td>
                     @if($row->status == '1')
                      <span class="badge badge-danger">Déactive</span>
                      @elseif($row->status == '0')
                       <span class="badge badge-success">Active</span>
                     @endif

                     </td>
                     <td>
                     @if($row->paye == '1')
                     <i class="fa-solid fa-lock-open" style="color:blue;"></i></acronym> </a>
                      @elseif($row->paye == '0')
                       <a href="" data-toggle="modal" data-target="#vip{{$row->id}}"><acronym title="Autoriser l'accées de cette personne a l'espace vip"><i class="fa-solid fa-lock"></i></acronym> </a>
                     @endif

                     </td>
                     <td>
                       @if($row->paye == '1' && !is_null($row->date_limite))
                       <?php

                       $date=$row->date;
                       $date_limite =$row->date_limite;

                      // $dure =$date_limite->diffInDays($date);
                       $now = Carbon\Carbon::now();
                       ?>
                       <h6 style="color:red;">( {{$row->date_limite}} )</h6>

                            @if($row->paye == 1)
                            <span class="badge badge-info"> autorisé</span>
                            @endif
                       @else
                       <h6 style="color:red;">(----/--/--)</h6>
                       @endif
                      </td>

                      <td>
                      @if($row->email_verified == 0)
                      <span class="badge badge-danger">Non</span>
                      @else
                      <span class="badge badge-success">Oui</span>
                      @endif
                      </td>
                     <td >



                      <!---edit user-->
                       <a  href="{{ url('admin/user/edit', $row->id) }}">
                      <i class="fas fa-user-edit" style="color: blue"></i></a>&ensp;

                      <!--read user-->
                         <a  href="{{ url('admin/user/show', $row->id) }}">
                      <i class="fas fa-folder" style="color :green"></i>&ensp;
                          </a>
                       <!--delete user-->
                    <!-- <a  href="{{ url('admin/user/delete', $row->id) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>-->
                    <a href="{{url('admin/user/delete',$row->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
&ensp;
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
                     <!------------------------------------------modal vip -------------------------------------->
  <div class="modal fade" id="vip{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Donner l'accées à l'espace VIP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="{{ route('admin.vip') }}" method="post">
              @csrf

             <div class="form-group">
               <label for="exampleInputEmail1">Date limite</label>
               <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_limite">
               <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="paye" value="1">
               <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
               <small id="emailHelp" class="form-text text-muted">Cette date permet de limite l'accées à l'espace VIP.</small>
             </div>


             <button type="submit" class="btn btn-primary">Valider</button>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
  <!------------------------------------------ End modal vip -------------------------------------->

                    @endforeach




                  </tbody>
                </table>
                {{$users->links('pagination::bootstrap-4')}}

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
                      <th>Vip</th>
                      <th>Date de limite d'autorisation</th>
                      <th>Email verifié</th>
                      <th style="width: 15%;" >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $row)
                       @if($row->status == '0')
                    <tr>
                      <td>{{$loop->iteration}}</td>
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
                     @if($row->paye == '1')
                     <i class="fa-solid fa-lock-open" style="color:blue;"></i></acronym> </a>

                      @elseif($row->paye == '0')
                       <a href="" data-toggle="modal" data-target="#vip{{$row->id}}"><acronym title="Autoriser l'accées de cette personne a l'espace vip"><i class="fa-solid fa-lock"></i></acronym> </a>
                     @endif

                     </td>
                     <td>
                       @if($row->paye == '1' && !is_null($row->date_limite))
                       <?php

                       $date=$row->date;
                       $date_limite =$row->date_limite;

                      // $dure =$date_limite->diffInDays($date);
                       $now = Carbon\Carbon::now();
                       ?>
                       <h6 style="color:red;">( {{$row->date_limite}} )</h6>

                            @if($row->paye == 1)
                            <span class="badge badge-info"> autorisé</span>
                            @endif
                       @else
                       <h6 style="color:red;">(----/--/--)</h6>
                       @endif
                      </td>

                      <td>
                      @if($row->email_verified == 0)
                      <span class="badge badge-danger">Non</span>
                      @else
                      <span class="badge badge-success">Oui</span>
                      @endif
                      </td>
                     <td>



                      <!---edit user-->
                      <i class="fas fa-user-edit" style="color: blue"></i>&ensp;

                      <!--read user-->


                       <!--delete user-->
                     <a  href="{{ route('admin.user.delete',[$row->id]) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp;
                      <!--deactive-->

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
                      <th>Vip</th>
                      <th>Date de limite d'autorisation</th>
                      <th>Email verifié</th>
                      <th style="width: 15%;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $row)
                       @if($row->status == '1')
                    <tr>
                      <td>{{$loop->iteration}}</td>
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
                     @if($row->paye == '1')
                     <i class="fa-solid fa-lock-open" style="color:blue;"></i></acronym> </a>
                      @elseif($row->paye == '0')
                       <a href="" data-toggle="modal" data-target="#vip{{$row->id}}"><acronym title="Autoriser l'accées de cette personne a l'espace vip"><i class="fa-solid fa-lock"></i></acronym> </a>
                     @endif

                     </td>
                     <td>
                       @if($row->paye == '1' && !is_null($row->date_limite))
                       <?php

                       $date=$row->date;
                       $date_limite =$row->date_limite;

                      // $dure =$date_limite->diffInDays($date);
                       $now = Carbon\Carbon::now();
                       ?>
                       <h6 style="color:red;">( {{$row->date_limite}} )</h6>

                            @if($row->paye == 1)
                            <span class="badge badge-info"> autorisé</span>
                            @endif
                       @else
                       <h6 style="color:red;">(----/--/--)</h6>
                       @endif
                      </td>

                      <td>
                      @if($row->email_verified == 0)
                      <span class="badge badge-danger">Non</span>
                      @else
                      <span class="badge badge-success">Oui</span>
                      @endif
                      </td>
                     <td>



                      <!---edit user-->
                      <i class="fas fa-user-edit" style="color: blue"></i>&ensp;

                      <!--read user-->
                       <a  href="{{ url('admin/user/show', $row->id) }}">
                      <i class="fas fa-folder" style="color :green"></i>&ensp;
                          </a>
                         <a  href="{{ route('admin.user.delete',[$row->id]) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp;
                       <!--delete user-->


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
