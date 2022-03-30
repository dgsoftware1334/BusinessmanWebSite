@extends('layouts.visiteur')

@section('content')
 
  <section class="page-header-section post-title style-2 style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/2.jpg') }})">

  
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="col-lg-7">
            <div class="register-title" >
              <h2>Reset password</h2>
              
            </div>
          </div>
          <div class="col-lg-5">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
                <h5>reset password</h5>
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
             <form action="{{ route('admin.reset.password') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                    @csrf
                    <input type="hidden" name="token" value="{{$token}}">
          <div class="form-inner">
           <input type="text" class="form-control" name="email" placeholder="{{trans('login_trans.Enter email address')}}" value="{{$email ?? old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            <input type="password" class="form-control" name="password" placeholder="{{trans('login_trans.Enter password')}}" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                <input type="password" class="form-control" name="cpassword" placeholder="confirmation de mot de passe" value="{{ old('cpassword') }}">
                          <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
           <button type="submit"  name="submit">{{trans('login_trans.Connection')}}</button>
                </div>
              </form>
              &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp;
              <a href="{{route('admin.login')}}" style="color:white;">Se connecter</a>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
    </section>
    @endsection