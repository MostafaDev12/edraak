


    <!-- Start Header -->
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

    <div class="careers">
        <div class="container contact-form">


      
        <div class="row">
               

                @forelse($products as $key=>$product)
                <div class="col-lg-4 col-md-3 mb-4 mix">
                                    <div class="product-box">
                                       <div class="media">
                                                <img class="mr-3" src="{{asset('assets/images/products/'.$product->icon_photo)}}" alt="{{$product->name}}">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$product->name}}</h5>
                                                
                                                </div>
                                            </div>
                                      
                                    </div>
                                </div>
                                
                @empty
                <div class="col-lg-12 col-md-12 mb-4 mix " style="text-align: center;">
                       No Products Selected
                </div>

                @endforelse
               </div>
          <table>
              <tr>
                  <th>subscribe title : </th>
                  <td>{{$all_data['sub_title']}}</td>
              </tr> <tr>
                  <th>type : </th>
                  <td>{{$all_data['sub_type']}}</td>
              </tr> <tr>
                  <th>name : </th>
                  <td>{{$all_data['name']}}</td>
              </tr> <tr>
                  <th>phone : </th>
                  <td>{{$all_data['phone']}}</td>
              </tr> <tr>
                  <th>email : </th>
                  <td>{{$all_data['email']}}</td>
              </tr> <tr>
                  <th>city : </th>
                  <td>{{$all_data['city']}}</td>
              </tr> <tr>
                  <th>country : </th>
                  <td>{{$all_data['country']}}</td>
              </tr> <tr>
                  <th>website : </th>
                  <td>{{$all_data['website']}}</td>
              </tr> <tr>
                  <th>industry : </th>
                  <td>{{$all_data['industry']}}</td>
              </tr> <tr>
                  <th>job_role : </th>
                  <td>{{$all_data['job_role']}}</td>
              </tr><tr>
                  <th>customers : </th>
                  <td>{{$all_data['customers']}}</td>
              </tr><tr>
                  <th>message : </th>
                  <td>{{$all_data['message']}}</td>
              </tr>
          </table>      
         
        </div>
    </div>





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
    <script src="{{asset('assets/js/main.js')}}"></script>

