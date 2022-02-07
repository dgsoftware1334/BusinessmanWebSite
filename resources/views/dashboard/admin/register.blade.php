@extends('layouts.visiteur')

@section('content')
 
 <section class="page-header-section post-title style-2 style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/3.jpg') }})">

  
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="col-lg-7">
            <div class="register-title" >
              <h2>Création de compte pour l'administrateur</h2>
              <p>This is the largest conference in the world for business development </p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
                <h5>Se connecter  maintenant</h5>
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
               <form action="{{ route('admin.create_admin') }}" method="post">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
          <div class="form-inner">
          <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name') }}">
                         <span class="text-danger">@error('name'){{ $message }}@enderror</span>
           <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                         <span class="text-danger">@error('email'){{ $message }}@enderror</span>
           <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
           <button type="submit"  name="submit">Se connecter</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </section>
    @endsection