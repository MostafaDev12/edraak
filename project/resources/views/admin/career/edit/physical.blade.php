@extends('layouts.admin')
@section('styles')

	<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
	@if($gs->light_dark == 0)
		<link href="{{asset('assets/admin/css/bootstrap-tagsinput.css')}}" rel="stylesheet"/>

	@else
		<link href="{{asset('assets/admin/css/light/bootstrap-tagsinput.css')}}" rel="stylesheet"/>
	@endif
	<style>
		* {box-sizing: border-box}

		/* Set height of body and the document to 100% */
		body, html {
			height: 100%;
			margin: 0;

		}

		/* Style tab links */
		.tablink {
			background-color: #555;
			color: white;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			font-size: 17px;
			width: 50%;
		}

		.tablink:hover {
			background-color: #777;
			color: white;
		}

		/* Style the tab content (and add height:100% for full page content) */
		.tabcontent {

			display: none;
			padding: 100px 20px;
			height: 100%;
		}

		/*DSADSADASD*/



		button:focus,
		input:focus,
		textarea:focus,
		select:focus {
			outline: none; }

		.tabs {
			display: block;
			display: -webkit-flex;
			display: -moz-flex;
			display: flex;
			-webkit-flex-wrap: wrap;
			-moz-flex-wrap: wrap;
			flex-wrap: wrap;
			margin: 0;
			overflow: hidden; }
		.tabs .label [class^="tab"] label ,
		.tabs .label [class*=" tab"] label  {

			cursor: pointer;
			display: block;
			font-size: 1.1em;
			font-weight: 300;
			line-height: 1em;
			padding: 2rem 0;
			text-align: center; }
		.tabs [class^="tab"] [type="radio"],
		.tabs [class*=" tab"] [type="radio"] {
			border-bottom: 1px solid rgba(239, 237, 239, 0.5);
			cursor: pointer;
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			display: block;
			width: 100%;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out; }
		.tabs [class^="tab"] [type="radio"]:hover, .tabs [class^="tab"] [type="radio"]:focus,
		.tabs [class*=" tab"] [type="radio"]:hover,
		.tabs [class*=" tab"] [type="radio"]:focus {
			border-bottom: 1px solid #1F224F; }
		.tabs [class^="tab"] [type="radio"]:checked,
		.tabs [class*=" tab"] [type="radio"]:checked {
			border-bottom: 2px solid #1F224F; }
		.tabs [class^="tab"] [type="radio"]:checked + div,
		.tabs [class*=" tab"] [type="radio"]:checked + div {
			opacity: 1; }
		.tabs [class^="tab"] [type="radio"] + div,
		.tabs [class*=" tab"] [type="radio"] + div {
			display: block;
			opacity: 0;
			padding: 2rem 0;
			width: 90%;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out; }
		.tabs .tab-2 {
			width: 50%; }
		.tabs .tab-2 [type="radio"] + div {
			width: 200%;
			margin-left: 200%; }
		.tabs .tab-2 [type="radio"]:checked + div {
			margin-left: 0; }
		.tabs .tab-2:last-child [type="radio"] + div {
			margin-left: 100%; }
		.tabs .tab-2:last-child [type="radio"]:checked + div {
			margin-left: -100%; }
	</style>

@endsection
@section('content')
	@php
	$sign = App\Models\Currency::where('is_default',1)->first();
	@endphp
	<div class="content-area">
		<div class="mr-breadcrumb">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="heading"> {{ __('Edit Product') }}<a class="add-btn" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
					<ul class="links">
						<li>
							<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
						</li>
						<li>
							<a href="{{ route('admin-prod-index') }}">{{ __('Products') }} </a>
						</li>
						<li>
							<a href="javascript:;">{{ __('Physical Product') }}</a>
						</li>
						<li>
							<a href="javascript:;">{{ __('Edit') }}</a>
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

										<!--    <button class="tablink" onclick="openPage('Home', this, '#1F224F')" id="defaultOpen">{{ __('WebSite Setting') }}</button>
                                            <button class="tablink" onclick="openPage('News', this, '#1F224F')" >{{ __('Mobile Setting') }}</button>


                                            <div id="Home" class="tabcontent">





                                            </div>
                                             <div id="News" class="tabcontent">



                                            </div>




                                            -->
								<div class="tabs">

									<div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Name') }}* </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Product Name') }}" name="name" required="" value="{{ $data->name }}">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Arabic Name') }}* </h4>

													<p class="sub-heading">{{ __('(Arabic)') }}</p>
												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Product Arabic Name') }}" name="name_ar" required="" value="{{ $data->name_ar }}">
											</div>
										</div>








										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Category') }}*</h4>
												</div>
											</div>
											<div class="col-lg-7">
												<select id="cat" name="category_id" required="">
													<option>{{ __('Select Category') }}</option>

													@foreach($cats as $cat)
														<option data-href=" " value="{{$cat->id}}" {{$cat->id == $data->category_id ? "selected":""}} >{{$cat->name}}</option>
													@endforeach
												</select>
											</div>
										</div>

									{{--	<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Sub Category') }}</h4>
													<p class="sub-heading">{{  $langg->lang971  }}</p>
												</div>
											</div>
											<div class="col-lg-7">
												<select id="subcat" name="subcategory_id">
													<option value="">{{ __('Select Sub Category') }}</option>
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
													<h4 class="heading">{{ __('Child Category') }}</h4>
												</div>
											</div>
											<div class="col-lg-7">
												<select id="childcat" name="childcategory_id" {{$data->subcategory_id == null ? "disabled":""}}>
													<option value="">{{ __('Select Child Category') }}</option>
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
										</div>--}}


										@php
										$selectedAttrs = json_decode($data->attributes, true);
										// dd($selectedAttrs);
										@endphp


										{{-- Attributes of category starts --}}
										<div id="catAttributes">
											@php
											$catAttributes = !empty($data->category->attributes) ? $data->category->attributes : '';
											@endphp
											@if (!empty($catAttributes))
												@foreach ($catAttributes as $catAttribute)
													<div class="row">
														<div class="col-lg-4">
															<div class="left-area">
																<h4 class="heading">{{ $catAttribute->name }} </h4>
															</div>
														</div>
														<div class="col-lg-7">
															@php
															$i = 0;
															@endphp
															@foreach ($catAttribute->attribute_options as $optionKey => $option)
																@php
																$inName = $catAttribute->input_name;
																$checked = 0;
																@endphp


																<div class="row">
																	<div class="col-lg-5">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" id="{{ $catAttribute->input_name }}{{$option->id}}" name="{{ $catAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																				   @if (is_array($selectedAttrs) && array_key_exists($catAttribute->input_name,$selectedAttrs))
																				   @if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																				   checked
																				   @php
																				   $checked = 1;
																					@endphp
																					@endif
																					@endif
																			>
																			<label class="custom-control-label" for="{{ $catAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																		</div>
																	</div>

																	<div class="col-lg-7 {{ $catAttribute->price_status == 0 ? 'd-none' : '' }}">
																		<div class="row">
																			<div class="col-2">
																				+
																			</div>
																			<div class="col-10">
																				<div class="price-container">
																					<span class="price-curr">{{ $sign->sign }}</span>
																					<input type="text" class="input-field price-input" id="{{ $catAttribute->input_name }}{{$option->id}}_price" data-name="{{ $catAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>


																@php
																if ($checked == 1) {
																$i++;
																}
																@endphp
															@endforeach
														</div>

													</div>
												@endforeach
											@endif
										</div>
										{{-- Attributes of category ends --}}


										{{-- Attributes of subcategory starts --}}
										<div id="subcatAttributes">
											@php
											$subAttributes = !empty($data->subcategory->attributes) ? $data->subcategory->attributes : '';
											@endphp
											@if (!empty($subAttributes))
												@foreach ($subAttributes as $subAttribute)
													<div class="row">
														<div class="col-lg-4">
															<div class="left-area">
																<h4 class="heading">{{ $subAttribute->name }} *</h4>
															</div>
														</div>
														<div class="col-lg-7">
															@php
															$i = 0;
															@endphp
															@foreach ($subAttribute->attribute_options as $option)
																@php
																$inName = $subAttribute->input_name;
																$checked = 0;
																@endphp

																<div class="row">
																	<div class="col-lg-5">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" id="{{ $subAttribute->input_name }}{{$option->id}}" name="{{ $subAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																				   @if (is_array($selectedAttrs) && array_key_exists($subAttribute->input_name,$selectedAttrs))
																				   @php
																				   $inName = $subAttribute->input_name;
																			@endphp
																			@if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																				checked
																				@php
																				$checked = 1;
																				@endphp
																			@endif
																			@endif
																			>
																			<label class="custom-control-label" for="{{ $subAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																		</div>
																	</div>
																	<div class="col-lg-7 {{ $subAttribute->price_status == 0 ? 'd-none' : '' }}">
																		<div class="row">
																			<div class="col-2">
																				+
																			</div>
																			<div class="col-10">
																				<div class="price-container">
																					<span class="price-curr">{{ $sign->sign }}</span>
																					<input type="text" class="input-field price-input" id="{{ $subAttribute->input_name }}{{$option->id}}_price" data-name="{{ $subAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																@php
																if ($checked == 1) {
																$i++;
																}
																@endphp
															@endforeach

														</div>
													</div>
												@endforeach
											@endif
										</div>
										{{-- Attributes of subcategory ends --}}


										{{-- Attributes of child category starts --}}
										<div id="childcatAttributes">
											@php
											$childAttributes = !empty($data->childcategory->attributes) ? $data->childcategory->attributes : '';
											@endphp
											@if (!empty($childAttributes))
												@foreach ($childAttributes as $childAttribute)
													<div class="row">
														<div class="col-lg-4">
															<div class="left-area">
																<h4 class="heading">{{ $childAttribute->name }} </h4>
															</div>
														</div>
														<div class="col-lg-7">
															@php
															$i = 0;
															@endphp
															@foreach ($childAttribute->attribute_options as $optionKey => $option)
																@php
																$inName = $childAttribute->input_name;
																$checked = 0;
																@endphp
																<div class="row">
																	<div class="col-lg-5">
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" id="{{ $childAttribute->input_name }}{{$option->id}}" name="{{ $childAttribute->input_name }}[]" value="{{$option->name}}" class="custom-control-input attr-checkbox"
																				   @if (is_array($selectedAttrs) && array_key_exists($childAttribute->input_name,$selectedAttrs))
																				   @php
																				   $inName = $childAttribute->input_name;
																			@endphp
																			@if (is_array($selectedAttrs["$inName"]["values"]) && in_array($option->name, $selectedAttrs["$inName"]["values"]))
																				checked
																				@php
																				$checked = 1;
																				@endphp
																			@endif
																			@endif
																			>
																			<label class="custom-control-label" for="{{ $childAttribute->input_name }}{{$option->id}}">{{ $option->name }}</label>
																		</div>
																	</div>


																	<div class="col-lg-7 {{ $childAttribute->price_status == 0 ? 'd-none' : '' }}">
																		<div class="row">
																			<div class="col-2">
																				+
																			</div>
																			<div class="col-10">
																				<div class="price-container">
																					<span class="price-curr">{{ $sign->sign }}</span>
																					<input type="text" class="input-field price-input" id="{{ $childAttribute->input_name }}{{$option->id}}_price" data-name="{{ $childAttribute->input_name }}_price[]" placeholder="0.00 (Additional Price)" value="{{ !empty($selectedAttrs["$inName"]['prices'][$i]) && $checked == 1 ? $selectedAttrs["$inName"]['prices'][$i] : '' }}">
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																@php
																if ($checked == 1) {
																$i++;
																}
																@endphp
															@endforeach
														</div>

													</div>
												@endforeach
											@endif
										</div>
										{{-- Attributes of child category ends --}}

























										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Type') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career Type') }}" name="job_type" value="{{$data->job_type}}">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career location') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career location') }}" name="job_location" value="{{$data->job_location}}">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career salary') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career salary') }}" name="job_salary" value="{{$data->job_salary}}">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career date') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="date" class="input-field" placeholder="{{ __('Enter Career date') }}" name="job_date" value="{{$data->job_date}}">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">
														{{ __('Career Description') }}
													</h4>
												</div>
											</div>
											<div class="col-lg-7">
												<div class="text-editor">
													<textarea name="details" class="ckeditor form-control">{{$data->details}}</textarea>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">
														{{ __('Career Arabic Description') }}
													</h4>
												</div>
											</div>
											<div class="col-lg-7">
												<div class="text-editor">
													<textarea name="details_ar" class="ckeditor form-control">{{$data->details_ar}}</textarea>
												</div>
											</div>
										</div>






										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">

													<p class="sub-heading">{{ __('(Optional)') }}</p>
												</div>
											</div>
											<div class="col-lg-7">

												<div class="checkbox-wrapper">
													<input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" {{ ($data->meta_tag != null || strip_tags($data->meta_description) != null) ? 'checked':'' }}>
													<label for="allowProductSEO">{{ __('Allow Product SEO') }}</label>
												</div>
											</div>
										</div>



										<div class="{{ ($data->meta_tag == null && strip_tags($data->meta_description) == null) ? "showbox":"" }}">
											<div class="row">
												<div class="col-lg-4">
													<div class="left-area">
														<h4 class="heading">{{ __('Meta Tags') }} </h4>
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
															{{ __('Meta Description') }}
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
															{{ __('Arabic Meta Description') }}
														</h4>
													</div>
												</div>
												<div class="col-lg-7">
													<div class="text-editor">
														<textarea name="meta_description_ar" class="input-field" placeholder="{{ __('Arabic Details') }}">{{ $data->meta_description_ar }}</textarea>
													</div>
												</div>
											</div>
										</div>



										<!--<div class="row">
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
						                        -->

										<!--      <div class="{{ $data->feature == 0  ? "showbox " :" " }} subs" >
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

						                        </div>-->

										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">

												</div>
											</div>
											<div class="col-lg-7">
												<div class="featured-keyword-area">
													<div class="heading-area">
														<h4 class="title">{{ __('Feature Tags') }}</h4>
													</div>

													<div class="feature-tag-top-filds" id="feature-section">
														@if(!empty($data->features))

															@foreach($data->features as $key => $data1)

																<div class="feature-area">
																	<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																	<div class="row">
																		<div class="col-lg-6">
																			<input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}" value="{{ $data->features[$key] }}">
																		</div>

																		<div class="col-lg-6">

																				<input type="text" name="colors[]" value="{{ $data->colors[$key] }}" class="input-field "/>


																		</div>
																	</div>
																</div>


															@endforeach
														@else

															<div class="feature-area">
																<span class="remove feature-remove"><i class="fas fa-times"></i></span>
																<div class="row">
																	<div class="col-lg-6">
																		<input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}">
																	</div>

																	<div class="col-lg-6">

																			<input type="text" name="colors[]" value="" class="input-field "/>


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
													<h4 class="heading">{{ __('Tags') }} </h4>
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

												</div>
											</div>
											<div class="col-lg-7 text-center">
												<button class="addProductSubmit-btn" type="submit">{{ __('Save') }}</button>
											</div>
										</div>

									</div>
								</div>








								<!-- End-->


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
					<h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
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
										<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
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
	<div class="modal fade" id="setgallerymobile" tabindex="-1" role="dialog" aria-labelledby="setgallerymobile" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Image Gallery') }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="top-area">
						<div class="row">
							<div class="col-sm-6 text-right">
								<div class="upload-img-btn">
									<form  method="POST" enctype="multipart/form-data" id="form-gallery-mobile">
										{{ csrf_field() }}
										<input type="hidden" id="pidd" name="product_id" value="">
										<input type="file" name="gallery[]" class="hidden" id="uploadgallerymobile" accept="image/*" multiple>
										<label for="image-upload" id="prod_gallery_mobile"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
									</form>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )</div>
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



	<script src="{{asset('assets/admin/js/jquery.Jcrop.js')}}"></script>

	<script src="{{asset('assets/admin/js/jquery.SimpleCropper.js')}}"></script>

	<script type="text/javascript">

		$('.cropme').simpleCropper();

		$('#crop-image').on('click',function(){
			$('.cropme').click();
		});

		$('.mobile').on('click',function(){
			$('#feature_mobile_photo').click();
		});


	</script>



	<script type="text/javascript">

		$('#imageSource').on('change', function () {
			var file = this.value;
			if (file == "file"){
				$('#f-file').show();
				$('#f-link').hide();
			}
			if (file == "link"){
				$('#f-file').hide();
				$('#f-link').show();
			}
		});

		/*$(document).ready(function(){
		 $('.size-color').tokenfield({
		 autocomplete:{
		 source: ['PHP','Codeigniter','HTML','JQuery','Javascript','CSS','Laravel','CakePHP','Symfony','Yii 2','Phalcon','Zend','Slim','FuelPHP','PHPixie','Mysql'],
		 delay:100
		 },
		 showAutocompleteOnFocus: true
		 });
		 });*/



		$(".checkclick3").on( "change", function() {
			if(this.checked){
				$(".subs").removeClass('showbox');
			}
			else{
				$(".subs").addClass('showbox');
			}
		});
	</script>
	<script type="text/javascript" src="{{asset('assets/admin/js/bootstrap-tagsinput.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/admin/js/product.js')}}"></script>

	<script type="text/javascript">

		$('.size-color').val();


	</script>
	<script type="text/javascript">
		$("input.space").on({
			keydown: function(e) {
				if (e.which === 32)
					return false;
			},
			change: function() {
				this.value = this.value.replace(/\s/g, "");
			}
		});

	</script>
	<script>
		/*function openPage(pageName,elmnt,color) {
		 var i, tabcontent, tablinks;
		 tabcontent = document.getElementsByClassName("tabcontent");
		 for (i = 0; i < tabcontent.length; i++) {
		 tabcontent[i].style.display = "none";
		 }
		 tablinks = document.getElementsByClassName("tablink");
		 for (i = 0; i < tablinks.length; i++) {
		 tablinks[i].style.backgroundColor = "";
		 }
		 document.getElementById(pageName).style.display = "block";
		 elmnt.style.backgroundColor = color;
		 }

		 // Get the element with id="defaultOpen" and click on it
		 document.getElementById("defaultOpen").click();*/
	</script>


	<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.ckeditor').ckeditor();

		});
	</script>
@endsection
