<?php
include "layouts/header.php";
?>
<!-- Apply Now Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Senior Laravel Developer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="regForm" action="">
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <h4>Contact Info:</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input placeholder="Full Name" class="form-control" oninput="this.className = ''" name="name">                            </div>
                            <div class="col-md-6 mb-3">
                                <input placeholder="E-mail" class="form-control" oninput="this.className = ''" name="email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input id="phone"class="form-control" oninput="this.className = ''" name="phones" type="tel">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input placeholder="Address" class="form-control" oninput="this.className = ''" name="address">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <select class="custom-select d-block w-100" oninput="this.className = ''" name="country" required>
                                    <option value="">Country</option>
                                    <option value="Ksa">KSA</option>
                                    <option value="Egypt">Egypt</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="custom-select d-block w-100" oninput="this.className = ''" name="city" required>
                                    <option value="">City</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Mansoura">Mansoura</option>
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
                                <input class="form-control" oninput="this.className = ''" name="salary-expectation">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label>How did you hear about this role</label>
                                <select class="custom-select d-block w-100" oninput="this.className = ''" name="hear-from">
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
                            <select class="custom-select d-block w-100" oninput="this.className = ''" name="ex-military">
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
                                <input type="file" oninput="this.className = ''" name="resume">
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
                            What are your salary expectaions?: <span id="salary-expectation"></span><br>
                            How did you hear about this role: <span id="hear-from"></span>
                        </div>
                        <div class="contact-info">
                            <h4>Voluntary self-identfication of military status</h4>
                            <hr>
                            Are you ex-military?: <span id="ex-military"></span><br>
                        </div>
                        <div class="contact-info">
                            <h4>Resume</h4>
                            <hr>
                            <span id="resume"></span><br>
                        </div>
                    </div>
                    <div style="overflow:auto;">
                        <div class="tab-btns" style="float:right;">
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
</div>  
<main class="bg-career">
<!-- Notification After Applying -->
<div class="alert alert-success fade show career-notify" role="alert">
  <span><strong>Holy guacamole!</strong> You should check in on some of those fields below.</span>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
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
                <!-- Start Filter Group -->
                <div class="filter-group mb-3">
                    <h3 class="filter-group-head d-flex justify-content-between"><span>Job Type</span> <span><i class="fas fa-chevron-down"></i></span></h3>
                    <div class="show-hidden-filtering">
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck1">Full Time</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck1">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck2">Part Time</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck2">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Filter Group -->
                <div class="filter-group mb-3">
                    <h3 class="filter-group-head d-flex justify-content-between"><span>Job Category</span> <span><i class="fas fa-chevron-down"></i></span></h3>
                    <div class="show-hidden-filtering">
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck3">Software Engineer</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck3">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck4">Full stack Developer</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck4">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck5">Back End Developer</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck5">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck6">Front End Developer</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck6">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Filter Group -->
                <div class="filter-group mb-3">
                    <h3 class="filter-group-head d-flex justify-content-between"><span>Locations</span> <span><i class="fas fa-chevron-down"></i></span></h3>
                    <div class="show-hidden-filtering">
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck7">Egypt</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck7">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck8">SUA</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck8">
                            </div>
                        </div>
                        <div class="form-check d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <label class="m-0" for="defaultCheck9">UAE</label>
                                <span>(15)</span>
                            </div>
                            <div>
                                <input class="form-check-input m-0" type="checkbox" value="" id="defaultCheck9">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9">
                <div class="filtering-result d-flex justify-content-between align-items-center mb-2">
                    <span>Showing 1 - 10 of 222 jobs</span>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sort by: <span>Most relevant</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="career-box">
                            <h3>Senior Laravel Developer</h3>
                            <p class='parg-icon'><i class="fas fa-calendar"></i> Full Time</p>
                            <p class='parg-icon'><i class="fas fa-map-marker-alt"></i> haram region</p>
                            <p class='parg-icon'><i class="fas fa-dollar-sign"></i> confidential</p>
                            <p class='parg-icon'><i class="fas fa-clock"></i> 2021-02-28</p>
                            <div class="show-career-details">Show All Details...</div>
                            <div class="hidden-career-info">
                                <h6>ِJob Summary</h6>
                                <p class="details">Coordinate the daily stock transfer in /out between the warehouses and stores and Opt...</p>
                                <h6>Responsibilities</h6>
                                <p class="details">Studying the turnover rates of the items and classification of spare parts based...</p>
                                <h6>Jop Requirement</h6>
                                <p class="details">Experience: at least 2 year in Automotive industry. - males only...</p>
                                <h6>Jop Benefits</h6>
                                <p class="details">Social Insurance - one days off “Frida...</p>
                                <div class="hide-career-details">See Less</div>
                            </div>    
                            <button href="#" class="alert more w-100" data-toggle="modal" data-target="#exampleModal">Apply Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="career-box">
                            <h3>Front End Engineer</h3>
                            <p class='parg-icon'><i class="fas fa-calendar"></i> Full Time</p>
                            <p class='parg-icon'><i class="fas fa-map-marker-alt"></i> haram region</p>
                            <p class='parg-icon'><i class="fas fa-dollar-sign"></i> confidential</p>
                            <p class='parg-icon'><i class="fas fa-clock"></i> 2021-02-28</p>
                            <div class="show-career-details">Show All Details...</div>
                            <div class="hidden-career-info">
                                <h6>ِJob Summary</h6>
                                <p class="details">Coordinate the daily stock transfer in /out between the warehouses and stores and Opt...</p>
                                <h6>Responsibilities</h6>
                                <p class="details">Studying the turnover rates of the items and classification of spare parts based...</p>
                                <h6>Jop Requirement</h6>
                                <p class="details">Experience: at least 2 year in Automotive industry. - males only...</p>
                                <h6>Jop Benefits</h6>
                                <p class="details">Social Insurance - one days off “Frida...</p>
                                <div class="hide-career-details">See Less</div>
                            </div>
                            <button href="#" class="alert more w-100" data-toggle="modal" data-target="#exampleModal">Apply Now</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="career-box">
                            <h3>HR Specialiest</h3>
                            <p class='parg-icon'><i class="fas fa-calendar"></i> Full Time</p>
                            <p class='parg-icon'><i class="fas fa-map-marker-alt"></i> haram region</p>
                            <p class='parg-icon'><i class="fas fa-dollar-sign"></i> confidential</p>
                            <p class='parg-icon'><i class="fas fa-clock"></i> 2021-02-28</p>
                            <div class="show-career-details">Show All Details...</div>
                            <div class="hidden-career-info">
                                <h6>ِJob Summary</h6>
                                <p class="details">Coordinate the daily stock transfer in /out between the warehouses and stores and Opt...</p>
                                <h6>Responsibilities</h6>
                                <p class="details">Studying the turnover rates of the items and classification of spare parts based...</p>
                                <h6>Jop Requirement</h6>
                                <p class="details">Experience: at least 2 year in Automotive industry. - males only...</p>
                                <h6>Jop Benefits</h6>
                                <p class="details">Social Insurance - one days off “Frida...</p>
                                <div class="hide-career-details">See Less</div>
                            </div>
                            <button href="#" class="alert more w-100" data-toggle="modal" data-target="#exampleModal">Apply Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include "layouts/footer.php";
?>
<script src="assets/js/intlTelInput.js"></script>
<script>
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
<script>
$( function() {
    $( "#datepicker" ).datepicker();
} );
</script>