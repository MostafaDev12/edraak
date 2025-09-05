@extends('layouts.admin')
@section('styles')


	<link href="{{asset('assets/admin/css/product.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/jquery.Jcrop.css')}}" rel="stylesheet"/>
	<link href="{{asset('assets/admin/css/Jcrop-style.css')}}" rel="stylesheet"/>
	<style>

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
	@if($gs->light_dark == 0)

	@else


	@endif


@endsection
@section('content')
	@php
	$sign = App\Models\Currency::where('is_default',1)->first();
	@endphp

	<div class="content-area">
		<div class="mr-breadcrumb">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="heading">{{ __('Physical Product') }} <a class="add-btn" href="{{ route('admin-prod-types') }}"><i class="fas fa-arrow-left"></i> {{ __('Back') }}</a></h4>
					<ul class="links">
						<li>
							<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
						</li>
						<li>
							<a href="javascript:;">{{ __('Products') }} </a>
						</li>
						<li>
							<a href="{{ route('admin-prod-index') }}">{{ __('All Careers') }}</a>
						</li>

						<li>
							<a href="{{ route('admin-prod-physical-create') }}">{{ __('Add Career') }}</a>
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
							<form id="geniusform" action="{{route('admin-prod-store')}}" method="POST" enctype="multipart/form-data">
								{{csrf_field()}}

								@include('includes.admin.form-both')

								<div class="tabs">

									<div>

										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Name') }}* </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career Name') }}" name="name" required="">
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Name') }}* </h4>

													<p class="sub-heading">{{ __('(Arabic)') }}</p>
												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career Arabic Name') }}" name="name_ar" required="">
											</div>
										</div>













										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Category') }} *</h4>

												</div>
											</div>
											<div class="col-lg-7">
												<select id="cat" name="category_id" required="">
													<option value="">{{ __('Select Category') }}</option>
													@foreach($cats as $cat)
														<option data-href=" " value="{{ $cat->id }}">{{$cat->name}}</option>
													@endforeach
												</select>
											</div>
										</div>

								{{--		<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Sub Category') }}</h4>
												</div>
											</div>
											<div class="col-lg-7">
												<select id="subcat" name="subcategory_id" disabled="">
													<option value="">{{ __('Select Sub Category') }}</option>
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
												<select id="childcat" name="childcategory_id" disabled="">
													<option value="">{{ __('Select Child Category') }}</option>
												</select>
											</div>
										</div>--}}


										<div id="catAttributes"></div>
										<div id="subcatAttributes"></div>
										<div id="childcatAttributes"></div>





























										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career Type') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career Type') }}" name="job_type" >
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career location') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career location') }}" name="job_location" >
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career salary') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="text" class="input-field" placeholder="{{ __('Enter Career salary') }}" name="job_salary" >
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Career date') }} </h4>

												</div>
											</div>
											<div class="col-lg-7">
												<input type="date" class="input-field" placeholder="{{ __('Enter Career date') }}" name="job_date" >
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
													<textarea class="ckeditor form-control" name="details"></textarea>
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
													<textarea class="ckeditor form-control" name="details_ar"></textarea>
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
													<input type="checkbox" name="seo_check" value="1" class="checkclick" id="allowProductSEO" value="1">
													<label for="allowProductSEO">{{ __('Allow Career SEO') }}</label>
												</div>
											</div>
										</div>



										<div class="showbox">
											<div class="row">
												<div class="col-lg-4">
													<div class="left-area">
														<h4 class="heading">{{ __('Meta Tags') }} </h4>
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
															{{ __('Meta Description') }}
														</h4>
													</div>
												</div>
												<div class="col-lg-7">
													<div class="text-editor">
														<textarea name="meta_description" class="input-field" placeholder="{{ __('Meta Description') }}"></textarea>
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
														<textarea name="meta_description_ar" class="input-field" placeholder="{{ __('Arabic Meta Description') }}"></textarea>
													</div>
												</div>
											</div>
										</div>


										<!--    	<div class="row">
													<div class="col-lg-4">
														<div class="left-area">

														</div>
													</div>
													<div class="col-lg-7">

						                            <div class="checkbox-wrapper">
						                              <input type="checkbox" name="feature" value="1" class="checkclick3" id="allowProductfeature" >
						                              <label for="allowProductfeature">{{ __('Subscription feature settings ') }}</label>
						                            </div>
													</div>
												</div>

						                        <div class="showbox subs" >
						                          <div class="row">
						                            <div class="col-lg-4">
						                              <div class="left-area">
						                                  <h4 class="heading">{{ __('Subscription type') }}: </h4>
						                              </div>
						                            </div>
						                            <div class="col-lg-7">
						                           <select name="subscription_type" class>
						                               <option value="Days">Days</option>
						                               <option value="Months">Months</option>
						                               <option value="Years">Years</option>
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
						                                <input name="subscription_period" type="number" min="0" class="input-field" placeholder="{{ __('subscription period') }}" value="0">
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
						                                <input name="trial_period" type="number" min="0" class="input-field" placeholder="{{ __('trial period') }}" value="0">
						                              </div>
						                            </div>
						                          </div>

						                        </div>-->




										{{--<div class="row">
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
														<div class="feature-area">
															<span class="remove feature-remove"><i class="fas fa-times"></i></span>
															<div class="row">
																<div class="col-lg-6">
																	<input type="text" name="features[]" class="input-field" placeholder="{{ __('Enter Your Keyword') }}">
																</div>

																<div class="col-lg-6">
																	<div class="input-group colorpicker-component cp">
																		<input type="text" name="colors[]" value="#000000" class="input-field cp"/>
																		<span class="input-group-addon"><i></i></span>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<a href="javascript:;" id="feature-btn" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
												</div>
											</div>
										</div>--}}


										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">
													<h4 class="heading">{{ __('Tags') }} </h4>
												</div>
											</div>
											<div class="col-lg-7" >


												<ul id="tags" class="myTags" >




												</ul>
											</div>
										</div>



										<div class="row">
											<div class="col-lg-4">
												<div class="left-area">

												</div>
											</div>
											<div class="col-lg-7 text-center">
												<button class="addProductSubmit-btn" type="submit">{{ __('Create Career') }}</button>
											</div>
										</div>

									</div>





								</div>



								<input type="hidden" name="type" value="Physical">


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
									<label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> )<span class='ml-2 span-img-size'>image size 205px X 205px</span></div>
						</div>
					</div>
					<div class="gallery-images">
						<div class="selected-image selected-image-web">
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
									<label for="image-upload" id="prod_gallery_mobile"><i class="icofont-upload-alt"></i>{{ __('Upload File') }}</label>
								</div>
							</div>
							<div class="col-sm-6">
								<a href="javascript:;" class="upload-done" data-dismiss="modal"> <i class="fas fa-check"></i> {{ __('Done') }}</a>
							</div>
							<div class="col-sm-12 text-center">( <small>{{ __('You can upload multiple Images.') }}</small> ) <span class='span-img-size'>Image size 205px X 205px</span></div>
						</div>
					</div>
					<div class="gallery-images">
						<div class="selected-image selected-image-mobile ">
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

		// Gallery Section Insert

		$(document).on('click', '.remove-img' ,function() {
			var id = $(this).find('input[type=hidden]').val();
			$('#galval'+id).remove();
			$(this).parent().parent().remove();
		});

		$(document).on('click', '#prod_gallery' ,function() {
			$('#uploadgallery').click();
			$('.selected-image-web .row').html('');
			$('#geniusform').find('.removegal').val(0);
		});


		$("#uploadgallery").change(function(){
			var total_file=document.getElementById("uploadgallery").files.length;
			for(var i=0;i<total_file;i++)
			{
				$('.selected-image-web .row').append('<div class="col-sm-6">'+
						'<div class="img gallery-img">'+
						'<span class="remove-img"><i class="fas fa-times"></i>'+
						'<input type="hidden" value="'+i+'">'+
						'</span>'+
						'<a href="'+URL.createObjectURL(event.target.files[i])+'" target="_blank">'+
						'<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
						'</a>'+
						'</div>'+
						'</div> '
				);
				$('#geniusform').append('<input type="hidden" name="galval[]" id="galval'+i+'" class="removegal" value="'+i+'">')
			}

		});



		$(document).on('click', '#prod_gallery_mobile' ,function() {
			$('#uploadgallerymobile').click();
			$('.selected-image-mobile .row').html('');
			$('#geniusform').find('.removegal').val(0);
		});


		$("#uploadgallerymobile").change(function(){
			var total_file=document.getElementById("uploadgallerymobile").files.length;
			for(var i=0;i<total_file;i++)
			{
				$('.selected-image-mobile .row').append('<div class="col-sm-6">'+
						'<div class="img gallery-img">'+
						'<span class="remove-img"><i class="fas fa-times"></i>'+
						'<input type="hidden" value="'+i+'">'+
						'</span>'+
						'<a href="'+URL.createObjectURL(event.target.files[i])+'" target="_blank">'+
						'<img src="'+URL.createObjectURL(event.target.files[i])+'" alt="gallery image">'+
						'</a>'+
						'</div>'+
						'</div> '
				);
				$('#geniusform').append('<input type="hidden" name="galvalm[]" id="galval'+i+'" class="removegal" value="'+i+'">')
			}

		});

		// Gallery Section Insert Ends

	</script>

	<script type="text/javascript">

		$('.cropme').simpleCropper();
		$('#crop-image').on('click',function(){
			$('.cropme').click();
		});

		$('#crop-image2').on('click',function(){
			$('.cropme').click();
		});

		$('.mobile').on('click',function(){
			$('#feature_mobile_photo').click();
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

	<script src="{{asset('assets/admin/js/product.js')}}"></script>
	<script src="{{asset('assets/admin/js/jscolor.js')}}"></script>


	<script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.ckeditor').ckeditor();

		});
	</script>
@endsection
