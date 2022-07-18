<div>
@php 
use App\Models\Signal;
$sujetts =App\Models\Sujet::All();
@endphp
<div class="form-group col-lg-8 mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Rechercher</label>
  
    <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
  </div>
<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
  <?php $nb = count($sujets)?>
@if($nb == 0)
<div class="alert alert-danger">
 Le forum est vide
</div>
@endif

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Sujet</th>
                      <th>Details</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   
                  @foreach ($sujets as $row)
                    <tr>
                    <td>
                        @if(is_null($row->image))
                         ( Image n'existe ) 
                         @endif
                         @if(!is_null($row->image))
                        <img src="{{ asset('assests/images/sujets/'.$row->image)  }}"   style="border-radius: 20px;border:none;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 100px;width: 100px">
                         @endif
                      </td>
                      <td> {{$row->titre}}</td>
                      <td> {!! Str::limit($row->details, 100) !!}</td>
                      <td>

                     
                     



              
                      
                        <!--read secteur-->
                      

                         <!--delete secteur-->
                        <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#delete{{$row->id}}">
                         <i class="far fa-trash-alt" style="color: red"></i>
                        </button>-->
                        <?php
            
            $nbr_signal =Signal::where('sujet_id','=',$row->id)
            ->get()->count();
            ?>
            @if($nbr_signal > 0)
           <a href="{{ url('admin/sujet/show', $row->id) }}">
             <span class="badge badge-pill badge-danger">{{$nbr_signal}}</span>
            </a>
            @endif
                        <a href="{{url('admin/sujet/destroy',$row->id)}}" class="button delete-confirm"><i class="far fa-trash-alt" style="color: red"></i></a>
                     
                        <a  href="{{ url('admin/sujet/show', $row->id) }}">
                      <i class="fas fa-comment" style="color :green"></i>&ensp; </a>

                      </td>
                    </tr>




      
     
 

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
 
</div>
{{$sujets->links('pagination::bootstrap-4')}}
</div>
</div>
