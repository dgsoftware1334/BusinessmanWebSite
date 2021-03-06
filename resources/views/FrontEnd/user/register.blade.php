 @extends('layouts.visiteur')

@section('content')
 
 <section class="page-header-section post-title style-2 style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/pageheader-3.jpg') }}); height:1300px;">

  
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="col-lg-7">
            <div class="register-title" >
              <h2 style="color:#2A0C49 ">{{trans('register_trans.Registration for the businessmen')}}</h2>
              <h4 style="color:#C70039 ;border-radius: 15px; align:center;">{{trans('register_trans.Your registration will allow you to have an overview in the national platform of Algerian businessmen')}} </h4>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
                <h5>{{trans('register_trans.Registration')}}</h5>
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
            <form action="{{ route('user.create') }}" method="post" autocomplete="off" enctype="multipart/form-data">
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
          <div class="form-inner">
            <input type="text" class="form-control" name="name" placeholder="{{trans('register_trans.Name')}}" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>

          <input type="text" class="form-control" name="lastname" placeholder="{{trans('register_trans.First Name')}}" value="{{ old('lastname') }}">
           <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>

          <input type="date" class="form-control" name="datenaissance" placeholder="date de naissance" value="{{ old('datenaissance') }}">
          <span class="text-danger">@error('datenaissance'){{ $message }} @enderror</span>


          <input type="text" class="form-control" name="phone" placeholder="{{trans('register_trans.Phone')}}" value="{{ old('phone') }}">
         <span class="text-danger">@error('phone'){{ $message }} @enderror</span>


          <textarea class="form-control" name="description" placeholder="{{trans('register_trans.Description')}}" value="{{ old('description') }}"></textarea>
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

          <input type="text" class="form-control" name="address" placeholder="{{trans('register_trans.Address')}}" value="{{ old('address') }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
          <span style="color:white;">Ici vous pouvez ajouter un ficher (cv)</span>
          <input type="file" class="form-control" name="file" placeholder="{{trans('register_trans.File')}}" value="{{ old('file') }}">
         
          

           <input type="text" class="form-control" name="email" placeholder="{{trans('register_trans.Email')}}" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>     
            <input type="text" class="form-control" name="cemail" placeholder="{{trans('register_trans.Confirm email')}}" value="{{ old('cemail') }}">
            <span class="text-danger">@error('cemail'){{ $message }} @enderror</span>

            <input type="password" class="form-control" name="password" placeholder="{{trans('register_trans.Password')}}" value="{{ old('password') }}">
              <span class="text-danger">@error('password'){{ $message }} @enderror</span>
             
            <input type="password" class="form-control" name="cpassword" placeholder="{{trans('register_trans.Confirm Password')}}" value="{{ old('cpassword') }}">
            <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
            &nbsp;  &nbsp;  &nbsp;
              <div class="row">
              <input type="checkbox" id="scales" name="term">
              <label for="term" style="color:white;">{{trans('header_trans.I read and I accept')}} <a href="{{url('condition/show')}}" style="color:white;" target="_blank"> <strong>{{trans('header_trans.Term of use')}}</strong></a></label>
             <br> <span class="text-danger">@error('term'){{ $message }} @enderror</span>
              </div>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
    <span class="help-block" style="color:red;">
        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
    </span>
@endif 
           <button type="submit"  name="submit">{{trans('register_trans.Registration')}}</button>
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