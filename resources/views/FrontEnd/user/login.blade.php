 @extends('layouts.visiteur')

@section('content')
 
  <section class="page-header-section post-title style-2 style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/2.jpg') }})">

  
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="col-lg-7">
            <div class="register-title" >
              <h2>{{trans('login_trans.Login portal for businessmen')}}</h2>
              
            </div>
          </div>
          <div class="col-lg-5">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
                <h5>{{trans('login_trans.Connection')}}</h5>
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
             <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
          <div class="form-inner">
           <input type="text" class="form-control" name="email" placeholder="{{trans('login_trans.Enter email address')}}" value="{{ old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            <input type="password" class="form-control" name="password" placeholder="{{trans('login_trans.Enter password')}}" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
           <button type="submit"  name="submit">{{trans('login_trans.Connection')}}</button>
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