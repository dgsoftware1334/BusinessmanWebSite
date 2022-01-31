@extends('dashboard.layouts.sidebar')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chambre</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Chambre</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  @foreach($chambres as $chambre)
  <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <br>
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">Discription de la chambre</h3>
              <div class="col-12">
                <img src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" class="product-image" alt="Product Image">
              </div>
              <div class="col-6 product-image-thumbs">

              <div class="mt-4 product-share">
                <a href="<?=$chambre->fb?>" class="text-gray">
                  <i class="fab fa-facebook fa-2x"></i>
                </a>
                 <a href="<?=$chambre->insta?>" class="text-gray">
                  <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="<?=$chambre->twit?>" class="text-gray">
                  <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="<?=$chambre->linked?>" class="text-gray">
                  <i class="fab fa-linkedin-in square fa-2x"></i>
                </a>
                <a href="<?=$chambre->lienfb?>" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
                
              </div>
               
              </div>

            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="color: gray;">Discription de la chambre</h3>
              <p> {{$chambre->description}}.</p>

              <hr>
               <h3 class="my-3" style="color: gray;">Politique de confidentialité</h3>
               <p>{{$chambre->politique}}</p>
               <hr>
               <ul class="nav flex-column" >
                 <li class="nav-item"> <p> <h5  class="my-3" style="color: gray;">  Téléphone: &ensp; {{$chambre->telephone}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Adresse: &ensp; {{$chambre->adresse}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Lien: &ensp; <a  href="<?=$chambre->lien?>">{{$chambre->lien}}</a></h5></p>
</li>
               </ul>
             
         



            </div>

          </div>
          <div class="row mt-4">
            <h3 class="my-3" style="color: gray;">  &ensp;&ensp;&ensp;Les fondateur</h3>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">
                  @foreach($chambre->fondateurs as $row)
            <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{$row->diplom}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$row->nom}} &end;  {{$row->prenom}}</b></h2>
                       <p class="text-muted text-sm"><b>Description: </b> {{$row->description}} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Tlephone #  :{{$row->Telephone}}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                     
                        <img src="{{ asset('assests/images/fondateurs/'.$row->image)}}" class="img-circle img-fluid" style="width: 100px;height: 100px" >
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
              @endforeach
          </div> 
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.card -->

    </section>

  </div>

 @endforeach

@endsection