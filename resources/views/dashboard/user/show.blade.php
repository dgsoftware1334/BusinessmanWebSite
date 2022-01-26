@extends('dashboard.layouts.sidebar')
@section('content')
 <!-- Main content -->
 
  
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if(is_null($user->photo))
                  <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('assests/FrontEnd/assets/images/1.png')  }}"
                       alt="User profile picture">

                    @endif
                    @if(!is_null($user->photo))
                  <img class="profile-user-img img-fluid img-circle"
                     src="{{ asset('assests/imgUser/'.$user->photo)  }}"
                       alt="User profile picture">

                    @endif

                </div>

                <h3 class="profile-username text-center">{{$user->nome}} &ensp;{{$user->lastname}}</h3>

                <p class="text-muted text-center">
                  @if(!is_null($user->secteur))
                     {{$user->secteur->libelle}}
                  @endif
                </p>

                <ul class="list-group list-group-unbordered mb-3">
                 
                  <li class="list-group-item">
                    <b><i class="fas fa-birthday-cake"></i>&ensp;{{$user->datenaissance }}</b> 
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-mobile-alt"></i>&ensp;{{$user->phone}}</b>
                  </li>
                  <li class="list-group-item">
                    <b><i class="fas fa-map-marker-alt"></i>&ensp;{{$user->Address}}</b>
                  </li>
                    <li class="list-group-item">
                    <b><i class="fas fa-certificate"></i>&ensp;{{$user->diplome}}</b>
                  </li>

                  <li class="list-group-item" >
                    <b><i class="fas fa-link"></i>&ensp;{{$user->siteweb}}</b>
                  </li>
                  <li  class="list-group-item" style="align-items: center">
                    <a href="<?=$user->lienfb?>" class="facebook"  target="_blank" ><i class=" fab fa-facebook-f"></i></a>
                    <a href="<?=$user->linked ?>" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                      
                      <a href="<?=$user->lientwit?>"target="_blank"  class="twitter-sm"><i class="fab fa-twitter"></i></a>
                      <a href="<?=$user->lieninsta ?>" target="_blank" class="facebook" ><i class="fab fa-instagram"></i></a></li>
                     
                       
                  </li>

  

                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                Description
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    
                      <!-- /.user-block -->
                      <p>
                       {{$user->description}}
                      </p>

                      

                
                    </div>
                    <!-- /.post -->

                
                    <!-- Post -->
       
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    
  <!-- /.content-wrapper -->
@endsection