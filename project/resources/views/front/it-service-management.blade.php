@include ("layouts/header")
<main class="bg-white">
    <!-- Start Header -->
    <div class="header cloud-p-header py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3>{{ __('site.lang39') }}</h3>
                    <p>{{ __('site.lang40') }}</p>
                    <p>{{ __('site.lang41') }}</p>
                    <p>{{ __('site.lang42') }}</p>
                    <div class="product-header-btns">
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <img src="assets/images/all-services/cloud/cloud.svg" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    
    <div class="model-adv">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="assets/images/all-services/cloud/available.svg" class="w-100">
                </div>
                <div class="col-md-6">
                    <h2>{{ __('site.lang43') }}</h2>
                    <p>{{ __('site.lang44') }}</p>
                    <p>{{ __('site.lang45') }}</p>
                    <p>{{ __('site.lang46') }}</p>
                    <p>{{ __('site.lang47') }}</p>
                  
                </div>
            </div>
        </div>
    </div>
    <!--End Models -->
 
    <!-- Start IAAS Banner -->
    <div class="iaas-banner d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between flex-wrap">
            <h2>{{ __('site.lang57') }}</h2>
            <a href="{{url('/contact')}}">{{ __('site.nav_8') }}</a>
        </div>
    </div>
    <!-- End IAAS Banner -->
    <!-- End IAAS -->
    <!-- //////////////////// Start PAAS /////////////////////////////// -->
    <!-- Start PAAS -->
    <div class="cloud-model cloud-model-iaas" id="paas">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                 
                    <h2>{{ __('site.lang48') }}</h2>
                    <p>{{ __('site.lang49') }}</p>
                    
                </div>
                <div class="col-md-5">
                    <img src="assets/images/all-services/cloud/Data storage_Two Color.svg" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="why-model">
        <div class="container">
            <h2>Why <span>IAAS</span></h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/available.svg">
                    <p>Resources are available as a service</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/cost.svg">
                    <p>Cost varies depending on consumption</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/scalable.svg">
                    <p>Services are highly scalable</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/users.svg">
                    <p>Multiple users on a single piece of hardware</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/control.svg">
                    <p>Organization retain complete control of the infrastructure</p>
                </div>
                <div class="col-md-4 mb-4">
                    <img src="assets/images/all-services/cloud/dynamic.svg">
                    <p>Dynamic and flexible</p>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="model-adv">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-3 mb-md-0">
                    <img src="assets/images/all-services/cloud/available.svg" class="w-100">
                </div>
                <div class="col-md-6">
                    <h2>  <span>{{ __('site.lang50') }}</span></h2>
                    
                    <p>{{ __('site.lang51') }}</p>
                    <p>{{ __('site.lang52') }}</p>
                    <p>{{ __('site.lang53') }}</p>
                    <p>{{ __('site.lang54') }}</p>
                    <p>{{ __('site.lang55') }}</p>
                    <p>{{ __('site.lang56') }}</p>
                     </div>
            </div>
        </div>
    </div>
    <!--End Models -->
    
    <!-- End When -->
    <!-- Start SAAS Banner -->
    <div class="iaas-banner d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between flex-wrap">
            <h2>{{ __('site.lang57') }}</h2>
            <a href="{{url('/contact')}}">{{ __('site.nav_8') }}</a>
        </div>
    </div>
    <!-- End SAAS Banner -->
    <!-- End SAAS -->
    <!-- End Models -->
</main>

@include ("layouts/footer")
