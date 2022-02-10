@extends('dashboard.layouts.sidebar')
@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Conditions d'utilisations</h1>
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
              <li class="breadcrumb-item active">Conditions</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  @foreach($condition as $row)
  <section class="content">
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <br>

        
            <div class="col-12 col-sm-10">
              <h3 class="my-3" style="color: gray;">Conditions</h3>
              <p> {!!$row->description!!}.</p>

              <hr>
               
      
                  <button type="button" class="btn btn-gl btn-primary" data-toggle="modal" data-target="#edit{{$row->id}}">
                      Modifier les conditions 
                        </button>
               
             
         



            </div>

          </div>
         
        </div>
        <!-- /.card-body -->
      </div>

      <!-- /.card -->

    </section>
    
 @endforeach

  <!-- /.content-wrapper -->

    <!------------------------------------------update modal------------------------------------->
    <div class="modal fade" id="edit{{$row->id}}">
        <div class="modal-dialog modal-lg" style="width:1200px">
          <div class="modal-content" style="width:1200px">
            <div class="modal-header" style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;Modifier les conditions d'utilisation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:1200px">

              
            <!-- general form elements disabled -->
            <form class="form-horizontal" method="POST" action="{{route('admin.update_condition')}}" autocomplete="off" enctype="multipart/form-data" id="myForm">
                  @csrf
                <div class="card-body">
              
                 
               
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description<span style="color:red">*</span></label>
                    <div class="col-sm-10">
           
                      <textarea class="form-control" rows="3" name="description" id="fr" placeholder="Entrer les conditions général de votre site" class="@error('description') is-invalid @enderror">{{$row->getTranslation('description', 'fr')}}</textarea>
                      <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                      <input id="id" type="hidden" name="id" class="form-control"  value="{{ $row->id }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">المحتوى </label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" id="ar" name="description_ar" placeholder="اكتب المحتوى بالعربي ...">{{$row->getTranslation('description', 'ar')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
            
                      <textarea class="form-control" rows="3" id="en" name="description_en" placeholder="Write the term of use in english ...">{{$row->getTranslation('description', 'en')}}</textarea>

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

            
      </div> 


 
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