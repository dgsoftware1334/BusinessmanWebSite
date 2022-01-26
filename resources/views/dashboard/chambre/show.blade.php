@extends('dashboard.layouts.sidebar')
@section('content')

  @foreach($chambres as $chambre)
  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Le libellé de la chambre : {{$chambre->sujet}}</h3>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-6 order-2 order-md-1">
              <div class="row">
                <div class="col-12">
                  <h5>Le logo de la chambre</h5>
                    <div>
                      <img class="img img-bordered-sm" src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" alt="user image" height="200" width="200">
                      <br>
                      <br>
                      <!-- /.user-block -->
                      <h5>La description de la chambre</h5>
                      <p>
                      {{$chambre->description}}
                      </p>
                      
                    </div>
                    <div>

                        
                      <h5>Politique de confidentialité</h5>
                     
                      <!-- /.user-block -->
                      <p>
                      {{$chambre->politique}}
                      </p>

                    
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              
              
              <h5>Les coordonnées de la chambre</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-phone" aria-hidden="true"></i> {{$chambre->telephone}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$chambre->adresse}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-link" aria-hidden="true"></i>{{$chambre->lien}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-facebook-square" aria-hidden="true"></i>{{$chambre->fb}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-linkedin" aria-hidden="true"></i>{{$chambre->linked}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-instagram" aria-hidden="true"></i>{{$chambre->insta}}</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="fa fa-twitter" aria-hidden="true"></i>{{$chambre->twit}}</a>
                </li>
              </ul>
          
            </div>
            
          </div>
          <div class="text-center mt-5 mb-3">
              
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit{{$chambre->id}}">
                      modifier
                        </button>
            
              </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
           
          @foreach($chambre->fondateurs as $row)
                   
                    
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Digital Strategist
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$row->nom}}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

    <!------------------------------------------update modal------------------------------------->
    <div class="modal fade" id="edit{{$chambre->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modifier l'evenement </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Information de l'evnement</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form class="form-horizontal" method="POST" action="{{route('admin.update_chambre')}}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le titre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('sujet', 'fr')}}" placeholder="Entrer le titre en (fr)" name="sujet" class="@error('sujet') is-invalid @enderror"> 
                      <input id="id" type="hidden" name="id" class="form-control"  value="{{ $chambre->id }}">
                      <span class="text-danger">@error('sujet'){{ $message }} @enderror</span>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Titre (ar)</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('sujet', 'ar')}}" placeholder="اكتب العنوان باللغة العربية" name="sujet_ar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >The title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('sujet', 'en')}}" placeholder="Write the title in english" name="sujet_en">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Site web</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"   value="{{$chambre->lien}}" placeholder="www.lien.com" name="lien">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Adresse</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('adresse', 'fr')}}" placeholder="Entrer l'adresse de la chambre" name="adresse" class="@error('adresse') is-invalid @enderror">
                      <span class="text-danger">@error('politique'){{ $adresse }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >العنوان بالعربي</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('adresse', 'ar')}}" placeholder="Write the title in english" name="adresse_ar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Telephone</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->telephone}}" placeholder="Write the title in english" name="telephone" class="@error('telephone') is-invalid @enderror">
                      <span class="text-danger">@error('politique'){{ $telephone }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le lien Facebook</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" value="{{$chambre->fb}}" placeholder="Write the title in english" name="fb">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le lien instagram</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" value="{{$chambre->insta}}"placeholder="Write the title in english" name="insta">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le lien linked in</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" value="{{$chambre->linked}}" placeholder="Write the title in english" name="linked">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le lien twitter</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" value="{{$chambre->twit}}" placeholder="Write the title in english" name="twit">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="description" placeholder="Entrer une description sur la chambre" class="@error('description') is-invalid @enderror">{{$chambre->getTranslation('description', 'fr')}}</textarea>
                      <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="description_ar" placeholder="اكتب المحتوى بالعربي ...">{{$chambre->getTranslation('description', 'ar')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="description_en" placeholder="Write the description in english ...">{{$chambre->getTranslation('description', 'en')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Politique</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="politique" placeholder="Entrer une description sur la chambre" class="@error('politique') is-invalid @enderror">{{$chambre->getTranslation('politique', 'fr')}}</textarea>
                      <span class="text-danger">@error('politique'){{ $politique }} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">السياسة</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="politique_ar" placeholder="Entrer une description sur la chambre" >{{$chambre->getTranslation('politique', 'ar')}}</textarea>
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Politic</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" name="politique_en" placeholder="Entrer une description sur la chambre" >{{$chambre->getTranslation('politique', 'en')}}</textarea>
                    
                    </div>
                  </div>
                  

                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Image</label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo"  >
                       
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                     
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
              

 @endforeach

@endsection