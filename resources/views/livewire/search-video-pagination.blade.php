<div>
<div class="row">
<div class="form-group col-lg-8">
               <label for="inputPassword2" class="sr-only">Rechercher</label>
               <input type="text" class="form-control" id="inputPassword2" placeholder="Rechercher" wire:model="searchTerm" >
         </div>
         <div class="col-lg-1 ">
   <a  class="btn btn-block btn-outline-info" href="{{ route('admin.video.create')}}">
   <img src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/32/000000/external-calendar-calendar-kmg-design-detailed-outline-kmg-design-2.png"/></button>
</a>

</div></div>
<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item1">
<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">tous</a>
</li>


</ul>


</div>


<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Vidéo</th>
                      <th>Titre</th>
                      <th>Description</th>
                      <th>catégorie</th>
                      <th>Date d'expiration</th>
                     
                      <th>Afficher/Enlever de l'accueil</th>
                     
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($videos as $video)
                     
                    <tr>
                   
                      <td>
                          
                          
                      <video width="320" height="240" controls>
                                 <source src="{{URL::asset("/assests/images/videos/$video->video")}}" type="video/mp4">
                                          Your browser does not support the video tag.
                                </video>
                          
                      </td>
                      <td>{{$video->title}}</td>
                     <td>{!! Str::limit($video->description, 100) !!}</td>
                     <td>{{$video->categorie}}</td>
                     <td>
                     {{$video->date_expiration}}
                     </td>
                       <td>
                         @if($video->show ==0)
                         <a href="{{ url('admin/video/autorize', $video->id) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i> &nbsp;Afficher</a>
                         @else
                         <a href="{{ url('admin/video/inautorize', $video->id) }}" class="btn btn-warning"><i class="fa-solid fa-eye-slash"></i> &nbsp;Enlever</a>
                         @endif
                       </td>
                  
                    
                  
            
              
                   </tr>
               
                    @endforeach
                    
                    
                  </tbody>
                </table>
                {{$videos->links('pagination::bootstrap-4')}}

</div>


</div>
</div>
</div>
