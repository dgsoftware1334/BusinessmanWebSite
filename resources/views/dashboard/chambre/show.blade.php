@extends('dashboard.layouts.sidebar')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chambre</h1>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
              <h1> {{$chambre->sujet}}</h1>
              <br><hr>
              <h3 class="d-inline-block d-sm-none">Discription de la chambre</h3>
              <div class="col-12">
                <img src="{{ asset('assests/images/chambre/'.$chambre->photo)}}" class="product-image" alt="Product Image"  style="height: 400px">
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
              <p> {!!$chambre->description!!}.</p>

              <hr>
               <h3 class="my-3" style="color: gray;">Politique de confidentialité</h3>
               <p>{!!$chambre->politique!!}</p>
               <hr>
               <ul class="nav flex-column" >
                 <li class="nav-item"> <p> <h5  class="my-3" style="color: gray;">  Téléphone: &ensp; {{$chambre->telephone}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Adresse: &ensp; {{$chambre->adresse}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Lien: &ensp; <a  href="<?=$chambre->lien?>">{{$chambre->lien}}</a></h5></p></li>
                 <li> <p  align="left">
                  <br>
                  <button type="button" class="btn btn-gl btn-primary" data-toggle="modal" data-target="#edit{{$chambre->id}}" align="right">
                      Modifier Chambre
                        </button>
                </p></li>
               </ul>





            </div>

          </div>
          <div class="row mt-4">

            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">

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

  <!-- /.content-wrapper -->

    <!------------------------------------------update modal------------------------------------->
    <div class="modal fade" id="edit{{$chambre->id}}">
        <div class="modal-dialog modal-lg" style="width:1200px">
          <div class="modal-content" style="width:1200px">
            <div class="modal-header" style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;Modifier les Informations de La chambte </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:1200px">


            <!-- general form elements disabled -->
            <form class="form-horizontal" method="POST" action="{{route('admin.update_chambre')}}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Le titre<span style="color:red">*</span></label>
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Adresse<span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('adresse', 'fr')}}" placeholder="Entrer l'adresse de la chambre" name="adresse" class="@error('adresse') is-invalid @enderror">
                      <span class="text-danger">@error('adresse'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >العنوان بالعربي</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->getTranslation('adresse', 'ar')}}" placeholder="Write the title in english" name="adresse_ar">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label" >Telephone<span style="color:red">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3"  value="{{$chambre->telephone}}" placeholder="Write the title in english" name="telephone" class="@error('telephone') is-invalid @enderror">
                      <span class="text-danger">@error('telephone'){{ $message }} @enderror</span>
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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description<span style="color:red">*</span></label>
                    <div class="col-sm-10">

                      <textarea class="form-control" rows="3" name="description" id="fr" placeholder="Entrer une description sur la chambre" class="@error('description') is-invalid @enderror">{{$chambre->getTranslation('description', 'fr')}}</textarea>
                      <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">

                      <textarea class="form-control" rows="3" id="ar" name="description_ar" placeholder="اكتب المحتوى بالعربي ...">{{$chambre->getTranslation('description', 'ar')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">

                      <textarea class="form-control" rows="3" id="en" name="description_en" placeholder="Write the description in english ...">{{$chambre->getTranslation('description', 'en')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Politique<span style="color:red">*</span></label>
                    <div class="col-sm-10">

                      <textarea class="form-control" id="pofr" rows="3" name="politique" placeholder="Entrer la politique de la chambre" class="@error('politique') is-invalid @enderror">{{$chambre->getTranslation('politique', 'fr')}}</textarea>
                      <span class="text-danger">@error('politique'){{ $message }} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">السياسة</label>
                    <div class="col-sm-10">

                      <textarea class="form-control" rows="3"  id="poar" name="politique_ar" placeholder="Entrer une description sur la chambre" >{{$chambre->getTranslation('politique', 'ar')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Politic</label>
                    <div class="col-sm-10">

                      <textarea class="form-control" rows="3" id="poen" name="politique_en" placeholder="Entrer une description sur la chambre" >{{$chambre->getTranslation('politique', 'en')}}</textarea>

                    </div>
                  </div>


                 <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-2 col-form-label" name="image">Image<span style="color:red">*</span></label>
                    <div class="input-group col-sm-10">
                      <div class="custom-file col-sm-10">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo"  >
                        <span class="text-danger">@error('photo'){{ $message }} @enderror</span>
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

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

             <!------------------------------------------update modal------------------------------------->



 @endforeach

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
        .create( document.querySelector( '#pofr' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#poar' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#poen' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection
