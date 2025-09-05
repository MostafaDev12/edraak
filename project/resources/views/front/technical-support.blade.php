@include ("layouts/header")
<style>

#image-preview{

    height: 124px !important;
    width: 124px !important;
    background-repeat: no-repeat !important;
    background-size: 124px !important;
}



</style>
<main class="bg-tech">
    <!-- Start Header -->
    <div class="career-header header technical-support-header">
    </div>  
    <div class="tech-support">
        <div class="container">
            <div class="tech-support-form">
                <form class="w-100" id="email-form" action="{{route('front.support.submit')}}" method="POST" >
                    {{csrf_field()}}
                    <div class="form-group w-100" style="background-color: #ddb6b6;">
                        <div class="response w-100"></div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control fname" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-3">
                            <input type="email" name="email" class="form-control email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-lg-4 col-md-12 mb-3">
                            <select class="custom-select form-control mb-3" name="country" required>

                                <option value="">Select Country</option>
                                @foreach (DB::table('countries')->where('status',1)->get() as $data)
                                    <option value="{{ $data->country_name }}">{{$langg->rtl == 1 ? $data->name_ar : $data->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-12 mb-3">
                            <select class="custom-select form-control mb-3" name="city" required>

                                <option value="">Select City</option>


                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Company" name="company" required>
                        </div>

                        <!-- <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Website">
                        </div> -->
                    </div>
                    <div class="form-row">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="job_role" id="" class="form-control" required>
                                <option value="">Job Role</option>

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
                        <!-- <div class="col-lg-4 col-md-6 mb-3">
                            <select name="industry" id="" class="form-control">
                                <option value="">Industry</option>
                                <option value="">Travel & Hospitality</option>
                                <option value="">Retail & E-commerce</option>
                                <option value="">Technology</option>
                                <option value="">Media & Entrainment</option>
                                <option value="">Other</option>
                            </select>
                        </div> -->
                        <div class="col-lg-4 col-md-12 mb-3">
                            <input type="text" id="phone" name="phone" class="form-control mb-3" required>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="program" id="" class="form-control" required>
                                <option value="">Program</option>
                                @foreach (DB::table('programs')->where('status',1)->get() as $data)
                                    <option value="{{ $data->name }}">{{$langg->rtl == 1 ? $data->name_ar : $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="page" id="" class="form-control" required>
                                <option value="11">Page</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col mb-3">
                            <textarea rows="5" name="message" id="" class="form-control" placeholder="Tell us more about your customer communication goals" required></textarea>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-lg-6 mb-3">
                            <input type="file" name="photo" class="form-control custom-file-input img-upload" required>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div id="image-preview" class="img-preview" style="background: url({{ asset('assets/images/upload.png') }});">
                             </div>
                        </div>



                    </div>
                    @if($gs->is_capcha == 1)

                        <ul class="captcha-area">
                            <li>
                                <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> {{----}}<i class="fas fa-sync-alt pointer refresh_code"></i></p>

                            </li>
                            <li>
                                <input name="codes" type="text" class="input-field" placeholder="{{ $langg->lang51 }}" required="">

                            </li>
                        </ul>

                    @endif
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" class="form-control py-3 submit-btn" value="Send">
                        </div>
                    </div>
                </form>
            </div>
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
      'de': 'Deutschland'
    });
</script>
<script>

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
            $('.career-loading').addClass('hide');
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
                $('#email-form .response').html('<div class="text-info">  Loading...</div>');
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
                     $('button.submit-btn').prop('disabled',false);
                        
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

    // IMAGE UPLOADING :)
    $(".img-upload").on( "change", function() {
        var imgpath = $('#image-preview');
        var file = $(this);
        readURL(this,imgpath);
    });

    function readURL(input,imgpath) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imgpath.css('background', 'url('+e.target.result+')');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    // IMAGE UPLOADING ENDS :)
</script>
<script>

    $(document).ready(function(){
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
 $("Select[name='program']").change(function(){

            var id= $(this).val();
            var url = "{{ url ('/pages')}}";
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {id:id, _token:token},
                success: function(data) {
                    $("[name='page']").html('');
                    $("[name='page']").html(data.options);

                }
            });
        });

    });



</script>