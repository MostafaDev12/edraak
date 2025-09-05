@include ("layouts/header")

<main style="background-color: #fbfbfb;">
    <!-- Start Header -->
    <div class="career-header header">
        <div class="overlay">
            <h2>Products</h2>
        </div>
    </div>  
  
    <div class="careers tech-support">
        <div class="container">


      
        <div class="row">
               

                @forelse($products as $key=>$product)
                <div class="col-lg-4 col-md-3 mb-4 mix c{{$product->category_id}}">
                                    <div class="product-box">
                                        <a href="#">
                                        
                                            <div class="media">
                                                <img class="mr-3" src="{{asset('assets/images/products/'.$product->icon_photo)}}" alt="{{$product->name}}">
                                                <div class="media-body">
                                                    <h5 class="mt-0">{{$langg->rtl == 1 ? $product->name_ar  : $product->name}}</h5>
                                                
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                @empty
                <div class="col-lg-12 col-md-12 mb-4 text-danger font-weight-bold" style="text-align: center;">
                                No Products Selected
                </div>

                @endforelse
               </div>
                
           
            <form class="w-100 tech-support-form" id="email-form" action="{{route('front.product.submit')}}" method="POST" >
                {{csrf_field()}}
                <input type="hidden" name="selected_products" value="{{$selected_products_string}}" id="selected_products">
                <input type="hidden" name="sub_title" value="{{$sub->title ?? 'free Trial'}}" id="sub_title">
                <input type="hidden" name="sub_id" value="{{$sub->id ?? ''}}" id="sub_id">
                <input type="hidden" name="sub_type" value="{{$sub->type ?? 'free Trial'}}" id="sub_type">
                <div class="form-group w-100" style="background-color: #ddb6b6;">
                    <div class="response w-100"></div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name:*</label>
                        <input type="text" name="first_name" class="form-control mb-3 fname" placeholder="First Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name:*</label>
                        <input type="text" name="last_name" class="form-control mb-3" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Email:*</label>
                        <input type="email" name="email" class="form-control mb-3 email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Country:*</label>
                        <select class="form-control mb-3" name="country" required>

                            <option value="">Select Country</option>
                            @foreach (DB::table('countries')->get() as $data)
                            <option value="{{ $data->country_name }}">{{$langg->rtl == 1 ? $data->name_ar : $data->country_name }}</option>
                              @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>City:*</label>
                        <select class="form-control mb-3" name="city" required>

                                <option value="">Select City</option>


                            </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company:*</label>
                        <input type="text" name="company" class="form-control mb-3" placeholder="Company" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Website:</label>
                        <input type="text" name="website" class="form-control mb-3" placeholder="Website">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Industry:*</label>
                        <select name="industry" class="form-control mb-3" required>
                            <option value="Industry">Industry</option>
                            <option value="Travel & Hospitality">Travel & Hospitality</option>
                            <option value="Retail & E-commerce">Retail & E-commerce</option>
                            <option value="Technology">Technology</option>
                            <option value="Media & Entrainment">Media & Entrainment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Job Role:*</label>
                        <select name="job_role" class="form-control mb-3"  required>
                            <option value="">Please Select</option>
                            <option value="CEO / CTO / CMO / Exec">CEO / CTO / CMO / Exec</option>
                            <option value="Products - Dir / Bip">Products - Dir / Bip</option>
                            <option value="Developer">Developer</option>
                            <option value="Marketing - Team Member">Marketing - Team Member</option>
                            <option value="Sales">Sales</option>
                            <option value="Support">Support</option>
                            <option value="Finance">Finance</option>
                            <option value="Operations">Operations</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mobile Phone:*</label>
                        <input id="phone" name="phone" class="form-control mb-3" type="tel" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Monthly Contacted Customers:*</label>
                        <select name="customers" class="form-control mb-3"  required>
                            <option value="Less than 100.000">Less than 100.000</option>
                            <option value="100K - 300K">100K - 300K</option>
                            <option value="300K - 1M">300K - 1M</option>
                            <option value="Greater than 1M">Greater than 1M</option>
                        </select>
                    </div> 
                </div>
                <div class="form-row">
                    <label>Tell us more about your customer  communication goals</label>
                    <textarea rows="5" class="form-control mb-3" name="message" required placeholder="Message *"></textarea>
                </div>
               {{-- <div class="form-row">
                    <div class="form-check">
                        <input type="checkbox" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>--}}
                @if($gs->is_capcha == 1)

                    <ul class="captcha-area list-unstyled">
                        <li>
                            <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> {{----}}<i class="fas fa-sync-alt pointer refresh_code"></i></p>

                        </li>
                        <li>
                            <input name="codes" type="text" class="input-field form-control" placeholder="{{ $langg->lang51 }}" required="">

                        </li>
                    </ul>

                @endif
                <div class="form-row mt-3">
                        <input type="submit" class="form-control py-3 submit-btn" value="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>




</main>
@include ("layouts/footer")
<script src="assets/js/intlTelInput.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "assets/js/utils.js",
    });
</script>

<script>
    /*  @if(empty($sub))                  
      window.location.href = "{{route('front.products')}}";
      
      @endif*/
                      
    $(document).on('submit','#email-form',function(e){
        e.preventDefault();
        $('.gocover').show();
         $('.career-loading').removeClass('hide');
      //  $('.submit-btn').prop('disabled',true);
        var name = $('.fname').val();

        var email = $('.email').val();

        if(name == '' || email == '') {
            $('#email-form .response').html('<div class="failed alert alert-warning">Please fill the required fields.</div>');
            $('button.submit-btn').prop('disabled',false);
            return false;
        }

        $.ajax({
            method:"POST",
            url:$(this).prop('action'),
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                $('#email-form .response').html('<div class="text-info"><img style="width: 34px" src="{{asset('assets/images/preloader.gif')}}"> Loading...</div>');
                console.log(1);
            },
            success:function(data)
            {
                console.log(2);
                if ((data.errors)) {
                    $('.career-loading').addClass('hide');
                    console.log(3);
                    $('.alert-success').hide();
                    $('.alert-danger').show();
                    $('#email-form .response').html('');
                    for(var error in data.errors)
                    {
                        console.log(4);
                        $('#email-form .response').append('<li>'+ data.errors[error] +'</li>')
                    }
                    $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').eq(0).focus();
                    $('#email-form .refresh_code').trigger('click');
                      $('button.submit-btn').prop('disabled',false);
                }
                else
                {
                   $('.career-loading').addClass('hide');
                    console.log(5);
                    $('.alert-danger').hide();
                    $('.alert-success').show();
                    $('#email-form .response').html('<div class=" alert alert-success">'+data+'</div>');
                    
                        Swal.fire({
                        //  position: 'top-end',
                          icon: 'success',
                          title: data,
                          showConfirmButton: false,
                          timer: 2500
                        });
                    $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').eq(0).focus();
                    $('#email-form input[type=text], #email-form input[type=email], #email-form textarea').val('');
                    $('#email-form .refresh_code').trigger('click');
                   // $('.alert-success span').html(data);
                }
                console.log(6);
                $('.gocover').hide();
                $('button.submit-btn').prop('disabled',false);
                 $('.career-loading').addClass('hide');
            }

        });

    });


    $('.refresh_code').on( "click", function() {
      //  var mainurl = 'https://localhost/edraak' ;
        var mainurl = window.location.origin ;
        $.get(mainurl+'/contact/refresh_code', function(data, status){
            $('.codeimg1').attr("src",mainurl+"/assets/images/capcha_code.png?time="+ Math.random());
        });
    })
    
        $("Select[name='country']").change(function(){

            var id= $(this).val();
            var url = "{{ url ('/cities')}}";
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {id:id, _token:token},
                success: function(data) {
                    $("[name='city']").html('');
                    $("[name='city']").html(data.options);

                }
            });
        });
</script>