@extends('layouts.load')

@section('content')
            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error') 
                      <form id="geniusformdata" action="{{route('admin-subscription-update',$data->id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Title") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="title" placeholder="{{ __("Enter Subscription Title") }}" required="" value="{{ $data->title }}">
                          </div>
                        </div>
   <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("subtitle") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="subtitle" placeholder="{{ __("Enter Subscription subtitle") }}" required="" value="{{ $data->subtitle }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Currency") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="currency" placeholder="{{ __("Enter Subscription Currency") }}" required="" value="{{ $data->currency }}">
                          </div>
                        </div>

                      
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Cost") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="price" placeholder="{{ __("Enter Subscription Cost") }}" required="" value="{{ $data->price }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __("Duration") }} *</h4>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="days" placeholder="{{ __("Enter Subscription Duration") }}" required="" value="{{ $data->days }}">
                          </div>
                        </div>

                       <div class="row">
                        
                                <div class="col-lg-4">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="featured-keyword-area">
                                        <div class="heading-area">
                                            <h4 class="title">{{ __('Details') }}</h4>
                                        </div>

                                        <div class="feature-tag-top-filds" id="feature-section">
                                            @if(!empty($data->details))
                                                @php
                                                $details =    explode(',', $data->details);
                                                $marks =    explode(',', $data->marks);
                                             
                                                @endphp
                                                @foreach($details as $key => $data1)

                                                    <div class="feature-area">
                                                        <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" name="details[]" class="input-field" placeholder="{{ __('Enter Your details') }}" value="{{ $details[$key] }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="marks[]" class="input-field" placeholder="{{ __('Enter Your mark') }}" value="{{ $marks[$key] }}">
                                                            </div>

                                                           
                                                        </div>
                                                    </div>


                                                @endforeach
                                            @else

                                                <div class="feature-area">
                                                    <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" name="details[]" class="input-field" placeholder="{{ __('Enter Your details') }}">
                                                        </div>
                                                    <div class="col-lg-6">
                                                                <input type="text" name="marks[]" class="input-field" placeholder="{{ __('Enter Your mark') }}" value="">
                                                            </div>
                                                     
                                                    </div>
                                                </div>

                                            @endif
                                        </div>

                                        <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                    </div>
                                </div>
                            </div>

                    
    <div class="row">
                        
                                <div class="col-lg-4">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="featured-keyword-area">
                                        <div class="heading-area">
                                            <h4 class="title">{{ __('durations') }}</h4>
                                        </div>

                                        <div class="feature-tag-top-filds" id="feature-section2">
                                            @if(!empty($data->date))
                                                @php
                                                $dates =    explode(',', $data->date);
                                                $values =    explode(',', $data->value);
                                             
                                                @endphp
                                                @foreach($dates as $key => $data1)

                                                    <div class="feature-area">
                                                        <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <input type="text" name="date[]" class="input-field" placeholder="{{ __('Enter Your title') }}" value="{{ $dates[$key] }}">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="text" name="value[]" class="input-field" placeholder="{{ __('Enter Your value') }}" value="{{ $values[$key] }}">
                                                            </div>

                                                           
                                                        </div>
                                                    </div>


                                                @endforeach
                                            @else

                                                <div class="feature-area">
                                                    <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <input type="text" name="date[]" class="input-field" placeholder="{{ __('Enter Your name') }}">
                                                        </div>
                                                    <div class="col-lg-6">
                                                                <input type="text" name="value[]" class="input-field" placeholder="{{ __('Enter Your value') }}" value="">
                                                            </div>
                                                     
                                                    </div>
                                                </div>

                                            @endif
                                        </div>

                                        <a href="javascript:;" id="feature-btn2" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                                    </div>
                                </div>
                            </div>

                    


                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __("Save") }}</button>
                          </div>
                        </div>
                      </form>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


@endsection

@section('scripts')

<script type="text/javascript">

$("#limit").on('change',function() {
  val = $(this).val();
    if(val == 1) {
        $("#limits").show();
        $("#allowed_products").prop("required", true);
    }
    else
    {
        $("#limits").hide();
        $("#allowed_products").prop("required", false);

    }
});


$("#feature-btn").on('click', function(){

    $("#feature-section").append(''+
                            '<div class="feature-area">'+
                                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-lg-6">'+
                                            '<input type="text" name="details[]" class="input-field" placeholder="Enter Your Keyword">'+
                                        '</div>'+
                                        '<div class="col-lg-6">'+

                                                '<input type="text" name="marks[]" value="" class="input-field"/>'+

                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
                            +'');
    
});

$("#feature-btn2").on('click', function(){

    $("#feature-section2").append(''+
                            '<div class="feature-area">'+
                                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-lg-6">'+
                                            '<input type="text" name="date[]" class="input-field" placeholder="Enter Your Keyword">'+
                                        '</div>'+
                                        '<div class="col-lg-6">'+

                                                '<input type="text" name="value[]" value="" class="input-field"/>'+

                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
                            +'');
    
});

$(document).on('click','.feature-remove', function(){

    $(this.parentNode).remove();
    if (isEmpty($('#feature-section'))) {

    $("#feature-section").append(''+
                            '<div class="feature-area">'+
                                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-lg-6">'+
                                            '<input type="text" name="details[]" class="input-field" placeholder="Enter Your Keyword">'+
                                        '</div>'+
                                        '<div class="col-lg-6">'+

                                                '<input type="text" name="marks[]" value="" class="input-field "/>'+

                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
                            +'');
    $('.cp').colorpicker();
    } 
    
    if (isEmpty($('#feature-section2'))) {

    $("#feature-section2").append(''+
                            '<div class="feature-area">'+
                                '<span class="remove feature-remove"><i class="fas fa-times"></i></span>'+
                                    '<div  class="row">'+
                                        '<div class="col-lg-6">'+
                                            '<input type="text" name="date[]" class="input-field" placeholder="Enter Your Keyword">'+
                                        '</div>'+
                                        '<div class="col-lg-6">'+

                                                '<input type="text" name="value[]" value="" class="input-field "/>'+

                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                            '</div>'
                            +'');
    $('.cp').colorpicker();
    }

});
</script>

@endsection
