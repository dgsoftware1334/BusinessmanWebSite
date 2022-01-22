 @extends('layouts.visiteur')

@section('content')
 

  <div class="page-header-section post-title style-2"  style="background-image: url({{ asset('assests/FrontEnd/assets/images/pageheader/17.jpg') }})">
        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          <div class="speaker">
            <div class="speaker-thumb">
               


              <img src="{{ asset('assests/FrontEnd/assets/images/speaker/17.png') }}" alt="speaker" >
            </div>
            <div class="speaker-content">
              <a href="#">{{ Auth::guard('web')->user()->name }}  {{ Auth::guard('web')->user()->lastname }}</a>
             
            </div>
          </div>
          <div class="page-social">
            <ul class="social-link-list d-flex flex-wrap">
              <li><a href="#" class="facebook"><i class=" fab fa-facebook-f"></i></a></li>
              <li><a href="#" class="twitter-sm"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="google"><i class="fab fa-google-plus-g"></i></a></li>
              <li><a href="#" class="youtube"><i class="fab fa-youtube"></i></a></li>
              <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
          </div>
        </div>
            </div>
        </div>
    </div>
  <section class="speaker-profile padding-tb bg-ash">
        <div class="container container-1310">
          <div class="row">
            <div class="col-lg-4">
                <div class="speaker-info">
                    <div class="personal-information">
                        <h5>{{trans('profil_trans.Personal information')}} </h5>
                        <ul>
                            <li><p>{{trans('profil_trans.Family name')}}</p><span>Sargio Lam </span></li>
                            <li><p>{{trans('profil_trans.Last name')}}</p><span>Chairman of Libarko </span></li>
                            <li><p>{{trans('profil_trans.Date of birth')}}</p><span>26/12/1968 </span></li>
                            <li><p>{{trans('profil_trans.Phone')}}</p><span>0000000000</span></li>
                            <li><p>{{trans('profil_trans.Address')}}</p><span>sargio@mail.com </span></li>
                            <li><p>{{trans('profil_trans.Diploma')}}</p><span>www.sargio.com </span></li>
                            <li><p>{{trans('profil_trans.Activity area')}}</p><span>www.sargio.com </span></li>
                            <li><p>{{trans('profil_trans.Website')}}</p><span>www.sargio.com </span></li>
                        </ul>
                    </div>
                </div>
                </div>
                <div class="col-lg-8">
                <div class="speaker-details">
                    <div class="personal-articals">
                        <h5>{{trans('profil_trans.Description')}}</h5>
                        <p>Sargio Lam is the chairman of Libarko Ltd. parall functionalize mindsha rather than bricks-and-clicks schema. Dramatic reconceptualize synergistic channel whereas tactic community repurpose granular quality. Competent syndic vertical infomediary with inexpensive methodologies. Compel utilize integrated infomediary without ethic content. Convenient negotiate sustainable innovation vis-a-vis economically sound paradigms.</p>
                        <p>Distinctively provide access to market positioning testing procedures rather than professional web services. Energistically e-enable customized customer service after multifunctional e-services. </p>
                        
                        <!--img src="{{ asset('assests/FrontEnd/assets/images/speaker/name.png') }}" alt="personal-cv"-->
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- speaker profile or cv section ending here -->

    <!-- personal shedul section start here -->
    <section class="personal-schedule padding-tb">
        <div class="container container-`1310">
            <div class="section-header accordion-question in">
                <p></p>
                <h2> <span>Information profisonnel</span></h2>
             
            </div>

            <div class="section-wrapper">
              <div class="accordion-item">
                <div class="accordion-question in">
                  <!--span><i class="fa fa-clock"></i> 8:30 am</span-->
                  <!--h6>Business Market Research</h6-->
                  <i class="fas fa-angle-double-down"></i>
                </div>

        <div class="page-header-content">
            <div class="container container-1310">
        <div class="page-header-content-inner">
          
          <div class="col-lg-8 offset-2">
            <div class="register-border">
            <div class="register-form">
              <div class="form-title">
               
                <!--p>Complete Our Registration Process and Join This Event</p-->
              </div>
             <form action="" method="post" autocomplete="off">
                   
                    @csrf
          <div class="form-inner">
           <input type="text" class="form-control" name="email" placeholder="Enter lien facebook">
            <input type="text" class="form-control" name="email" placeholder="Enter lien instgrame">
             <input type="text" class="form-control" name="email" placeholder="Enter lien linked in">
              <input type="text" class="form-control" name="email" placeholder="Enter site web">
        
              <input type="text" class="form-control" name="email" placeholder="deplom section ">
              <input type="text" class="form-control" name="email" placeholder="annee exprience ">

              <input type="text" class="form-control" name="email" placeholder="photo ">


                         
           
                      
           <button type="submit" class="button  btn-lg btn-block"  name="submit" style="background-color: #fd3d6b">confirmer</button>
           

                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
            </div>
        </div>
          
        </div>
       
     
            </div>
        </div>
    </section>
    <!-- personal shedul section ending here -->

   
 
    @endsection