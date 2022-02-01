@extends('dashboard.layouts.sidebar')
@section('content')
<!-- Main content -->
<style type="text/css">

.tab-head{
padding-left: 0px !important;
padding-right: 0px !important;
}
.nav-item1 a:focus{
outline: unset;
}
.nav-item1 a:hover{
border: 1px solid #fff !important;
}
.nav-item1 a{
color: black !important;
font-weight: 600;
padding-left: 28px;
padding-right: 28px;
}
.nav-item1 .active{
color: #5741A3 !important;
border:none !important;
border-bottom: 3px solid blue !important;
font-weight: 600;
}
.nav-item1 .active:hover{
border:none !important;
border-bottom: 3px solid blue !important;
}
.nav-tabs{
border-bottom: none !important;
}
.tab-pane h5{
border-left: 4px solid blue;
}
.tab-pane p{
border-top: 1px solid blue;
}
</style>

<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1 class="m-0">Liste des fondateurs</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="#">Fondateurs</a></li>
<li class="breadcrumb-item active">accueil</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->



@if(session('supprimer'))
<div class="alert alert-danger">
{{ session('supprimer') }}
</div>
@endif
<div class="animated fadeInUp infinite" alt="Transparent MDB Logo" >
<div class="card card-primary card-outline">
<div class="card-body">
<div class="container">
<div class="row">
<div class="col-lg-11 bg-white rounded-top tab-head">




</div>
<div class="col-lg-1 ">
<a class="btn btn-block btn-outline-info" data-toggle="modal" data-target="#ajoute">
  <img src="https://img.icons8.com/ios/32/000000/add-administrator.png"/>


</a>





</div>



<div class="col-lg-12 bg-white">
<div class="tab-content mt-4" id="myTabContent">
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



<table class="table table-bordered">
<thead>
<tr>
<th style="width: 10px">#</th>
<th>nom complet</th>
<th>diplom</th>
<th>description</th>
<th>telephone</th>

<th >Action</th>
</tr>
</thead>
<tbody>
<tr>
@foreach($fondateurs as $row)
<tr>
<td>{{$row->id}}</td>
<td>{{$row->nom}} {{$row->prenom}}</td>
<td>{{$row->diplom}}</td>
<td>{!!$row->description!!}</td>



<td>{{$row->Telephone}}</td>


<td>
<a href="" data-toggle="modal" data-target="#edite{{$row->id}}">
<i class="fas fa-edit" style="color: blue"></i></a>&ensp;

 <a  href="{{ url('admin/fondateur/delete', $row->id) }}"> <i class="far fa-trash-alt" style="color: red"></i></a>&ensp; 



</td>
</tr>




<div class="modal fade" id="edite{{$row->id}}" >
<div class="modal-dialog"style="width: 1000px" >
<div class="modal-content"style="width: 1000px">
<div class="modal-header" style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" align="center">&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;
Modifier un fondateur </h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="width: 1000px">

<form class="form-horizontal" method="POST" action="{{ route('admin.update.fondateur',[$row->id]) }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
@csrf
<div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Nom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom" name="nom" value="{{$row->getTranslation('nom', 'fr')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >اللقب</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اللقب" name="nom_ar"  value="{{$row->getTranslation('nom', 'ar')}}">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Prenom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="prenom" name="prenom"  value="{{$row->getTranslation('prenom', 'fr')}}">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الاسم</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="الاسم" name="prenom_ar"  value="{{$row->getTranslation('prenom', 'ar')}}">
                    </div>
                    </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Diplome</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="diplom" name="diplom"  value="{{$row->getTranslation('diplom', 'fr')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الشهادة</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="الشهادة" name="diplom_ar"   value="{{$row->getTranslation('diplom', 'ar')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >The diploma</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="diplom" name="diplom_en"   value="{{$row->getTranslation('diplom', 'en')}}">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Telephone<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Telephone" name="Telephone"  value="{{$row->Telephone}}" >
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="description" id="upfr<?=$row->id; ?>" placeholder="Enter ..." >{{$row->getTranslation('description', 'fr')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">نبذة عن المؤسس</label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" id="upar<?=$row->id; ?>" name="description_ar" placeholder="نبذة عن المؤسس ..."> {{$row->getTranslation('description', 'ar')}}</textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="description_en" id="upen<?=$row->id; ?>" placeholder="Write an english description" >{{$row->getTranslation('description', 'en')}}</textarea>

                    </div>
                  </div>
                 


                   <div class="col-sm-6">
                            <label for="">Ajouter une image<span style="color:red">*</span></label>
                            <input type="file" name="image"  class="course form-control">
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


</form>





</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
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
</tr>




</tbody>
</table>






</div>




<!-- edit publication--->

</div>
</div>
</div>
</div>





<div class="modal fade" id="ajoute" >
<div class="modal-dialog" style="width: 1000px" >
<div class="modal-content" style="width: 1000px">
<div class="modal-header"  style="background-color: #4682B4;">
<h4 class="modal-title" style="color: white" >&ensp; &ensp; &ensp; &ensp; &ensp; &ensp; 
&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;&ensp; &ensp; &ensp; &ensp; &ensp; &ensp;

Ajouter un fondateur</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body" style="width: 1000px">

<form class="form-horizontal" method="POST" action="{{ route('admin.store.fondateur') }}" autocomplete="off" enctype="multipart/form-data" id="myForm">
@csrf
<div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Nom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Nom" name="nom" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >اللقب</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="اللقب" name="nom_ar" value="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Prenom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="prenom" name="prenom" value="">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الاسم</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="الاسم" name="prenom_ar" value="">
                    </div>
                    </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Diplome</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="diplom" name="diplom" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >الشهادة</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="الشهادة" name="diplom_ar" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >The diploma</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="diplom" name="diplom_en" >
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Telephone<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputEmail3" placeholder="Telephone" name="Telephone" >
                    </div>
                  </div>




                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="description" placeholder="Enter ..."  id="fr"></textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">نبذة عن المؤسس</label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="description_ar" id="ar" placeholder="نبذة عن المؤسس ..."></textarea>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
            
                      <textarea class="form-control" rows="3" name="description_en" id="en" placeholder="Write an english description"></textarea>

                    </div>
                  </div>
            <div class="col-sm-6">
                            <label for="">Ajouter une image<span style="color:red">*</span></label>
                            <input type="file" name="image"  class="course form-control">
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

</form>





</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>





</div>
</div>
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
       
    
     
</script>

<!-- /.content-wrapper -->
@endsection