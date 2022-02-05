<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from labartisan.net/demo/unlimitcon/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:33:12 GMT -->
<head>
  <title>Algérian Businessmen</title>
  @toastr_css
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Unlimitcon Template is a Creative Multipurpose HTML5 Template">
  <meta name="keywords" content="Unlimitcon, HTML5, Multipurpose, Template">
  <meta name="author" content="LabArtisan">
  
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/x-icon.png">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/lightcase.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assests/FrontEnd/assets/css/style.css') }}">
    <script src="https://kit.fontawesome.com/91eb611da5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
   
       
    
</head>

<body>
    <!-- preloader start here  -->
        <!-- hadi ta3 laoding page  -->

    
  
   
  
    @include('FrontEnd.includes.header')
  <!-- header section ending here -->
 @yield('content')
 
    <!-- footer section start here -->
     @include('FrontEnd.includes.footer')
    <!-- footer section ending here -->
           
    @jquery
    @toastr_js
    @toastr_render

  <script src="{{ asset('assests/FrontEnd/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/snap.svg-min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/classie.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/main3.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assests/FrontEnd/assets/js/jquery.easing.js') }}"></script> 
    <script src="{{ asset('assests/FrontEnd/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jQuery.scrollSpeed.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/jquery.jticker.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/functions.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/assets/js/theia-sticky-sidebar.js') }}"></script>
  <!--script src="{{ asset('assests/FrontEnd/assets/js/s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js') }}"></script-->
  <script src="{{ asset('assests/FrontEnd/assets/js/mail.js') }}"></script>
    <script src="{{ asset('assests/FrontEnd/../../../s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js') }}"></script>

 <script>
      $(window).scroll(function() {
        var theta = $(window).scrollTop() / 300 % Math.PI;
        $('#leftgear').css({ transform: 'rotate(' + theta + 'rad)' });
      });
  </script>
</body>

<!-- Mirrored from labartisan.net/demo/unlimitcon/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Jan 2022 15:35:12 GMT -->
</html>
