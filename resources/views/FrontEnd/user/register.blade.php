 @extends('layouts.visiteur')

@section('content')
 
 <section class="page-header-section post-title style-2 style-3" style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/pageheader-3.jpg') }})">

  
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="col-lg-7">
            <div class="register-title" >
              <h2 style="color: #fd3d6b">Inscription d'homme d'affaires</h2>
              <p style="color:black">This is the largest conference in the world for business development </p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
                <h5>S'inscrire maintenant</h5>
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
            <form action="{{ route('user.create') }}" method="post" autocomplete="off">
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
            <input type="text" class="form-control" name="name" placeholder="Nom" value="{{ old('name') }}">
                <span class="text-danger">@error('name'){{ $message }} @enderror</span>

          <input type="text" class="form-control" name="lastname" placeholder="Prénom" value="{{ old('lastname') }}">
           <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>

          <input type="date" class="form-control" name="datenaissance" placeholder="date de naissance" value="{{ old('datenaissance') }}">
          <span class="text-danger">@error('datenaissance'){{ $message }} @enderror</span>


          <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
         <span class="text-danger">@error('phone'){{ $message }} @enderror</span>


          <textarea class="form-control" name="description" placeholder="Description" value="{{ old('description') }}"></textarea>
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

          <input type="text" class="form-control" name="address" placeholder="Adresse" value="{{ old('address') }}">
          <span class="text-danger">@error('phone'){{ $message }} @enderror</span>

          

           <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            <span class="text-danger">@error('email'){{ $message }} @enderror</span>     
      

            <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
              <span class="text-danger">@error('password'){{ $message }} @enderror</span>

            <input type="password" class="form-control" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
            <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                 
           <button type="submit"  name="submit">S'inscrire</button>
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