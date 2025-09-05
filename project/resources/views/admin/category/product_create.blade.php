@extends('layouts.load')

@section('content')

            <div class="content-area">

              <div class="add-product-content">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="product-description">
                      <div class="body-area">
                        @include('includes.admin.form-error')  
                      <form id="geniusformdata" action="{{route('admin-cat-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <input type="hidden" class="input-field" name="type" required="" value="product">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Name') }} *</h4>
                                <p class="sub-heading">{{ __('(In Any Language)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name" placeholder="{{ __('Enter Name') }}" required="" value="">
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Arabic Name') }} *</h4>
                                <p class="sub-heading">{{ __('(Arabic)') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="name_ar" placeholder="{{ __('Enter Arabic Name') }}" required="" value="">
                          </div>
                        </div>
                        
                        
                        
                        

{{--
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Slug') }} *</h4>
                                <p class="sub-heading">{{ __('In English') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="slug" placeholder="{{ __('Enter Slug') }}" required="" value="">
                          </div>
                        </div>
   <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Slug') }} *</h4>
                                <p class="sub-heading">{{ __('Arabic') }}</p>
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <input type="text" class="input-field" name="slug_ar" placeholder="{{ __('Enter Arabic Slug') }}" required="" value="">
                          </div>
                        </div>--}}
                        
                        
                        
                        
                    {{--

                       <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                  <h4 class="heading">{{ __('Meta Tags') }} *</h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <ul id="metatags" class="myTags">
						                              </ul>
						                            </div>
						                          </div>

						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                <h4 class="heading">
						                                    {{ __('Meta Description') }} *
						                                </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <div class="text-editor">
						                                <textarea name="meta_description" class="ckeditor form-control" placeholder="{{ __('Meta Description') }}"></textarea>
						                              </div>
						                            </div>
						                          </div>
						                          
						                             <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                <h4 class="heading">
						                                    {{ __('Arabic Meta Description') }} *
						                                </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <div class="text-editor">
						                                <textarea name="meta_description_ar" class="ckeditor form-control" placeholder="{{ __('Arabic Meta Description') }}"></textarea>
						                              </div>
						                            </div>
						                          </div>
						                      
						                       


 <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __('Tags') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7" >
						                              
						                              
						                            <ul id="tags" class="myTags" >
						                                 
											                                  
											                               
											                               
						                            </ul>
						                          </div>
						                        </div>
						                        
						                        
						                        <br><br>
						                        <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __('Arabic Tags') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7" >
						                              
						                              
						                            <ul id="atags" class="myTags" >
						                                 
											                                  
											                               
											                               
						                            </ul>
						                          </div>
						                        </div>
--}}
                        
                        
                        






                        <br>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-7">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Create Category') }}</button>
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

{{-- TAGIT --}}

          $("#metatags").tagit({
          fieldName: "meta_tag[]",
          allowSpaces: true 
          });

          $("#tags").tagit({
          fieldName: "tags[]",
          allowSpaces: true 
        });
       
        $("#tags_ar").tagit({
          fieldName: "tags_ar[]",
          allowSpaces: true 
        });

{{-- TAGIT ENDS--}}
</script>

<script src="{{asset('assets/admin/js/product.js')}}"></script>
<script src="{{asset('assets/admin/js/jscolor.js')}}"></script>




 <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       
    });
</script>


@endsection