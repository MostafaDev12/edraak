@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="{{ __('contacts') }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('contacts') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-Contact-index') }}">{{ __('all contacts') }}</a>
											</li>
										</ul>
								</div>
							</div>
						</div>
						<div class="product-area">
							<div class="row">
								<div class="col-lg-12">
									<div class="mr-table allproduct">

                        @include('includes.admin.form-success')  

										<div class="table-responsiv">
												<table id="geniustable" class="table table-hover dt-responsive" cellspacing="0" width="100%">
													<tbody>
														<tr>
														    <th>{{ __('name') }}</th>
									                        <td>{{ $data->first_name  }} {{ $data->last_name  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('email') }}</th>
									                        <td>{{ $data->email }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('phone') }}</th>
									                        <td>{{ $data->phone }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('country') }}</th>
									                        <td>{{ $data->country }}</td>
									                    </tr> 
									                    <tr>
														    <th>{{ __('city') }}</th>
									                        <td>{{ $data->city }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('company') }}</th>
									                        <td>{{ $data->company  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('website') }}</th>
									                        <td>{{ $data->website  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('industry') }}</th>
									                        <td>{{ $data->industry  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('job_role') }}</th>
									                        <td>{{ $data->job_role  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('customers') }}</th>
									                        <td>{{ $data->customers  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('message') }}</th>
									                        <td>{{ $data->message  }}</td>
									                    </tr>

                                                        <tr>
														    <th>{{ __('created_at') }}</th>
									                        <td>{{ $data->created_at   }}</td>
									                    </tr>
													</tbody>
												</table>
										</div>
										

									</div>
								</div>
							</div>
						</div>
						
						
					</div>





@endsection    



@section('scripts')




    





@endsection   