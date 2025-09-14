
    <!--Start Scroll Top-->
    <i class="scroll-top fas fa-chevron-up fa-2x"></i>
    <!--End Scroll Top-->

    <!-- Start Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/images/white-logo.png')}}">
                    </a>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor, voluptates repellendus Dolor, voluptates repellendus Dolor, voluptates repellendus</p>
                    <form action="{{route('front.subscribe')}}" id="subscribeform" method="POST">
                          {{csrf_field()}}
                     
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                        <button id="sub-btn"><i class="fas fa-paper-plane"></i></button> 
                        <div class="response" style="background-color: #ee7d7d;border-radius: 12%;"></div>
                    </form>
                </div>
                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/products')}}">{{ __('site.nav_6') }}</a></li>
                        <li><a href="#">Our Clients</a></li>
                        <li><a href="{{url('/careers')}}">{{ __('site.nav_7') }}</a></li>
                        <li><a href="{{url('/Customer-support')}}">{{ __('site.nav_9') }}</li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-6 mb-4">
                    <h3>Solutions</h3>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/erp')}}"> ERP / GRP </a></li>
                        <li><a href="{{url('/crm')}}"> CRM </a></li>
                        <li><a href="{{url('/website')}}"> BUSSNISS WEBSITE </a></li>
                        <li><a href="{{url('/mobile')}}"> Mobile apps </a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h3>Contact Info</h3>
                    <ul class="list-unstyled info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i> {{ __('site.address') }}
                        </li>
                        <li>
                            <a href="mailto:info@raqmita.it"><i class="far fa-envelope-open"></i> info@raqmita.it</a>
                        </li>
                        <li>
                        <a href="tel:+966538551748 "><i class="fas fa-phone"></i> +966 538551748 </a>
                        </li>
                        <li class="social-media mt-4">
                            <a href="https://www.facebook.com/raqmitait/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/raqmitaIT" target="_blank"><i class="fab fa-twitter-square"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=+966538551748" target="_blank"><i class="fab fa-whatsapp-square"></i></a>
                            <a href="https://www.linkedin.com/company/raqmitait/" target="_blank"><i class="fab fa-linkedin-square"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Loader -->
    {{-- <div id = "loading" style="font-size: 12px">
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_ot1byxbn.json"  background="transparent"  speed="1" style="width: 500px;height: 500px;margin: auto;"   loop autoplay></lottie-player>
    </div> --}}

    <script>
  window.addEventListener('load', function () {
    document.querySelector('.career-loading').classList.add('hide');
  });
</script>
    <script>
    var loading = document.getElementById("loading");
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                loading.style.visibility = "visible";
            } else {
                loading.classList.add("fadeOutLoading");
            }
        };
        
        
        
    
    </script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-nav.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/lity.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script> -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
          $(document).on('submit','#subscribeform',function(e){
      e.preventDefault();
         $('.career-loading').removeClass('hide');
        $('#sub-btn').prop('disabled',true);
          $.ajax({
           method:"POST",
           url:$(this).prop('action'),
           data:new FormData(this),
           contentType: false,
           cache: false,
           processData: false,
           success:function(data)
           {
              if ((data.errors)) {

             $('#subscribeform .response').html('');
                $('.career-loading').addClass('hide');
                 $('#sub-btn').prop('disabled',false); 
              for(var error in data.errors) {
                 // toastr.error(langg.subscribe_error);
                $('#subscribeform .response').append('<li>This Email already Subscribed  </li>')
                } 
                 
              }
              else {
                 
                 $('.career-loading').addClass('hide');
                 $('#sub-btn').prop('disabled',false); 
                   Swal.fire({
                        //  position: 'top-end',
                          icon: 'success',
                          title: 'You Have Subscribed Successfully.',
                          showConfirmButton: false,
                          timer: 2500
                        });
                       $('#subscribeform .response').html('');
               //  toastr.success(langg.subscribe_success); 
              }
                $('.career-loading').addClass('hide');
              $('#sub-btn').prop('disabled',false);


           }

          });

    });    
    </script>
</body>
</html>