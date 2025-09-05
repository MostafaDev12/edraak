<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{!! $langg->rtl == 1 ? $career->name : $career->name_ar !!}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="regForm" action="{{action('Front\FrontendController@applied_job')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <input type="hidden" name="career_id" value="{{$career->id}}">
                <input type="hidden" name="career_name" value="{{$career->name}}">
                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h4>Contact Info:</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input placeholder="Full Name" class="form-control" oninput="this.className = ''" name="name">                            </div>
                        <div class="col-md-6 mb-3">
                            <input placeholder="E-mail" class="form-control" oninput="this.className = ''" name="email" type="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input id="phone"class="form-control" oninput="this.className = ''" name="phones" type="number" style="padding-left: 52px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input placeholder="Address" class="form-control" oninput="this.className = ''" name="address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <select class="custom-select d-block w-100" oninput="this.className = ''" name="country" required>
                                <option value=" ">Select Country</option>
                                @foreach (DB::table('countries')->where('status',1)->get() as $data)
                                    <option value="{{ $data->country_name }}">{{$langg->rtl == 1 ? $data->name_ar : $data->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <select class="custom-select d-block w-100" oninput="this.className = ''" name="city" required>
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <h4>General Questions:</h4>
                    <div class="row">
                        <div class="col mb-3">
                            <label>Preferred start date</label>
                            <input type="text" id="datepicker" class="form-control pr-4 input" oninput="this.className = ''" name="start_date" autocomplete="off">
                            <span class="date-icon"><i class="fas fa-calendar-minus"></i></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label>Are you willing to relocate?</label>
                            <select class="custom-select d-block w-100" oninput="this.className = ''" name="relocate" required>
                                <option value="">...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <!-- <div class="d-flex align-items-center">
                                <input type="radio" oninput="this.className = ''" name="relocate">
                                <label class="mb-0 ml-2" for="yes">Yes</label>
                            </div> -->
                            <!-- <div class="d-flex align-items-center">
                                <input type="radio" oninput="this.className = ''" name="relocate">
                                <label class="mb-0 ml-2">No</label>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label>What are your salary expectaions?</label>
                            <input class="form-control" type="number" oninput="this.className = ''" name="salary_expectation">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label>How did you hear about this role</label>
                            <select class="custom-select d-block w-100" oninput="this.className = ''" name="hear_from">
                                <option value="">...</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Friends">Friends</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <h4>Voluntary self-identfication of military status</h4>
                    <div class="col mb-3">
                        <p>Are you ex-military?</p>
                        <select class="custom-select d-block w-100" oninput="this.className = ''" name="ex_military">
                            <option value="">...</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                            <option value="I prefer not to answer">I prefer not to answer</option>
                        </select>
                        <!-- <div class="d-flex align-items-center">
                            <input type="radio" oninput="this.className = ''" name="relocate">
                            <label class="mb-0 ml-2" for="yes">Yes</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" oninput="this.className = ''" name="relocate">
                            <label class="mb-0 ml-2">No</label>
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="radio" oninput="this.className = ''" name="relocate">
                            <label class="mb-0 ml-2">I prefer not to answer</label>
                        </div> -->
                    </div>
                </div>
                <div class="tab">
                    <h4>Resume:</h4>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="file" oninput="this.className = ''" name="resume" id="resume">
                        </div>
                    </div>
                </div>
                <div class="tab last-tab">
                    <input type="hidden" oninput="this.className = ''" name="validInput" value="valid">
                    <h4>Your Application</h4>
                    <div class="contact-info">
                        <h4>Contact Information</h4>
                        <hr>
                        Name: <span id="name"></span><br>
                        Email: <span id="email"></span><br>
                        Phone: <span id="phones"></span><br>
                        Country: <span id="country"></span><br>
                        City: <span id="city"></span><br>
                        Address: <span id="address"></span>
                    </div>
                    <div class="contact-info">
                        <h4>General Questions</h4>
                        <hr>
                        Start date: <span id="start_date"></span><br>
                        Are you willing to relocate: <span id="relocate"></span><br>
                        What are your salary expectaions?: <span id="salary_expectation"></span><br>
                        How did you hear about this role: <span id="hear_from"></span>
                    </div>
                    <div class="contact-info">
                        <h4>Voluntary self-identfication of military status</h4>
                        <hr>
                        Are you ex-military?: <span id="ex_military"></span><br>
                    </div>
                    <div class="contact-info">
                        <h4>Resume</h4>
                        <hr>
                        <span id="resume"></span><br>
                    </div>
                </div>
                <div style="overflow:auto;">
                    <div class="tab-btns" style="float:right;">
                        <button type="button" class="bg-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                   <span class="step"></span>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="assets/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
       $('input').on('keyup change', function () {
            $("#"+ $(this).attr("name")).text($(this).val());
           console.log($(this).val());
        });
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
           document.getElementById("regForm").submit();
            console.log('111');


       /*  //   var files = $('#resume').files;
            var form = $('form #regForm')[0];
          // var data = $('form#regForm').serialize();

                var data = new FormData(form);
            event.preventDefault();

            console.log(data);
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



            $.ajax({
                method: 'POST',
                url: '{{action('Front\FrontendController@applied_job')}}',
                dataType: 'json',
                data: data,
                processData: false,
                contentType: false,
                success: function(result) {
                    if (result.status == true) {
                        console.log('true');
                        $('div #exampleModal').modal('hide');
                        toastr["success"](result.msg);

                    } else {
                        toastr["error"]('try again later');
                    }
                },
            });*/
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }
    /*$(document).on('submit', 'form#regForm', function(e) {
        e.preventDefault();


    });*/
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
      });
</script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>