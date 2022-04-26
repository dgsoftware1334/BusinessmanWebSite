@extends('dashboard.layouts.sidebar')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Details de l'appel d'offre</h1>
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
              <li class="breadcrumb-item active">Détails de l'offre</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <br>

            <div class="col-12 col-sm-6">
              <h1> {{$tender->intitule}}</h1>
              <br><hr>
              <h3 class="d-inline-block d-sm-none">Discription de l'appel d'offre</h3>
              <div class="col-12">
                <img src="{{ asset('assests/images/tenders/'.$tender->image)}}" class="product-image" alt="Product Image"  style="height: 400px">
              </div>


            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3" style="color: gray;">Discription de l'appel d'offre</h3>
              <p> {{$tender->description}}.</p>

              <hr>
             
              
               
               <ul class="nav flex-column" >
                 <li class="nav-item"> <p> <h5  class="my-3" style="color: gray;">  Date de parution: &ensp; {{$tender->date_parution}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Date limite: &ensp; {{$tender->date_limite}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Societe: &ensp; {{$tender->societe}}</h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Type: &ensp; {{$tender->type}}</a></h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Secteur: &ensp; {{$tender->secteur->libelle}}</a></h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Wilaya: &ensp; {{$tender->wilaya}}</a></h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  adresse: &ensp; {{$tender->adresse}}</a></h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Privé/Public: &ensp; @if($tender->genre==1) Public @else Privé @endif </a></h5></p></li>
                 <li class="nav-item"><p> <h5  class="my-3" style="color: gray;">  Prix cahier de charge: &ensp; {{$tender->prix_cahier}} &nbsp; DA</a></h5></p></li>
                 <li> <p >
                  <br>
               
                </p></li>
               </ul>
             
         



            </div>

          </div>
          <div class="row mt-4">
         
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              
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