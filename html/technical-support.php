<?php
include "layouts/header.php";
?>

<main class="bg-tech">
    <!-- Start Header -->
    <div class="career-header header technical-support-header">
        <div class="overlay">
            <h2>Technical Support</h2>
        </div>
    </div>  
    <div class="tech-support">
        <div class="container">
            <div class="tech-support-form">
                <form action="" method="">
                    <div class="form-row mb-2">
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="col-lg-4 col-md-12 mb-3">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row mb-2">
                        <div class="col-lg-4 col-md-12 mb-3">
                            <select name="country" id="" class="form-control">
                                <option value="">Your Country</option>
                                <option value="Egypt">Egypt</option>
                                <option value="Ksa">Ksa</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Company">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="job-role" id="" class="form-control">
                                <option value="">Job Role</option>
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
                        <!-- <div class="col-lg-4 col-md-6 mb-3">
                            <input type="text" class="form-control" placeholder="Website">
                        </div> -->
                    </div>
                    <div class="form-row">
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
                            <input type="text" id="phone" name="phone" class="form-control mb-3">
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="Program" id="" class="form-control">
                                <option value="">Program</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <select name="page" id="" class="form-control">
                                <option value="">Page</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-4 mb-3">
                            <input type="file" class="form-control custom-file-input">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col mb-3">
                            <textarea rows="5" name="" id="" class="form-control" placeholder="Tell us more about your customer communication goals"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="Send">
                        </div>
                    </div>
                </form>
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
      utilsScript: "assets/js/utils.js",
      'de': 'Deutschland'
    });
</script>