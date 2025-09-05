<?php
include "layouts/header.php";
?>

<main class="bg-white">
    <!-- Start Header -->
    <div class="header products-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <h3>We Manage Your All In All Digital Services</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis quidem quas maxime repellat deserunt quibusdam quam ex! Tenetur</p>
                    <div class="product-header-btns">
                        <a href="contact.php">Free Trial</a>
                        <a href="https://www.youtube.com/watch?v=erbpGn1HLrk" data-lity>    
                            <div class="blob white"><i class="fas fa-play"></i></div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <img src="assets/images/products/banner-5.png">
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Products -->
    <div class="products-p">
        <div class="container">
            <span class="sm-span">Our Systems</span>
            <h3>Discover RAQMITA Systems</h3>
            <div class="filters text-center mb-5">
                <button type="button" data-mixitup-control data-filter="all" class="btn btn-primary mb-2">All</button>
                <button type="button" data-mixitup-control data-filter=".car"  class="btn btn-danger mb-2">Rent car</button>
                <button type="button" data-mixitup-control data-filter=".dar" class="btn btn-warning mb-2">Dar Al-aqar</button>
                <button type="button" data-mixitup-control data-filter=".hospital" class="btn btn-success mb-2">Hospital</button>
            </div>
            <div class="row partner-boxes">
                <div class="col-lg-4 col-md-12 mb-4 mix car">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#exampleModal">
                                <img class="mr-3" src="assets/images/products/icon.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Rent Car System</h5>
                                <span>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.</span>
                            </div>
                        </div>
                        <div class="info">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="outline: unset !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pt-2">Car Rent System</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-header">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <h1>We Manage Your All In All Digital Services</h1>
                                                    <a href="#">Try Now</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="assets/images/products/banner-3.png" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="video-sec w-80 my-4 mx-auto px-2">
                                                <img src="assets/images/products/browser.png" class="w-100">
                                                <div>
                                                    <a href="https://www.youtube.com/watch?v=erbpGn1HLrk" data-lity style="background-image: url('assets/images/products/table.jpg')">    
                                                        <div class="blob white"><i class="fas fa-play"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="features px-3">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/IT Support_Monochromatic.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #1</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Brainstorming session _Two Color.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #2</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Data Arranging_Monochromatic.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #3</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Team meeting_Flatline.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #4</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Start Fixed Sec -->
                                            <section class="products-fixed-sec text-center">
                                                <div class="container">
                                                    <h2>Car Rent System</h2>
                                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quisquam velit fugit quaerat possimus voluptatum dicta laborum molestiae eligendi libero ullam beatae soluta sint at</p>
                                                    <a href="#" class="btn">Start your free trial</a>
                                                </div>
                                            </section>
                                            <!-- End Fixed Sec -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="#" type="button" class="btn btn-primary">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mix dar">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#dar">
                                <img class="mr-3" src="assets/images/products/icon1.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Dar Al-aqar System</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.
                            </div>
                        </div>
                        <div class="info">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mix hospital">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#hospital">
                                <img class="mr-3" src="assets/images/products/icon2.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Hospital System</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.
                            </div>
                        </div>
                        <div class="info">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mix car">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#exampleModal">
                                <img class="mr-3" src="assets/images/products/icon.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Rent Car System</h5>
                                <span>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.</span>
                            </div>
                        </div>
                        <div class="info">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="outline: unset !important;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pt-2">Car Rent System</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-header">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <h1>We Manage Your All In All Digital Services</h1>
                                                    <a href="#">Try Now</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="assets/images/products/banner-3.png" class="w-100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="video-sec w-80 my-4 mx-auto px-2">
                                                <img src="assets/images/products/browser.png" class="w-100">
                                                <div>
                                                    <a href="https://www.youtube.com/watch?v=erbpGn1HLrk" data-lity style="background-image: url('assets/images/products/table.jpg')">    
                                                        <div class="blob white"><i class="fas fa-play"></i></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="features px-3">
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/IT Support_Monochromatic.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #1</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Brainstorming session _Two Color.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #2</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Data Arranging_Monochromatic.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #3</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <div class="feature-box d-flex justify-content-between">
                                                            <div class="feature-icon">
                                                                <img src="assets/images/features/Team meeting_Flatline.svg">
                                                            </div>
                                                            <div class="feature-info">
                                                                <h3>Module #4</h3>
                                                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam sed impedit harum ratione sit amet consectetur adipisicing elit. Nam sed impedit harum ratione</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Start Fixed Sec -->
                                            <section class="products-fixed-sec text-center">
                                                <div class="container">
                                                    <h2>Car Rent System</h2>
                                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quisquam velit fugit quaerat possimus voluptatum dicta laborum molestiae eligendi libero ullam beatae soluta sint at</p>
                                                    <a href="#" class="btn">Start your free trial</a>
                                                </div>
                                            </section>
                                            <!-- End Fixed Sec -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <a href="#" type="button" class="btn btn-primary">Register Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mix dar">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#dar">
                                <img class="mr-3" src="assets/images/products/icon1.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Dar Al-aqar System</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.
                            </div>
                        </div>
                        <div class="info">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4 mix hospital">
                    <div class="product-box">
                        <label class="container">
                            <input type="checkbox">
                            <span class="checkmark"></span>
                        </label>
                        <div class="media">
                            <button type="button" class="btn products-modal" data-toggle="modal" data-target="#hospital">
                                <img class="mr-3" src="assets/images/products/icon2.svg" alt="Generic placeholder image">
                            </button>
                            <div class="media-body">
                                <h5 class="mt-0">Hospital System</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.
                            </div>
                        </div>
                        <div class="info">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="#">Request a free Trial</a>
            </div>
        </div>
    </div>
    <!-- End Products -->
    <!-- Start Products Info -->
    <section class="products-info">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam quibusdam quia aut, animi, magni id omnis fugiat Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam quibusdam quia aut, animi, magni id omnis fugiat quod dicta architecto obcaecati adipisci quam autem et tempora cum nesciunt nisi.</p>
                    <a href="#">Try Now</a>
                </div>
                <div class="col-md-6">
                    <img src="assets/images/products/screens-mockup.png" class="w-100">
                </div>
            </div>
        </div>
    </section>
    <section class="products-info">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="assets/images/products/screens-mockup.png" class="w-100">
                </div>
                <div class="col-md-6">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam quibusdam quia aut, animi, magni id omnis fugiat Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ipsam quibusdam quia aut, animi, magni id omnis fugiat quod dicta architecto obcaecati adipisci quam autem et tempora cum nesciunt nisi.</p>
                    <a href="#">Try Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Info -->
    <!-- Start Fixed Sec -->
    <section class="products-fixed-sec text-center">
        <div class="container">
            <h2>RAQMITA Systems</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quisquam velit fugit quaerat possimus voluptatum dicta laborum molestiae eligendi libero ullam beatae soluta sint at</p>
            <a href="#" class="btn">Start your free trial</a>
        </div>
    </section>
    <!-- End Fixed Sec -->
</main>
<?php
include "layouts/footer.php";
?>