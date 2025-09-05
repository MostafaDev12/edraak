@extends('layouts.admin')
@php
 $sign = DB::table('currencies')->where('is_default','=',1)->first();

 @endphp
@section('styles')

<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>

@endsection
@section('content')
						<div class="content-area">
							<div class="mr-breadcrumb">
								<div class="row">
									<div class="col-lg-12">
											<h4 class="heading"> {{ __("Edit Product") }}<a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __("Back") }}</a></h4>
											<ul class="links">
												<li>
													<a href="{{ route('admin.dashboard') }}">{{ __("Dashboard") }} </a>
												</li>
												<li>
													<a href="{{ route('admin-prod-index') }}">{{ __("Products") }} </a>
												</li>
												<li>
													<a href="javascript:;">{{ __("Digital Product") }}</a>
												</li>
												<li>
													<a href="{{ url()->previous() }}">{{ __("Edit") }}</a>
												</li>
											</ul>
									</div>
								</div>
							</div>
							<div class="add-product-content">
								<div class="row">
									<div class="col-lg-12">
										<div class="product-description">
											<div class="body-area">

					                      <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
					                      <form id="geniusform" action="{{route('admin-prod-update',$data->id)}}" method="POST" enctype="multipart/form-data">
					                        {{csrf_field()}}


                        @include('includes.admin.form-both')  

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Product Name") }}* </h4>
																<p class="sub-heading">{{ __("(In Any Language)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __("Enter Product Name") }}" name="name" required="" value="{{ $data->name }}">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Product Arabic Name") }}* </h4>
																<p class="sub-heading">{{ __("(Arabic)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __("Enter Product Arabic Name") }}" name="name_ar" required="" value="{{ $data->name_ar }}">
													</div>
												</div>
												
												
												
														<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Product Alt') }}* </h4>
																<p class="sub-heading">{{ __('(In Any Language)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __('Enter Product ALt') }}" name="alt" required="" value="{{ $data->alt }}">
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Product ALt') }}* </h4>
																<p class="sub-heading">{{ __('(Arabic)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __('Enter Product Arabic ALt') }}" name="alt_ar" required="" value="{{ $data->alt_ar }}">
													</div>
												</div>
												


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Category") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<select id="cat" name="category_id" required="">
																	<option>{{ __("Select Category") }}</option>

                                              @foreach($cats as $cat)
                                                  <option data-href="{{ route('admin-subcat-load',$cat->id) }}" value="{{$cat->id}}" {{$cat->id == $data->category_id ? "selected":""}} >{{$cat->name}}</option>
                                              @endforeach
						                                     </select>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Sub Category") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<select id="subcat" name="subcategory_id">
																<option value="">{{ __("Select Sub Category") }}</option>
	                                                  @if($data->subcategory_id == null)
	                                                  @foreach($data->category->subs as $sub)
	                                                  <option data-href="{{ route('admin-childcat-load',$sub->id) }}" value="{{$sub->id}}" >{{$sub->name}}</option>
	                                                  @endforeach
	                                                  @else
	                                                  @foreach($data->category->subs as $sub)
	                                                  <option data-href="{{ route('admin-childcat-load',$sub->id) }}" value="{{$sub->id}}" {{$sub->id == $data->subcategory_id ? "selected":""}} >{{$sub->name}}</option>
	                                                  @endforeach                                                  
	                                                  @endif


															</select>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Child Category") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<select id="childcat" name="childcategory_id" {{$data->subcategory_id == null ? "disabled":""}}>
                                                  				<option value="">{{ __("Select Child Category") }}</option>
	                                                  @if($data->subcategory_id != null)
	                                                  @if($data->childcategory_id == null)
	                                                  @foreach($data->subcategory->childs as $child)
	                                                  <option value="{{$child->id}}" >{{$child->name}}</option>
	                                                  @endforeach
	                                                  @else
	                                                  @foreach($data->subcategory->childs as $child)
	                                                  <option value="{{$child->id}} " {{$child->id == $data->childcategory_id ? "selected":""}}>{{$child->name}}</option>
	                                                  @endforeach
	                                                  @endif                                               
	                                                  @endif
															</select>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Select Upload Type") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<select id="type_check" name="type_check">
			                                                  <option value="1" {{ $data->file != null ? 'selected':'' }}>{{ __("Upload By File") }}</option>
			                                                  <option value="2" {{ $data->link != null ? 'selected':'' }}>{{ __("Upload By Link") }}</option>
															</select>
													</div>
												</div>

												<div class="row file {{ $data->file != null ? '':'hidden' }}">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Select File") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<input type="file" name="file">
													</div>
												</div>

												<div class="row link {{ $data->link != null ? '':'hidden' }}">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Link") }}*</h4>
														</div>
													</div>
													<div class="col-lg-7">
															<textarea class="input-field" rows="4" name="link" placeholder="{{ __("Link") }}" {{ $data->link != null ? 'required':'' }}>{{ $data->link }}</textarea> 
													</div>
												</div>


												
							                     <div class="row">
							                        <div class="col-lg-4">
							                          <div class="left-area">
							                              <h4 class="heading">{{ __("Feature Image") }} *</h4>
							                          </div>
							                        </div>
							                        <div class="col-lg-7">
	<div class="row">
	<div class="panel panel-body">
		<div class="span4 cropme text-center" id="landscape" style="width: 400px; height: 400px; border: 1px dashed black;">
		</div>
		</div>
	</div>

			<a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
				<i class="icofont-upload-alt"></i> {{ __("Upload Image Here") }}
			</a>


							                        </div>
							                      </div>

							                      <input type="hidden" id="feature_photo" name="photo" value="{{ $data->photo }}">
							                      
							                      
							                      
							                      
							                                              <!--image-->
                                @if($gs->templatee_select == 2 $gs->templatee_select == 1111)
                                              <div class="row">
							                        <div class="col-lg-4">
							                          <div class="left-area">
							                              <h4 class="heading">{{ __('Feature Hover Image') }} *</h4>
							                          </div>
							                        </div>
							                        <div class="col-lg-7">
                                                	<div class="row">
                                                	<div class="panel panel-body">
                                                		<img class="span4 mobile text-center" id="landscapes2" src="{{asset('assets/images/products/'.$data->hover_photo)}}" style="width: 400px; height: 400px; border: 1px dashed black;">
                                                         
                                                </div>
                                                	</div>
                                                
                                                		<!--	<a href="javascript:;" id="crop-image" class="d-inline-block mybtn1">
                                                				<i class="icofont-upload-alt"></i> {{ __('Upload Image Here') }}
                                                			</a>
-->                         <input class="d-inline-block mybtn1" type="file" onchange="document.getElementById('landscapes2').src = window.URL.createObjectURL(this.files[0])" id="hover_photo" name="hover_photo" value="{{ $data->hover_photo }}">

							                        </div>
							                      </div>
							                      
							             @endif
											
						                        
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">
																	{{ __("Product Gallery Images") }} *
																</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<a href="javascript" class="set-gallery"  data-toggle="modal" data-target="#setgallery">
															<input type="hidden" value="{{$data->id}}">
																<i class="icofont-plus"></i> {{ __("Set Gallery") }}
														</a>
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">
																{{ __("Product Current Price") }}*
															</h4>
															<p class="sub-heading">
																({{ __("In") }} {{$sign->name}})
															</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="price" type="number" class="input-field" placeholder="{{ __("e.g 20") }}" step="0.1" value="{{round($data->price * $sign->value , 2)}}" required="" min="0">
													</div>
												</div>

												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Product Previous Price") }}*</h4>
																<p class="sub-heading">{{ __("(Optional)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input name="previous_price" step="0.1" type="number" class="input-field" placeholder="e.g 20" value="{{round($data->previous_price * $sign->value , 2)}}" min="0">
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">
																	{{ __("Product Description") }}*
															</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<div class="text-editor">
															<textarea class="ckeditor form-control" name="details">{{$data->details}}</textarea> 
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">
																	{{ __("Product Arabic Description") }}*
															</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<div class="text-editor">
															<textarea class="ckeditor form-control" name="details_ar">{{$data->details_ar}}</textarea> 
														</div>
													</div>
												</div>
												


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">
																	{{ __("Product Buy/Return Policy") }}*
															</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<div class="text-editor">
															<textarea class="ckeditor form-control" name="policy">{{$data->policy}}</textarea> 
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															<h4 class="heading">
																	{{ __("Product Arabic Buy/Return Policy") }}*
															</h4>
														</div>
													</div>
													<div class="col-lg-7">
														<div class="text-editor">
															<textarea class="ckeditor form-control" name="policy_ar">{{$data->policy_ar}}</textarea> 
														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Youtube Video URL") }}*</h4>
																<p class="sub-heading">{{ __("(Optional)") }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input  name="youtube" type="text" class="input-field" placeholder="Enter Youtube Video URL" value="{{$data->youtube}}">
						                            <div class="checkbox-wrapper">
						                              <input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
						                              <label for="allowProductSEO">{{ __("Allow Product SEO") }}</label>
						                            </div>
													</div>
												</div>



						                        <div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description)  == null && $data->title == null  && $data->title_ar == null  ) ? "showbox":"" }}">
						                          
						                          
						                          <div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Product Title') }}* </h4>
																<p class="sub-heading">{{ __('(In Any Language)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __('Enter Product Title') }}" name="title"  value="{{ $data->title }}" >
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __('Product title') }}* </h4>
																<p class="sub-heading">{{ __('(Arabic)') }}</p>
														</div>
													</div>
													<div class="col-lg-7">
														<input type="text" class="input-field" placeholder="{{ __('Enter Product Arabic Title') }}" name="title_ar" value="{{ $data->title_ar }}" >
													</div>
												</div>
						                          
						                          
						                          
						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                  <h4 class="heading">{{ __('Meta Tags') }} *</h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <ul id="metatags" class="myTags">
						                              	@if(!empty($data->meta_tag))
							                                @foreach ($data->meta_tag as $element)
							                                  <li>{{  $element }}</li>
							                                @endforeach
						                                @endif
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
						                                <textarea name="meta_description" class="input-field" placeholder="{{ __('Details') }}">{{ $data->meta_description }}</textarea>
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
						                                <textarea name="meta_description_ar" class="input-field" placeholder="{{ __('Arabic Details') }}">{{ $data->meta_description_ar }}</textarea>
						                              </div>
						                            </div>
						                          </div>
						                          
						                          
						                           <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __('Tags') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7">
						                            <ul id="tags" class="myTags">
						                            	@if(!empty($data->tags))
							                                @foreach ($data->tags as $element)
							                                  <li>{{  $element }}</li>
							                                @endforeach
						                                @endif
						                            </ul>
						                          </div>
						                        </div>
						                        
						                        
						                              <div class="row">
						                          <div class="col-lg-4">
						                            <div class="left-area">
						                                <h4 class="heading">{{ __('Arabic Tags') }} *</h4>
						                            </div>
						                          </div>
						                          <div class="col-lg-7" >
						                              
						                              
						                            <ul id="atags" class="myTags" >
						                                 
											 <li>{{$data->tags_ar }}    </li>                             
											                               
											                               
						                            </ul>
						                          </div>
						                        </div>
						                          
						                          
						                          
						                          
						                        </div>  

   	<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7">
													
						                            <div class="checkbox-wrapper">
						                              <input type="checkbox" name="feature" value="1" class="checkclick3" id="allowProductfeature" {{ ($data->feature != 0) ? 'checked':'' }}>
						                              <label for="allowProductfeature">{{ __('Allow Product feature settings ') }}</label>
						                            </div>
													</div>
												</div>
						                        
						                        <div class="{{ $data->feature == 0  ? "showbox " :" " }} subs" >
						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                  <h4 class="heading">{{ __('Subscription type') }}: </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                           <select name="subscription_type" class>
						                               <option value="Days" {{$data->subscription_type == "Days" ? "selected" : ""}}>Days</option>
						                               <option value="Months" {{$data->subscription_type == "Months" ? "selected" : ""}}>Months</option>
						                               <option value="Years" {{$data->subscription_type == "Years" ? "selected" : ""}}>Years</option>
						                           </select>
						                            </div>
						                          </div>

						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                <h4 class="heading">
						                                    {{ __('subscription period') }} :
						                                </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <div class="text-editor">
						                                <input name="subscription_period" type="number" min="0" class="input-field" placeholder="{{ __('subscription period') }}" value="{{ $data->subscription_period }}">
						                              </div>
						                            </div>
						                          </div>     
						                          
						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                <h4 class="heading">
						                                    {{ __('subscription trial period') }} :
						                                </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                              <div class="text-editor">
						                                <input name="trial_period" type="number" min="0" class="input-field" placeholder="{{ __('trial period') }}" value="{{ $data->trial_period }}">
						                              </div>
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
																<h4 class="title">{{ __("Feature Tags") }}</h4>
															</div>

															<div class="feature-tag-top-filds" id="feature-section">
																@if(!empty($data->features))

																	 @foreach($data->features as $key => $data1)

																<div class="feature-area">
																	<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																	<div class="row">
																		<div class="col-lg-6">
																		<input type="text" name="features[]" class="input-field" placeholder="{{ __("Enter Your Keyword") }}" value="{{ $data->features[$key] }}">
																		</div>

																		<div class="col-lg-6">
											                                <div class="input-group colorpicker-component cp">
											                                  <input type="text" name="colors[]" value="{{ $data->colors[$key] }}" class="input-field cp"/>
											                                  <span class="input-group-addon"><i></i></span>
											                                </div>
																		</div>
																	</div>
																</div>


																		@endforeach
																@else 

																<div class="feature-area">
																	<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																	<div class="row">
																		<div class="col-lg-6">
																		<input type="text" name="features[]" class="input-field" placeholder="{{ __("Enter Your Keyword") }}">
																		</div>

																		<div class="col-lg-6">
											                                <div class="input-group colorpicker-component cp">
											                                  <input type="text" name="colors[]" value="#000000" class="input-field cp"/>
											                                  <span class="input-group-addon"><i></i></span>
											                                </div>
																		</div>
																	</div>
																</div>

																@endif
															</div>

															<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __("Add More Field") }}</a>
														</div>
													</div>
												</div>


						                      
                                            	<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
																<h4 class="heading">{{ __("Related Products") }} :</h4>
														</div>
													</div>
													<div class="col-lg-7">
															
																	
						                                               <select class="form-control" name="related[]" multiple="multiple"
                                                                            >
						                                                
                                                                        @forelse($pro as $app)
                                                                            <option value="{{$app->id}}">{{$app->name}}</option>
                                    
                                                                        @empty
                                    
                                                                        @endforelse
                                                                    </select>
						                                    
													</div>
												</div>
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7">
														<table class="table">
                                                                  <thead class="thead-dark">
                                                                    <tr>
                                                                      <th style="padding: 7px;" scope="col">#</th>
                                                                      <th scope="col">Product Name</th>
                                                                     
                                                                      <th scope="col">Action</th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    @forelse($Related as $key=>$r)  
                                                                    @php 
                                                                    $p = App\Models\Product::where('id',$r->related_id)->first();
                                                                    @endphp
                                                                    <tr>
                                                                      <th style="padding: 7px;" scope="row">{{$key+1}}</th>
                                                                      @if($p)  <td>{{$p->name}}</td> @else  <td>Product Deleted</td> @endif 
                                                                      
                                                                      <td><a href="{{route('admin-related-delete',$r->id)}}"  class="delete"><i class="fas fa-trash-alt"></i> </a></td>
                                                                    </tr>
                                                                   @empty
                                                                    <tr style="text-align: center;">
                                                                      <th colspan="3" scope="row" >No Related Product</th>
                                                                     
                                                                    </tr>
                                                                   
                                                                   @endforelse
                                                                  </tbody>
                                                                </table>	
																	
						                                             
						                                    
													</div>
												</div>
												
												<div class="row">
													<div class="col-lg-4">
														<div class="left-area">
															
														</div>
													</div>
													<div class="col-lg-7 text-center">
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

		<div class="modal fade" id="setgallery" tabindex="-1" role="dialog" aria-labelledby="setgallery" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">{{ __("Image Gallery") }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="top-area">
						<div class="row">
							<div class="col-sm-6 text-right">
								<div class="upload-img-btn">
									<form  method="POST" enctype="multipart/form-data" id="form-gallery">
										{{ csrf_field() }}
									<input type="hidden" id="pid" name="product_id" value="">
									<input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/*" multiple>
											<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ __("Upload File") }}</label>
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __("Done") }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ __("You can upload multiple Images.") }}</small> )</div>
						</div>
					</div>
					<div class="gallery-images">
						<div class="selected-image">
							<div class="row">


							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>

@endsection

@section('scripts')

<script type="text/javascript">
	
// Gallery Section Update

    $(document).on("click", ".set-gallery" , function(){
        var pid = $(this).find('input[type=hidden]').val();
        $('#pid').val(pid);
        $('.selected-image .row').html('');
            $.ajax({
                    type: "GET",
                    url:"{{ route('admin-gallery-show') }}",
                    data:{id:pid},
                    success:function(data){
                      if(data[0] == 0)
                      {
	                    $('.selected-image .row').addClass('justify-content-center');
	      				$('.selected-image .row').html('<h3>{{ __("No Images Found.") }}</h3>');
     				  }
                      else {
	                    $('.selected-image .row').removeClass('justify-content-center');
	      				$('.selected-image .row h3').remove();      
                          var arr = $.map(data[1], function(el) {
                          return el });

                          for(var k in arr)
                          {
        				$('.selected-image .row').append('<div class="col-sm-6">'+
                                        '<div class="img gallery-img">'+
                                            '<span class="remove-img"><i class="fas fa-times"></i>'+
                                            '<input type="hidden" value="'+arr[k]['id']+'">'+
                                            '</span>'+
                                            '<a href="'+'{{asset('assets/images/galleries').'/'}}'+arr[k]['photo']+'" target="_blank">'+
                                            '<img src="'+'{{asset('assets/images/galleries').'/'}}'+arr[k]['photo']+'" alt="gallery image">'+
                                            '</a>'+
                                        '</div>'+
                                  	'</div>');
                          }                         
                       }
 
                    }
                  });
      });


  $(document).on('click', '.remove-img' ,function() {
    var id = $(this).find('input[type=hidden]').val();
    $(this).parent().parent().remove();
	    $.ajax({
	        type: "GET",
	        url:"{{ route('admin-gallery-delete') }}",
	        data:{id:id}
	    });
  });

  $(document).on('click', '#prod_gallery' ,function() {
    $('#uploadgallery').click();
  });
                                        
                                
  $("#uploadgallery").change(function(){
    $("#form-gallery").submit();  
  });

  $(document).on('submit', '#form-gallery' ,function() {
		  $.ajax({
		   url:"{{ route('admin-gallery-store') }}",
		   method:"POST",
		   data:new FormData(this),
		   dataType:'JSON',
		   contentType: false,
		   cache: false,
		   processData: false,
		   success:function(data)
		   {
		    if(data != 0)
		    {
	                    $('.selected-image .row').removeClass('justify-content-center');
	      				$('.selected-image .row h3').remove();   
		        var arr = $.map(data, function(el) {
		        return el });
		        for(var k in arr)
		           {
        				$('.selected-image .row').append('<div class="col-sm-6">'+
                                        '<div class="img gallery-img">'+
                                            '<span class="remove-img"><i class="fas fa-times"></i>'+
                                            '<input type="hidden" value="'+arr[k]['id']+'">'+
                                            '</span>'+
                                            '<a href="'+'{{asset('assets/images/galleries').'/'}}'+arr[k]['photo']+'" target="_blank">'+
                                            '<img src="'+'{{asset('assets/images/galleries').'/'}}'+arr[k]['photo']+'" alt="gallery image">'+
                                            '</a>'+
                                        '</div>'+
                                  	'</div>');
		            }          
		    }
		                     
		                       }

		  });
		  return false;
 }); 


// Gallery Section Update Ends	

</script>

<script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>

<script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

<script type="text/javascript">
	
$('.cropme').simpleCropper();
$('#crop-image').on('click',function(){
$('.cropme').click();
});
</script>


  <script type="text/javascript">
  $(document).ready(function() {

    let html = `<img src="{{ empty($data->photo) ? asset('assets/images/noimage.png') : asset('assets/images/products/'.$data->photo) }}" alt="">`;
    $(".span4.cropme").html(html);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  });


  $('.ok').on('click', function () {

 setTimeout(
    function() {


  	var img = $('#feature_photo').val();

      $.ajax({
        url: "{{route('admin-prod-upload-update',$data->id)}}",
        type: "POST",
        data: {"image":img},
        success: function (data) {
          if (data.status) {
            $('#feature_photo').val(data.file_name);
          }
          if ((data.errors)) {
            for(var error in data.errors)
            {
              $.notify(data.errors[error], "danger");
            }
          }
        }
      });

    }, 1000);



    });
    $(".checkclick3").on( "change", function() {
            if(this.checked){
             $(".subs").removeClass('showbox');  
            }
            else{
             $(".subs").addClass('showbox');   
            }
        });
  </script>

<script src="{{asset('assets/admin/js/product.js')}}"></script>

 <script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
       
    });
</script>
@endsection