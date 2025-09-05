<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	@php 




  $ps = App\Models\Pagesetting::find(1);
  

   @endphp








    @if(isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -
                @if($langg->rtl == 1 )
                    {{$gs->title_ar}}
                @else
                    {{$gs->title}}
                @endif
            </title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">

    @elseif(isset($productt))

        <meta name="keywords" content="{{ !empty($productt->meta_tag) ? implode(',', $productt->meta_tag ): '' }}">
        <meta name="description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}">
        <meta property="og:title" content="{{$productt->name}}" />
        <meta property="og:id" content="{{$productt->id}}" />
        <meta property="og:description" content="{{ $productt->meta_description != null ? $productt->meta_description : strip_tags($productt->description) }}" />
        <meta property="og:image" content="{{asset('assets/images/products/'.$productt->photo)}}" />
        <meta name="author" content="{{$gs->title}}">
        <title>
                @if($langg->rtl == 1 )
                    {{substr($productt->name_ar, 0,20)."-"}}{{$gs->title_ar}}
                @else
                    {{substr($productt->name, 0,11)."-"}}{{$gs->title}}
                @endif -
                    @if($langg->rtl == 1 )
                        {{$gs->title_ar}}
                    @else
                        {{$gs->title}}
                    @endif
         </title>
    @else

        <meta name="+author" content="{{$gs->title}}">
       <title>
           @yield('title')
       </title>
    @endif

    @if(isset($seo->product_analytics ))

        @yield('prod_seo')


    @endif






    @if(isset($seo->meta_keys))


        @if($langg->rtl == 1 )
            <meta name="keywords" content="{!! $seo->meta_keys_ar !!}">
        @else
            <meta name="keywords" content="{{ $seo->meta_keys }}">
        @endif



    @endif


    @if(isset($seo->meta_description))


        @if($langg->rtl == 1 )
            <meta name="description" content="{{ $seo->meta_description_ar != null ? $seo->meta_description_ar : strip_tags($productt->description_ar) }}">
        @else
            <meta name="description" content="{{ $seo->meta_description != null ? $seo->meta_description : strip_tags($seo->description) }}">
        @endif



    @endif

@if(isset($seo->google_analytics))
          
        {!! $seo->google_analytics !!}

   @endif


           <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{asset('assets/images/'.$gs->logo)}}"
    }
    </script>
<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{$gs->title}}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{asset('assets/images/'.$gs->logo)}}",
      "logo": "{{asset('assets/images/'.$gs->logo)}}",
      "sameAs": ["{{ App\Models\Socialsetting::find(1)->facebook }}", "{{ App\Models\Socialsetting::find(1)->twitter }}", "{{ App\Models\Socialsetting::find(1)->instagram }}"],
    "telephone": "{{$ps->phone}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "{{$ps->street}}",
      "addressLocality": "{{$ps->street_ar}}",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>






    {!! $seo->facebook_pixel !!}


     	@yield('gsearch')
          <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">
	<!-- favicon -->
	<link rel="icon"  type="image/x-icon" href="{{asset('assets/images/'.$gs->favicon)}}"/>
	<!-- bootstrap -->
	





@yield('css')


    <style>
        .social:hover{
            color: #fcb01b;

        }

        #mask {
            position:absolute;
            left:0;
            top:0;
            z-index:9000;
            background-color:#26262c;
            display:none;
        }
        #boxes .window {
            position:absolute;
            left:0;
            top:0;
            width:440px;
            height:850px;
            display:none;
            z-index:9999;
            padding:20px;
            border-radius: 5px;
            text-align: center;
        }
        #boxes #dialog {
            width:450px;
            height:auto;
            padding: 10px 10px 10px 10px;
            background-color:#ffffff;
            font-size: 15pt;
        }

        .agree:hover{
            background-color: #D1D1D1;
        }
        .popupoption:hover{
            background-color:#D1D1D1;
            color: green;
        }
        .popupoption2:hover{
            color: red;
        }
    </style>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/magnific-popup/magnific-popup.min.css')}}">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('css/theme-shop.css')}}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{asset('vendor/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/rs-plugin/css/navigation.css')}}">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{asset('css/demos/demo-medical.css')}}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('css/skins/skin-medical.css')}}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!-- Head Libs -->
    <script src="{{asset('vendor/modernizr/modernizr.min.js')}}"></script>

</head>
<body>

<div class="body">

    <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-top-0">
            <div class="header-top header-top-default header-top-borders border-bottom-0">
                <div class="container h-100">
                    <div class="header-row h-100">
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <nav class="header-nav-top">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item nav-item-borders py-2 d-none d-sm-inline-flex">
                                            <span class="pl-0"><i class="far fa-dot-circle text-4 text-color-primary" style="top: 1px;"></i> 1234 Street Name, City Name</span>
                                        </li>
                                        <li class="nav-item nav-item-borders py-2">
                                            <a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary" style="top: 0;"></i> 123-456-7890</a>
                                        </li>
                                        <li class="nav-item nav-item-borders py-2 pr-1 d-none d-md-inline-flex">
                                            <a href="mailto:mail@domain.com"><i class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i> mail@domain.com</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="demo-medical.html">
                                    <img alt="RENT"  src="{{asset('assets/images/'.$gs->logo)}}" style="width: 200px;height: 125px;">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link active" href="demo-medical.html">
                                                    Home
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="demo-medical-about-us.html">
                                                    About Us
                                                </a>
                                            </li>
                                            <li class="dropdown dropdown-full-color dropdown-secondary">
                                                <a class="nav-link dropdown-toggle" class="dropdown-toggle" href="demo-medical-departments.html">
                                                    Departments
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Cardiology</a></li>
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Gastroenterology</a></li>
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Pulmonology</a></li>
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Dental</a></li>
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Gynecology</a></li>
                                                    <li><a class="dropdown-item" href="demo-medical-departments-detail.html">Hepatology</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="demo-medical-doctors.html">
                                                    Doctors
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="demo-medical-resources.html">
                                                    Resources
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="demo-medical-insurance.html">
                                                    Insurance
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="demo-medical-contact.html">
                                                    Contact
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div role="main" class="main">


    @if($gs->is_popup== 1)



        @if(isset($visited))


            <div id="boxes">
                <div style="top: 50%; left: 50%; display: none;" id="dialog" class="window">
                    <div id="san">
                        <a href="#" class="close agree"><img src="{{asset('assets/images/close-icon.png')}}" width="25" style="float:right; margin-right: -25px; margin-top: -20px;"></a>
                        <img src="{{asset('assets/images/'.$gs->popup_background)}}" width="450">
                    </div>
                </div>
                <div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>
            </div>



            @endif

            @endif



    @yield('content')


        <footer id="footer" class="m-0">
            <div class="container">
                <div class="row pt-5 pb-4">
                    <div class="col-md-4 col-lg-3 mb-2">
                        <h4 class="mb-4">Location</h4>
                        <p>
                            Porto Medical<br>
                            123 Porto Blvd, Suite 100<br>
                            New York, NY<br>
                            Phone : 123-456-7890
                        </p>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <h4 class="mb-4">Opening Hours</h4>
                        <div class="info custom-info">
                            <span>Mon-Fri</span>
                            <span>8:30 am to 5:00 pm</span>
                        </div>
                        <div class="info custom-info">
                            <span>Saturday</span>
                            <span>9:30 am to 1:00 pm</span>
                        </div>
                        <div class="info custom-info">
                            <span>Sunday</span>
                            <span>Closed</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="contact-details">
                            <h4 class="mb-4">Emergency Cases</h4>
                            <a class="text-decoration-none" href="tel:1234567890">
                                <strong class="font-weight-light">(800)123-4567</strong>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 text-md-center text-lg-left ml-lg-auto">
                        <h4 class="mb-4">Social Media</h4>
                        <ul class="social-icons">
                            <li class="social-icons-facebook">
                                <a href="http://www.facebook.com/" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="social-icons-twitter">
                                <a href="http://www.twitter.com/" target="_blank" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="social-icons-linkedin">
                                <a href="http://www.linkedin.com/" target="_blank" title="Linkedin">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright pt-3 pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center m-0">
                            <p>© Copyright 2018. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

<!-- Vendor -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/jquery.appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
<script src="{{asset('vendor/popper/umd/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendor/common/common.min.js')}}"></script>
<script src="{{asset('vendor/jquery.validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{asset('vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
<script src="{{asset('vendor/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('vendor/vide/jquery.vide.min.js')}}"></script>
<script src="{{asset('vendor/vivus/vivus.min.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('js/views/view.contact.js')}}"></script>

<!-- Demo -->
<script src="{{asset('js/demos/demo-medical.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('js/theme.init.js')}}"></script>



<script type="text/javascript">
  var mainurl = "{{url('/'.$sign)}}";
   var mainurl2 = "{{url('/')}}";
  var gs      = {!! json_encode($gs) !!};
  var langg    = {!! json_encode($langg) !!};
  var mainurl2 = "{{url('/')}}";

</script>
<script type="text/javascript">

    (function () {
 var whatsappNum = {{$ps->w_phone}}; 
        var whatsappNumToString = '"'+whatsappNum+'"';
        var options = {
            facebook: '{{$ps->page_id}}' , // Facebook page ID
  whatsapp: whatsappNumToString, // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#fcb01b", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();


</script>


   {!! $seo->google_analytics !!}

  @if($gs->is_talkto == 1)
    <!--Start of Tawk.to Script-->
      {!! $gs->talkto !!}
    <!--End of Tawk.to Script-->
  @endif 
  @if($gs->is_drift == 1)
    <!--Start of drift.to Script-->
      {!! $gs->drift !!}
    <!--End of drift.to Script-->
  @endif 
  @if($gs->is_messenger == 1)
    <!--Start of drift.to Script-->
      {!! $gs->messenger !!}
    <!--End of drift.to Script-->
  @endif


	@yield('js')

</body>

</html>