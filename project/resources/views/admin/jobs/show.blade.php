@extends('layouts.admin') 

@section('content')  
					<input type="hidden" id="headerdata" value="{{ __('all applied Page') }}">
					<div class="content-area">
						<div class="mr-breadcrumb">
							<div class="row">
								<div class="col-lg-12">
										<h4 class="heading">{{ __('all applied Page') }}</h4>
										<ul class="links">
											<li>
												<a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
											</li>
											<li>
												<a href="{{ route('admin-applied-index') }}">{{ __('all applied Page') }}</a>
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
									                        <td>{{ $data->name }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('email') }}</th>
									                        <td>{{ $data->email }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('phones') }}</th>
									                        <td>{{ $data->phones }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('country') }}</th>
									                        <td>{{ $data->country }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('city') }}</th>
									                        <td>{{ $data->city  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('start_date') }}</th>
									                        <td>{{ $data->start_date  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('relocate') }}</th>
									                        <td>{{ $data->relocate  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('salary_expectation') }}</th>
									                        <td>{{ $data->salary_expectation  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('hear_from') }}</th>
									                        <td>{{ $data->hear_from  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('ex_military') }}</th>
									                        <td>{{ $data->ex_military  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('career_name') }}</th>
									                        <td>{{ $data->career_name  }}</td>
									                    </tr>
                                                        <tr>
														    <th>{{ __('created_at') }}</th>
									                        <td>{{ $data->created_at   }}</td>
									                    </tr> <tr>
														    <th>{{ __('resume') }}</th>
									                        <td><a href="{{ asset('assets/images/cv/'.$data->resume)}}" download>
                                                                    download
                                                                </a></td>
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