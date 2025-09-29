<!DOCTYPE html>
<html lang="en" @if($langg->rtl == 1) "dir='rtl'" @endif>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('assets/images/raqmita-icon.png')}}">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/intlTelInput.min.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.structure.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/jquery-ui.theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lity.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @if($langg->rtl == 1) 
    <link rel="stylesheet" href="{{asset('assets/css/style-rtl.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('assets/css/sweetalert.css')}}">

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet"> -->
    <style>
    .hide{
        display:none;
    }
</style>
    <title>RAQMITA</title>

<script type="text/javascript">
	
</script>
</head>
<body>
 <div class="career-loading ">
    <img src="{{asset('assets/images/raqmita.gif')}}">
</div> 
{{-- <div class="top-header py-3 px-4">
    <div class="container-fluid d-flex align-items-center justify-content-center justify-content-md-between flex-wrap">
        <div class="left-header d-flex align-items-center justify-content-center">
            <span><a href="tel:+966538551748"><i class="fas fa-phone"></i> +966 538551748</a></span> 
            <span class="px-2">|</span>
            <span><a href="mailto:info@raqmita.it"><i class="fas fa-envelope"></i> info@raqmita.it</span></a>
        </div>
        <div class="right-header">
            <div class="social-media">
                <a href="https://www.facebook.com/raqmitait/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com/raqmitaIT" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://api.whatsapp.com/send?phone=+966538551748" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.linkedin.com/company/raqmitait/" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</div> --}}
<nav class="navbar navbar-expand-lg navbar-dark">
 <div class="container-fluid">
 	 <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('assets/images/logo.png')}}"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon"></span> -->
	  <i class="fas fa-stream"></i>
    </button>
  <div class="collapse navbar-collapse justify-content-end" id="main_nav">
	<ul class="navbar-nav">
		<li class="nav-item"> <a class="nav-link" href="{{url('/')}}">{{ __('site.nav_1') }} </a> </li>
		<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" href="#"> {{ __('site.nav_2') }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{url('/cloud')}}"> Cloud Services </a></li>
			  <li><a class="dropdown-item" href="{{url('/it-infrastructure')}}"> IT Infrastructure </a></li>
			  <li><a class="dropdown-item" href="{{url('/it-service-management')}}"> {{ __('site.nav_2') }}</a></li>
			 
		    </ul>
        </li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> {{ __('site.nav_4') }}  </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="{{url('/erp')}}"> ERP / GRP </a></li>
			  <li><a class="dropdown-item" href="{{url('/crm')}}"> CRM </a></li>
			  <li><a class="dropdown-item" href="{{url('/website')}}"> BUSSNISS WEBSITE </a></li>
			  <li><a class="dropdown-item" href="{{url('/mobile')}}"> Mobile apps </a></li>
		    </ul>
		</li>
		{{-- <li class="nav-item"> <a class="nav-link" href="{{url('/products')}}">{{ __('site.nav_6') }}</a> </li> --}}
		{{-- <li class="nav-item"> <a class="nav-link" href="#">{{ __('site.nav_3') }}</a> </li> --}}
        <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> {{ __('site.nav_5') }} </a>
		    <ul class="dropdown-menu">
			  <li><a class="dropdown-item" href="{{url('/oracle')}}"> Oracle Product </a></li>
			  <li><a class="dropdown-item" href="{{url('/wso2')}}"> WSO2 </a></li>
			  <li><a class="dropdown-item" href="{{url('/system-integration')}}"> {{ __('site.nav_10') }}</a></li>
		    </ul>
		</li>
		{{-- <li class="nav-item"> <a class="nav-link" href="{{url('/careers')}}">{{ __('site.nav_7') }}</a> </li> --}}
		<li class="nav-item"> <a class="nav-link" href="{{url('/contact')}}">{{ __('site.nav_8') }}</a> </li>
		{{-- <li class="nav-item"> <a class="nav-link" href="{{url('/Customer-support')}}">{{ __('site.nav_9') }}</a> </li> --}}
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> 
		
			@if(Session::has('language'))
                	<img style="width: 30px" @if(DB::table('languages')->where('id','=',Session::get('language'))->first()->sign == 'ar') src="assets/images/sa.svg"  alt="SA Flag" @else src="assets/images/gb.svg" alt="England Flag" @endif>
                                        @php
                                       echo DB::table('languages')->where('id','=',Session::get('language'))->first()->language ;

                                        @endphp


                                    @else
                                    
                                    	<img style="width: 30px" @if(DB::table('languages')->where('is_default','=',1)->first()->sign == 'ar') src="assets/images/sa.svg"  alt="SA Flag" @else src="assets/images/gb.svg" alt="England Flag" @endif>
                                        @php
                                        echo  DB::table('languages')->where('is_default','=',1)->first()->language
                                        @endphp
                                   @endif</a>
		    <ul class="dropdown-menu languages-dropdown-menu">
		        	@foreach(DB::table('languages')->get() as $language)
                        <li><a class="dropdown-item d-flex align-items-center" href="{{route('front.language',$language->id)}}"> <img @if($language->sign == 'ar')  src="assets/images/sa.svg"  alt="SA Flag"   @else src="assets/images/gb.svg" alt="England Flag" @endif> {{$language->language}} </a></li>
                      <!--  <li><a href="https://raqmita.it/mobile"> <img > English </a></li>    --> 
                        		@endforeach
			 <!-- <li><a class="dropdown-item d-flex align-items-center" href="#"> <img src="assets/images/sa.svg" alt="SA Flag"> Arabic </a></li>
			  <li><a class="dropdown-item d-flex align-items-center" href="#"> <img src="assets/images/gb.svg" alt="England Flag"> English </a></li>-->
		    </ul>
		</li>
	</ul>
  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>


<!--Start Mobile Nav-->
<button class="mobile-menu-toggler" type="button">
    <i class="fas fa-stream"></i>
</button>
<a class="navbar-brand mobile-logo" href="index.php"><img src="{{asset('assets/images/logo.png')}}"class="w-100"></a>
            
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fas fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active"><a href="index.php">{{ __('site.nav_1') }}</a></li>
                <li class="right-arrow-parent">
                    <a href="#"> {{ __('site.nav_2') }}</a><i class="fas fa-angle-double-right"></i>
                    <ul>
                        <li><a href="{{url('/cloud')}}"> Cloud Services </a></li>
                        <li><a href="{{url('/it-infrastructure')}}"> IT Infrastructure</a></li>
                        <li class="right-arrow-parent">
                            <a href="#"> IT Service Management</a> <i class="fas fa-angle-double-right"></i>
                            <ul>
                                <li><a href="#">End User Support (SD)</a></li>
                                <li><a href="#">IVR Call Center</a></li>
                                <li class="right-arrow-parent">
                                    <a href="#">HW Management &amp; Maintenance </a> <i class="fas fa-angle-double-right"></i>
                                    <ul>
                                        <li><a href="#">Equipment Relocation</a></li>
                                        <li><a href="#">schedule maintenance</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Backup &amp; Recovery</a></li>
                                <li><a href="#">Remote Support</a></li>                                           
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="right-arrow-parent">
                    <a href="#">{{ __('site.nav_4') }}</a><i class="fas fa-angle-double-right"></i>
                    <ul>
                        <li><a href="{{url('/erp')}}"> ERP / GRP </a></li>
                        <li><a href="{{url('/crm')}}"> CRM </a></li>
                        <li><a href="{{url('/website')}}"> BUSSNISS WEBSITE </a></li>
                        <li><a href="{{url('/mobile')}}"> Mobile apps </a></li>                                           
                    </ul>
                </li>
                <li> <a href="{{url('/products')}}">{{ __('site.nav_6') }}</a> </li>
                <li><a href="#">{{ __('site.nav_3') }}</a></li>
                <li class="right-arrow-parent">
                    <a href="#">{{ __('site.nav_5') }}</a><i class="fas fa-angle-double-right"></i>
                    <ul>
                        <li><a href="{{url('/oracle')}}"> Oracle Product </a></li>
                        <li><a href="{{url('/wso2')}}"> WSO2 </a></li>
                        <li><a href="#"> .net </a></li>                                         
                    </ul>
                </li>
                <li> <a href="{{url('/careers')}}">{{ __('site.nav_7') }}</a> </li>
                <li> <a href="{{url('/contact')}}">{{ __('site.nav_8') }}</a> </li>
                <li> <a href="{{url('/Customer-support')}}">{{ __('site.nav_9') }}</a> </li>
                <li class="right-arrow-parent mob-langs">
                    <a href="#"> @if(Session::has('language'))

                                        @php
                                       echo DB::table('languages')->where('id','=',Session::get('language'))->first()->language ;

                                        @endphp


                                    @else
                                        @php
                                        echo  DB::table('languages')->where('is_default','=',1)->first()->language
                                        @endphp
                                   @endif</a><i class="fas fa-angle-double-right"></i>
                    <ul>
                        	@foreach(DB::table('languages')->get() as $language)
                        <li><a href="{{route('front.language',$language->id)}}"> <img @if($language->sign == 'ar')  src="assets/images/sa.svg"  alt="SA Flag"   @else src="assets/images/gb.svg" alt="England Flag" @endif> {{$language->language}} </a></li>
                      <!--  <li><a href="https://raqmita.it/mobile"> <img > English </a></li>    --> 
                        		@endforeach
                    </ul>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!--End Mobile Nav-->  