@include ("layouts/header")

<main class="bg-white">
    <!-- Start Header -->
    <div class="header products-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-7">
                    <h3>We Manage Your All In All Digital Services</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis quidem quas maxime repellat deserunt quibusdam quam ex! Tenetur</p>
                    <div class="product-header-btns">
                        <a href="#products-p">Free Trial</a>
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
    <!-- Start Products Info -->
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
    <!-- Start Products -->
    <div class="products-p" id="products-p">
        <div class="container">
            <span class="sm-span">Our Systems</span>
            <h3>Discover Edraak Systems</h3>
            <div class="filters text-center mb-5">
                <button type="button" data-mixitup-control data-filter="all" class="btn btn-primary mb-2">All</button>
                @foreach($cats as $k=>$cat)
                <button type="button" data-mixitup-control data-filter=".c{{$cat->id}}"  class="btn @if($k == 0) btn-danger @elseif($k == 1) btn-warning @else btn-success  @endif      mb-2">{{$langg->rtl == 1 ? $cat->name_ar  : $cat->name}}</button>
                @endforeach
     <!--       <button type="button" data-mixitup-control data-filter=".dar" class="btn btn-warning mb-2">Dar Al-aqar</button>
                <button type="button" data-mixitup-control data-filter=".hospital" class="btn btn-success mb-2">Hospital</button>-->
            </div>
            <div class="products-boxes">
                <!-- Main Products -->
                <div class="row">
                    <input type="hidden" class="" id="" value="">
               @foreach($products as $key=>$product)
                    <!-- <input type="hidden" class="monthly" id="monthly{{$key}}" value="{{$product->monthly}}">
                    <input type="hidden" class="half_yearly" id="half_yearly{{$key}}" value="{{$product->half_yearly}}">
                    <input type="hidden" class="yearly" id="yearly{{$key}}" value="{{$product->yearly}}">
                    <input type="hidden" class="final_sale" id="final_sale{{$key}}" value="{{$product->final_sale}}"> -->
                    <div class="col-lg-4 col-md-12 mb-4 mix @foreach(json_decode($product->category_id) as $cat) c{{$cat}}  @endforeach">
                        <div class="product-box">
                            <a href="  {{route('front.product',['slug' => $product->slug])}}">
                                <label class="container">
                                    <input type="radio" name="product" id="product{{$product->id}}" class="products product-id" value="{{$product->id}}">
                                    <span class="checkmark radio-checkmark"></span>
                                 <!--   <span class="checkmark" data-toggle="modal" data-target="#productsModal"></span>-->
                                </label>
                                <div class="media">
                                    <img class="mr-3" src="{{asset('assets/images/products/'.$product->icon_photo)}}" alt="{{$product->name}}">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$langg->rtl == 1 ? $product->name_ar  : $product->name}}</h5>
                                        <span class="bg-danger"></span>
                                        <span>{{$langg->rtl == 1 ? $product->min_details_ar  : $product->min_details}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                    
                </div>
                <!-- Children -->
                <div class="row">
                    
                    @foreach($productss as $key=>$product)
                    <!-- <input type="hidden" class="monthly" id="monthly{{$key}}" value="{{$product->monthly}}">
                    <input type="hidden" class="half_yearly" id="half_yearly{{$key}}" value="{{$product->half_yearly}}">
                    <input type="hidden" class="yearly" id="yearly{{$key}}" value="{{$product->yearly}}">
                    <input type="hidden" class="final_sale" id="final_sale{{$key}}" value="{{$product->final_sale}}"> -->
                    <div class="col-lg-4 col-md-12 mb-4 mix @foreach(json_decode($product->category_id) as $cat) c{{$cat}}  @endforeach">
                        <div class="product-box">
                            <a href="  {{route('front.product',['slug' => $product->slug])}}">
                                <label class="container">
                                    <input type="checkbox" name="product" id="product{{$product->id}}" class="products" value="{{$product->id}}">
                                    <span class="checkmark "></span>
                                 <!--   <span class="checkmark" data-toggle="modal" data-target="#productsModal"></span>-->
                                </label>
                                <div class="media">
                                    <img class="mr-3" src="{{asset('assets/images/products/'.$product->icon_photo)}}" alt="{{$product->name}}">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{$langg->rtl == 1 ? $product->name_ar  : $product->name}}</h5>
                                        <span class="bg-danger"></span>
                                        <span>{{$langg->rtl == 1 ? $product->min_details_ar  : $product->min_details}}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                    
                    
                </div>
            </div>
            @if(isset($key))
            <div class="text-center mt-5">
                   <form method="post" action="{{route('front.products-form')}}" class="register"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           <!--     <a href="#" class="product-box-link">Request a free Trial</a>-->
              <input type="hidden" id="selected_products_for_edit{{$key}}" class="selected_products" name="selected_products" value="">
                   <button    class="register product-box-link" >Request a free Trial</button>
                 </form>
            </div>
            @endif
        </div>
    </div>
    <!-- End Products -->
    
    <!--Start Pricing-->
    <section class="pricing-sec" id="price">
        <div class="container">
            <h2>Pricing Plans</h2>
            <p class="sm-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="row">
                @foreach($subscriptions as $key=>$sub)
                <div class="col-lg-3 col-md-6">
                    <div class="pricing-box">
                        <form method="post" action="{{route('front.products-form')}}" class="register"> 
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="pricing-head text-center">
                            <h5>{{$sub->title}}</h5>
                            <span class="price-span"><sup>{{$sub->currency}}</sup><span class="text-price{{$key}}" id="{{$sub->type}}">{{$sub->price}}</span></span>
                                 <input class="s{{$sub->type}}" id="total_price{{$key}}" name="total_price" value="{{$sub->price}}" type="hidden">
                                    <input  name="currency" value="{{$sub->currency}}" type="hidden">
                                 <input class="s{{$sub->type}}" id="price{{$key}}" name="price" value="{{$sub->price}}" type="hidden">
                                 <input class="keys" id="" value="{{$key}}" type="hidden">
                            <p class="price-span">{{$sub->subtitle}}</p>
                        </div>
                        <div class="pricing-selcet">
                                 @if(!empty($sub->date))
                                                @php
                                                $dates =    explode(',', $sub->date);
                                                $values =    explode(',', $sub->value);
                                             
                                                @endphp
                                                
                                       
                          <select name="duration_value" id="duration{{$key}}" class="form-control duration" >      
                           <option value="">{{$langg->rtl == 1 ? 'طريقة الدفع'  : 'Payment method'}}</option>
                               @foreach($dates as $keys => $data1)

                             

                                <option value="{{ $values[$keys] }}" data-name="{{ $dates[$keys] }}" data-sub="{{$key}}">{{ $dates[$keys] }}( {{ $values[$keys] }}{{$sub->currency}} ) </option>
                             
                                @endforeach
                            </select>       

                            <input name="duration_name" id="duration-name{{$key}}" value="" type="hidden">
                            @else
                            
                              <input name="duration_value" id="duration{{$key}}" value="0" type="hidden">
                              <input name="duration_name" id="duration-name{{$key}}" value="not avaliable" type="hidden">
                     
                              @endif
                             


                         
                            
                            
                            <select name="product_type" id="product_type{{$key}}" class="form-control product-types" >
                                <option value="">{{$langg->rtl == 1 ? 'عدد المستخدمين'  : 'users number'}}</option>
                           </select>
                           <input name="product_type_name" id="product-type-name{{$key}}" value="" type="hidden">

                            
                        </div>
                        <ul class="list-unstyled">
                             @if(!empty($sub->details))
                                                @php
                                                $details =    explode(',', $sub->details);
                                                $marks =    explode(',', $sub->marks);
                                             
                                                @endphp
                                                @foreach($details as $key => $data1)

                                                 
                                        <li>  {{ $details[$key] }}  @if($marks[$key] == 'true')<i class="fas fa-check text-success"></i>@else  <i class="fas fa-times text-danger"></i>  @endif  </li>

                                                @endforeach
                                          @endif
                          
                      
                            
                            
                        </ul>
                        <hr class="mt-3">

                        <input type="hidden" id="selected_products_for_edit{{$key}}" class="selected_products" name="selected_products" value="">
                        <input type="hidden" class="sub_id" name="sub_id" value="{{$sub->id}}">
                        
                        <div class="mb-3" style="text-align: center;">
                   
                            <button href="#"   class="register" >Register Now</button>
                        </div>
                        </form>
                    </div>
                    
                </div>
                 @endforeach
            </div>
        </div>
    </section>
    <!--End Pricing-->
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
    <!-- End Products Info -->
    
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
<script>



    	$(document).on('click', '.product-id',  function() {
	        
	    var id = $(this).val();
           $.ajax({
                    method: "post",
                    url: "{{route('front.product-types')}}",
                    dataType: 'json',
                    data: {id : id, _token: '{{csrf_token()}}'},
                    success: function(result) {
                        if (result.success == true) {
                           
                     $("[name='product_type']").html('');
                    $("[name='product_type']").html(result.options);
                    
                    
                          console.log(id);   
                          console.log(result.options);   
                          console.log(result.dates);   
                          console.log(result.values);   
                        } 
                    },
                });
   
	        });

    	$(document).on('change', '.products',  function() {
	 
	 
            calculateTotal();
   
	        });

   
   
     function calculateTotal() {
        
         var monthly =   parseFloat($('.smonthly').val());
         var half_yearly =   parseFloat($('.shalf_yearly').val());
         var yearly =   parseFloat($('.syearly').val());
         var final_sale =  parseFloat($('.sfinal_sale').val()) ;

             
        var total = 0;


     

       var ids = $('.products:checked').map(function(){
            return this.value;
        }).get(); 


           $('.selected_products').val(ids);

      /*      $.ajax({
                    method: "post",
                    url: "{{route('front.product-prices')}}",
                    dataType: 'json',
                    data: {ids : ids, _token: '{{csrf_token()}}'},
                    success: function(result) {
                        if (result.success == true) {
                            monthly     += result.monthly;
                            half_yearly += result.half_yearly;
                            yearly      += result.yearly;
                            final_sale  += result.sell;

                         console.log(result.monthly);  
                            console.log(result.half_yearly);  
                            console.log(result.yearly);  
                            console.log(result.sell);  
                    
                           $('span#monthly').text(monthly);
                            $('span#half_yearly').text(half_yearly);
                            $('span#yearly').text(yearly);
                            $('span#final_sale').text(final_sale);
                        } 
                    },
                }); */
     /*   console.log('-----');
         console.log(ids);

         console.log(monthly);  
           console.log(half_yearly);  
            console.log(yearly);  
              console.log(final_sale);  
       */
             
        
	
    

        }


    /* $(document).on('click', '.register', function(e){ */
    $(document).on('submit', 'form .register', function(e) {
                e.preventDefault();
               var selected_products = $('.selected_products').val();
               var id = $('.sub_id').val();
               // var href = $(this).data('href');

                 console.log('aaaa');
                    console.log(id);

                if(selected_products.length > 0){

                  /*   var form = $('form .register')

                        var data = form.serialize();
                            $.ajax({
                                method: form.attr('method'),
                                url: form.attr('action'),
                                dataType: 'json',
                                data: data,
                                success: function(result) {
                                    if (result.success == 1) {
                                        toastr.success(result.msg);
                                        sell_table.ajax.reload();
                                        $('div.payment_modal').modal('hide');
                                        form
                                        .find('#selected_products')
                                        .val('');
                                    } else {
                                        toastr.error(result.msg);
                                    }
                                },
                            }); 
                */

                } else{
                   
                    console.log('dddd');
                    console.log(href);
                }    
            })  

 
 $('.duration').on('change', function() {
 
  
  console.log(this.value);
  console.log( $(this).find(':selected').data('name'));
  console.log($(this).find(':selected').data('sub')) ;

  var duration_val = this.value;
  var sub_key = $(this).find(':selected').data('sub') ;
  var duration_name = $(this).find(':selected').data('name') ;


  $('#duration-name'+sub_key).val(duration_name);

  calculatesubTotal(sub_key);
});



 $('.product-types').on('change', function() {
 
  
  console.log(this.value);
  console.log( $(this).find(':selected').data('name'));





  calculatesubsTotal();
});





function calculatesubTotal(key) {


                var total = 0;

        if($('#duration'+ key).val().length >= 1){

            var sub_dutation = parseFloat($('#duration'+ key).val());
        }else{

            var sub_dutation = 0;
        }
            
        if($('#product_type'+ key).val().length >= 1){

        var product_type =   parseFloat($('#product_type'+ key).val());
        }else{

            var product_type =   0;
        }
                

                var sub_price =   parseFloat($('#price'+ key).val());
            

                    
                total = sub_dutation + product_type + sub_price ;



          $('#total_price'+ key).val(total);
          $('span.text-price'+ key).text(total);


          var type_name = $('#product_type'+ key).find(':selected').data('name') ;


        $('#product-type-name'+key).val(type_name);

   }







function calculatesubsTotal() {

    var keys = $('.keys').map(function(){
            return this.value;
        }).get(); 

    console.log(keys);
     for(key = 0 ; key < keys.length ; key++){
        console.log(key);
        var total = 0;

        if($('#duration'+ key).val().length >= 1){

            var sub_dutation = parseFloat($('#duration'+ key).val());
        }else{

            var sub_dutation = 0;
        }
            
        if($('#product_type'+ key).val().length >= 1){

        var product_type =   parseFloat($('#product_type'+ key).val());
        }else{

            var product_type =   0;
        }
                

                var sub_price =   parseFloat($('#price'+ key).val());
            

                    
                total = sub_dutation + product_type + sub_price ;


            
                $('#total_price'+ key).val(total);
                $('span.text-price'+ key).text(total);


            }
            
        }


</script>
