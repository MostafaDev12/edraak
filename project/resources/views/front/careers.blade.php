@include ("layouts/header")


<!-- Apply Now Modal -->
{{--<div class="modal fade campaigns_modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">

</div>--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<main class="bg-career">
<!-- Notification After Applying -->

    <!-- Start Header -->
    <div class="career-header header">
        <div class="overlay">
            <h2>Available Careers</h2>
        </div>
    </div>  
    <div class="careers">
        <div class="row m-0">
            <div class="col-lg-2 col-md-3">
                <h4 class="mb-4 filter-by">Filter by</h4>



                @if (!empty($cat) && !empty(json_decode($cat->attributes, true)))
                @foreach ($cat->attributes as $key => $attr)
                <!-- Start Filter Group -->
                <div class="filter-group mb-3">
                    <h3 class="filter-group-head d-flex justify-content-between"><span>{{$langg->rtl == 1 ? $attr->name_ar : $attr->name}}</span> <span><i class="fas fa-chevron-down"></i></span></h3>
                    <div class="show-hidden-filtering">
                        @if (!empty($attr->attribute_options))
                            @foreach ($attr->attribute_options as $key => $option)
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="{{$attr->input_name}}{{$option->id}}">{{$langg->rtl == 1 ? $option->name_ar : $option->name}}</label>
                               {{-- <span>(15)</span>--}}
                            </div>
                            <div>
                                <input class="form-check-input m-0 attribute-input" type="checkbox" id="{{$attr->input_name}}{{$option->id}}" value="{{$option->name}}" name="{{$attr->input_name}}[]" >
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endforeach
                @endif


            </div>


            <div class="col-lg-10 col-md-9" id="ajaxContent">



                    @include('includes.product.filtered-products')



            </div>
        </div>
    </div>
</main>
@include ("layouts/footer")
<script src="assets/js/intlTelInput.js"></script>
<script >
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "assets/js/utils.js",
    });

        $(function () {
//        $('input').on('keyup change', function () {
//            $("#"+ $(this).attr("name")).text($(this).val());
//            console.log($(this).val());
//        });
        $('select').on('change', function () {
            $("#"+ $(this).attr("name")).text($(this).children("option:checked").val());
        });
    });
// Career Form
var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementsByClassName("campaigns_modal").style.display = "none";
      console.log("LAST");    
      $('.career-loading').removeClass('hide');
      document.getElementById("regForm").submit();
  
      
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    yy = x[currentTab].getElementsByTagName("select");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    for (i = 0; i < yy.length; i++) {
      // If a field is empty...
      if (yy[i].value == "") {
        // add an "invalid" class to the field:
        yy[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
</script>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$( function() {
    $( "#datepicker" ).datepicker();
} );
</script>

<script>

    $(document).ready(function() {

        // when dynamic attribute changes
        $(".attribute-input, #sortby").on('change', function() {
            $("#ajaxLoader").show();
            filter();
        });

        // when price changed & clicked in search button
        $(".filter-btn").on('click', function(e) {
            e.preventDefault();
            $("#ajaxLoader").show();
            filter();
        });
    });

    function filter() {
        let filterlink = '';



        $(".attribute-input").each(function() {
            if ($(this).is(':checked')) {
                if (filterlink == '') {
                    filterlink += '{{route('front.careers')}}' +'?'+$(this).attr('name')+'='+$(this).val();
                } else {
                    filterlink += '&'+$(this).attr('name')+'='+$(this).val();
                }
            }
        });

      if ($("#sortby").val() != '') {
            if (filterlink == '') {
                filterlink += '{{route('front.careers')}}' + '?'+$("#sortby").attr('name')+'='+$("#sortby").val();
            } else {
                filterlink += '&'+$(".sortby").data('name')+'='+$(".sortby").data('value');
            }
        }



        // console.log(filterlink);
        console.log(encodeURI(filterlink));
        $("#ajaxContent").load(encodeURI(filterlink), function(data) {
            // add query string to pagination
            addToPagination();
            $("#ajaxLoader").fadeOut(1000);
        });
    }

    // append parameters to pagination links
    function addToPagination() {
        // add to attributes in pagination links
        $('ul.pagination li a').each(function() {
            let url = $(this).attr('href');
            let queryString = '?' + url.split('?')[1]; // "?page=1234...."

            let urlParams = new URLSearchParams(queryString);
            let page = urlParams.get('page'); // value of 'page' parameter

            let fullUrl = '{{route('front.careers')}}?page='+page+'&search='+'{{request()->input('search')}}';

            $(".attribute-input").each(function() {
                if ($(this).is(':checked')) {
                    fullUrl += '&'+encodeURI($(this).attr('name'))+'='+encodeURI($(this).val());
                }
            });

            if ($("#sortby").val() != '') {
                fullUrl += '&sort='+encodeURI($("#sortby").val());
            }



            $(this).attr('href', fullUrl);
        });
    }

    $(document).on('click', '.categori-item-area .pagination li a', function (event) {
        event.preventDefault();
        if ($(this).attr('href') != '#' && $(this).attr('href')) {
            $('#preloader').show();
            $('#ajaxContent').load($(this).attr('href'), function (response, status, xhr) {
                if (status == "success") {
                    $('#preloader').fadeOut();
                    $("html,body").animate({
                        scrollTop: 0
                    }, 1);

                    addToPagination();
                }
            });
        }
    });

</script>


<script>

    $(document).on('click', 'button.edit_campaigns_button', function() {
        $('div #exampleModal').load($(this).data('href'), function() {
            $(this).modal('show');

            $('form#campaigns_edit_form').submit(function(e) {
                e.preventDefault();
                $(this)
                        .find('button[type="submit"]')
                        .attr('disabled', true);
                var data = $(this).serialize();

                $.ajax({
                    method: 'POST',
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: data,
                    success: function(result) {
                        if (result.success == true) {
                            $('div.campaigns_modal').modal('hide');
                            toastr.success(result.msg);
                            // window.location.reload();

                        } else {
                            toastr.error(result.msg);
                        }
                    },
                });
            });
        });
    });

    toastr.options = {
        "closeButton": true,
        "debug": true,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

        @if(Session::has('out'))
        
           toastr["success"]('Applied for job success');
            Swal.fire({
                        //  position: 'top-end',
                          icon: 'success',
                          title: 'Applied for job success',
                          showConfirmButton: false,
                          timer: 3000
                        });
         @endif
  @if(Session::has('error'))
        
            Swal.fire({
                        //  position: 'top-end',
                          icon: 'error',
                          title: 'something went Wrong Try Again',
                          showConfirmButton: false,
                          timer: 3000
                        });
         @endif

</script>