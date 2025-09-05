@include ("layouts/header")

<main class="bg-white">
    <!-- Start Header -->
    <div class="header one-product-header products-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>{{$langg->rtl == 1 ? $product->name_ar  : $product->name}}</h3>
                    <p>{!!$langg->rtl == 1 ? $product->details_ar  : $product->details!!}</p>
                    <a href="#">Try Now</a>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/images/products/'.$product->photo)}}">
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Video Sec -->
    <div class="container">
        <div class="product-video-sec w-80 my-4 mx-auto px-2">
            <img src="{{asset('assets/images/products/browser.png')}}" class="w-100">
            <a href="{{ $product->youtube}}" class="modal-blob" data-lity style="background-image: url({{asset('assets/images/products/'.$product->video_photo)}})">    
                <div class="blob white"><i class="fas fa-play"></i></div>
            </a>
        </div>
    </div>
    <!-- End Video Sec -->
    <!-- Start Default Product Sec -->
    <div class="product-default-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4>Access Your Data Anytime, Anywhere</h4>
                    <p>Dar Al Aqar platform can be accessed from any device, desktop, mobile, or tablet, anytime, anywhere. Its enhanced connectivity enables property managers, staff, and landlords to access the data smoothly, which certainly boosts productivity and collaboration.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/images/products/table.jpg')}}" class="w-100">
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Product Sec -->
    <!-- Start Features Sec -->
    <div class="product-features features px-3">
        <div class="container">
            <div class="row">
                      @foreach (DB::table('contents')->where('product_id',$product->id)->where('status',1)->get() as $dat)
                <div class="col-md-6 mb-4">
                    <div class="feature-box d-flex justify-content-between">
                        <div class="feature-icon">
                            <img src="{{asset('assets/images/content/'.$dat->photo)}}">
                        </div>
                        <div class="feature-info">
                            <h3>{{$langg->rtl == 1 ? $dat->title_ar  : $dat->title}}</h3>
                            <p>{!!$langg->rtl == 1 ? $dat->details_ar  : $dat->details!!}</p>
                        </div>
                    </div>
                </div>
             @endforeach
            </div>
        </div>
    </div>
    <!-- End Features Sec -->
    <!-- Start Fixed Sec -->
    <section class="products-fixed-sec text-center">
        <div class="container">
            <h2>Edraak Systems</h2>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quisquam velit fugit quaerat possimus voluptatum dicta laborum molestiae eligendi libero ullam beatae soluta sint at</p>
            <a href="#" class="btn">Start your free trial</a>
        </div>
    </section>
    <!-- End Fixed Sec -->
</main>
@include ("layouts/footer")