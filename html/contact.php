<?php
include "layouts/header.php";
?>

<main class="bg-career">
    <!-- Start Header -->
    <div class="career-header header">
        <div class="overlay">
            <h2>Contact us</h2>
        </div>
    </div>  
    <div class="careers">
        <div class="container">
            <form action="" class="technical-support-form">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>First Name:</label>
                        <input type="text" name="f-name" class="form-control mb-3" placeholder="First Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name:</label>
                        <input type="text" name="l-name" class="form-control mb-3" placeholder="Last Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control mb-3" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Country:</label>
                        <select class="custom-select form-control mb-3" name="country" required>
                            <option value="Ksa">KSA</option>
                            <option value="Egypt">Egypt</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Company:</label>
                        <input type="text" name="company" class="form-control mb-3" placeholder="Company">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Website:</label>
                        <input type="text" name="website" class="form-control mb-3" placeholder="Website">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Industry:</label>
                        <select name="industry" class="custom-select form-control mb-3" required>
                            <option value="">Industry</option>
                            <option value="">Travel & Hospitality</option>
                            <option value="">Retail & E-commerce</option>
                            <option value="">Technology</option>
                            <option value="">Media & Entrainment</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Job Role:</label>
                        <select name="job-role" class="custom-select form-control mb-3" required>
                            <option value="">Please Select</option>
                            <option value="">CEO / CTO / CMO / Exec</option>
                            <option value="">Products - Dir / Bip</option>
                            <option value="">Developer</option>
                            <option value="">Marketing - Team Member</option>
                            <option value="">Sales</option>
                            <option value="">Support</option>
                            <option value="">Finance</option>
                            <option value="">Operations</option>
                            <option value="">Other</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mobile Phone:</label>
                        <input id="phone" name="phone" class="form-control mb-3" type="tel">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Monthly Contacted Customers:</label>
                        <select name="contacted-customers" class="custom-select form-control mb-3" required>
                            <option value="">Less than 100.000</option>
                            <option value="">100K - 300K</option>
                            <option value="">300K - 1M</option>
                            <option value="">Greater than 1M</option>
                        </select>
                    </div> 
                </div>
                <div class="form-row">
                    <label>Tell us more about your customer  communication goals</label>
                    <textarea rows="5" class="form-control mb-3" placeholder="Message"></textarea>
                </div>
                <div class="form-row">
                    <div class="form-check">
                        <input type="checkbox" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <div class="form-row mt-3">
                        <input type="submit" class="form-control py-3" value="Contact me">
                    </div>
                </div>
            </form>
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
      utilsScript: "assets/js/utils.js",
    });
</script>