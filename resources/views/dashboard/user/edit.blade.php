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
            <h1 class="m-0">Modifier l'homme d'affaire</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Modifier l'homme d'affaire</a></li>
              <li class="breadcrumb-item active">accueil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@if(session('success'))
<div class="alert alert-success">
 {{ session('success') }}
</div>
@endif





<div class="card card-default">
         
       
          <div class="card-body">
            <div class="row">
               <br/> <br/> <br/> <br/>
              <div class="col-md-6">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Information profisonnels</h3>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.user.update',[$user->id]) }}" method="post" autocomplete="off" enctype="multipart/form-data">
               @if (Session::get('success'))
                         <div class="alert alert-success">
                             {{ Session::get('success') }}
                         </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Nom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" placeholder="{{trans('register_trans.Name')}}" value="{{ $user->name}}" class="@error('name') is-invalid @enderror">
                      <span class="text-danger">@error('name'){{ $message }} @enderror</span>

                    </div>
                  </div>
                    
                 <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Prenom<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="lastname" placeholder="{{trans('register_trans.First Name')}}" value="{{ $user->lastname }}">
                     <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Date de naissance<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="datenaissance" placeholder="date de naissance" value="{{ $user->datenaissance }}">
          <span class="text-danger">@error('datenaissance'){{ $message }} @enderror</span>

                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Phone<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                      <input type="text"class="form-control" name="phone" placeholder="{{trans('register_trans.Phone')}}" value="{{ $user->phone }}">
         <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

                    </div>
                  </div>
                     <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Description<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <textarea class="form-control" name="description" value="{{  $user->description }}">{{  $user->description }}</textarea>
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Adress<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="address" placeholder="{{trans('register_trans.Address')}}" value="{{  $user->address }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

                    </div>
                  </div>


                  <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label" >Email<span style="color:red">*</span></label>
                    <div class="col-sm-9">
                   <input type="text" class="form-control" name="email" placeholder="{{trans('register_trans.Email')}}" value="{{  $user->email }}">
                   <span class="text-danger">@error('email'){{ $message }} @enderror</span>     
      
                    </div>
                  </div>



                <!--div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label" >Mote de passe</label>
                    <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="{{trans('register_trans.Password')}}" value="{{  $user->password }}">
              <span class="text-danger">@error('password'){{ $message }} @enderror</span>    
      
                    </div>
                  </div>


                <div class="form-group row">
                     <label for="inputEmail3" class="col-sm-3 col-form-label" >Confirmer mote de passe</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="cpassword" placeholder="{{trans('register_trans.Confirm Password')}}" value="{{  $user->cpassword }}">
            <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                    </div>
                  </div-->




                  <br/>
                   
                </div>
               
              
             
                <!-- /.form group -->
              </div>
              
              <!-- /.card-body -->
            </div>
                </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informations personnelles</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                    
             
                <div class="card-body">      

            <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Facebook</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lienfb" placeholder="https//www.facebook.com" value="{{  $user->lienfb }}">

                    </div>
                  </div>
                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Instagrame</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="lieninsta" placeholder="https//www.instagram.com"  value="{{  $user->lieninsta }}">

                    </div>
                  </div>

            
                   
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Twiter</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="lientwit" placeholder=" https//www.twiter.com" value="{{  $user->lientwit }}">
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Linked</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="linked" placeholder="  https//www.linkedin.com" value="{{  $user->linked }}">

                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Diploma</label>
                    <div class="col-sm-9">
            <input type="text" class="form-control" name="diplome" placeholder="Diploma"  value="{{  $user->diplome }}">

                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Site web</label>
                    <div class="col-sm-9">
                  <input type="text" class="form-control" name="siteweb" placeholder="https//www.SiteWeb.com" value="{{  $user->siteweb }}">

                    </div>
                  </div>

             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Année exprience</label>
                    <div class="col-sm-9">
                   <input type="integer" class="form-control" name="anneexp" placeholder="Année exprience" value="{{  $user->anneexp }}">

                    </div>
                  </div>

             <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label" >Secteur</label>
                    <div class="col-sm-9">
                   <select name="sacteur_id" id="department" class="form-control">
                    <option value="">Aucun</option>
<?php
$status = true;
?>
@foreach($secteurs as $secteur)
@if((isset($user->secteur->id)))
  @if( ($user->secteur->id == $secteur->id))
  <option value="{{ $secteur->id }}" selected>{{ $secteur->libelle }}</option>
  @endif
@endif

@if($user->secteur_id!= $secteur->id && $status  )

<option value="{{ $secteur->id }}">{{ $secteur->libelle }}</option>
<?php
$status = true;
?>
@endif


@endforeach


            </select>

                    </div>
                  </div>

                  
         <div class="form-group row">
                    <label for="exampleInputFile" class="col-sm-3 col-form-label" name="photo">Image</label>
                    <div class="input-group col-sm-9">
                      <div class="custom-file col-sm-9">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="photo"  class="@error('contenu') is-invalid @enderror" value="{{  $user->image }}">
                       
                        <label class="custom-file-label" for="exampleInputFile">Choisis une image</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                      <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                    </div>
                  </div>
                  
                </div>
                
             <br><br><br><br><br>
            


              </div>
           
            </div>
              
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="form-group row">
              <div class="input-group col-sm-12">
               <br/>
                  <button type="submit" class="btn btn-outline-info btn-block btn-flat"><img src="https://img.icons8.com/fluency/26/000000/save.png"/> Enregistrer</button>


                   </div>
                    </div>
                    </form>
           
          </div>
          
        </div>

</div>






    
  <!-- /.content-wrapper -->
@endsection