@extends('layouts.admin')

@section('content')

<div class="content-area">
              <div class="mr-breadcrumb">
                <div class="row">
                  <div class="col-lg-12">
                      <h4 class="heading">{{ __('Email Configuration') }}</h4>
                    <ul class="links">
                      <li>
                        <a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }} </a>
                      </li>
                      <li>
                        <a href="javascript:;">{{ __('Email Settings') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('admin-mail-config') }}">{{ __('Email Configuration') }}</a>
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
                        <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        @include('includes.admin.form-both')  

                        <div class="row justify-content-center">
                            <div class="col-lg-3">
                              <div class="left-area">
                                <h4 class="heading">
                                    {{ __('SMTP') }}
                                </h4>
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="action-list">
                                    <select class="process select droplinks {{ $gs->is_smtp == 1 ? 'drop-success' : 'drop-danger' }}">
                                      <option data-val="1" value="{{route('admin-gs-issmtp',1)}}" {{ $gs->is_smtp == 1 ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                      <option data-val="0" value="{{route('admin-gs-issmtp',0)}}" {{ $gs->is_smtp == 0 ? 'selected' : '' }}>{{ __('Deactivated') }}</option>
                                    </select>
                                  </div>
                            </div>
                          </div>
                       

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SMTP Host') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('SMTP Host') }}" name="smtp_host" value="{{ $gs->smtp_host }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SMTP Port') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('SMTP Port') }} " name="smtp_port" value="{{ $gs->smtp_port }}" required="">
                          </div>
                        </div>



                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Encryption') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Encryption') }} " name="email_encryption" value="{{ $gs->email_encryption }}" required="">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SMTP Username') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('SMTP Username') }} " name="smtp_user" value="{{ $gs->smtp_user }}">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('SMTP Password') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('SMTP Password') }} " name="smtp_pass" value="{{ $gs->smtp_pass }}">
                          </div>
                        </div>
 {{-- 
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('From Email') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('From Email') }} " name="from_email" value="{{ $gs->from_email }}">
                          </div>
                        </div>

                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('From Name') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('From Name') }} " name="from_name" value="{{ $gs->from_name }}">
                          </div>
                        </div>
<div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                                <h4 class="heading">{{ __('Emails will sent to ') }} *
                                  </h4>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="text" class="input-field" placeholder="{{ __('Emails will sent to ') }} " name="email" value="{{ $gs->email }}">
                          </div>
                        </div>--}}
                        <div class="row">
                        
                                <div class="col-lg-4">
                                    <div class="left-area">

                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="featured-keyword-area">
                                        <div class="heading-area">
                                            <h4 class="title">{{ __('Career Emails') }}</h4>
                                        </div>

                                        <div class="feature-tag-top-filds" id="feature-section2">
                                            @if(!empty($gs->career_emails))
                                                @php
                                                $addresses =    explode(',', $gs->career_emails);
                                             
                                                @endphp
                                                @foreach($addresses as $key => $data1)

                                                    <div class="feature-area">
                                                        <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <input type="text" name="career_emails[]" class="input-field" placeholder="{{ __('Enter Your career_emails') }}" value="{{ $addresses[$key] }}">
                                                            </div>

                                                           
                                                        </div>
                                                    </div>


                                                @endforeach
                                            @else

                                                <div class="feature-area">
                                                    <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="text" name="career_emails[]" class="input-field" placeholder="{{ __('Enter Your career_emails') }}">
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
                            <div class="featured-keyword-area">
                                <div class="heading-area">
                                    <h4 class="title">{{ __('contact emails') }}</h4>
                                </div>

                                <div class="feature-tag-top-filds" id="feature-section3">
                                    @if(!empty($gs->contact_emails))
                                        @php
                                        $addresses1 =    explode(',', $gs->contact_emails);
                                     
                                        @endphp
                                        @foreach($addresses1 as $key => $data1)

                                            <div class="feature-area">
                                                <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="contact_emails[]" class="input-field" placeholder="{{ __('Enter Your contact_emails') }}" value="{{ $addresses1[$key] }}">
                                                    </div>

                                                   
                                                </div>
                                            </div>


                                        @endforeach
                                    @else

                                        <div class="feature-area">
                                            <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="text" name="contact_emails[]" class="input-field" placeholder="{{ __('Enter Your contact_emails') }}">
                                                </div>

                                             
                                            </div>
                                        </div>

                                    @endif
                                </div>

                                <a href="javascript:;" id="feature-btn3" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
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
                                    <h4 class="title">{{ __('support emails') }}</h4>
                                </div>

                                <div class="feature-tag-top-filds" id="feature-section4">
                                    @if(!empty($gs->support_emails))
                                        @php
                                        $addresses2 =    explode(',', $gs->support_emails);
                                     
                                        @endphp
                                        @foreach($addresses2 as $key => $data1)

                                            <div class="feature-area">
                                                <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="support_emails[]" class="input-field" placeholder="{{ __('Enter Your support_emails') }}" value="{{ $addresses2[$key] }}">
                                                    </div>

                                                   
                                                </div>
                                            </div>


                                        @endforeach
                                    @else

                                        <div class="feature-area">
                                            <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="text" name="support_emails[]" class="input-field" placeholder="{{ __('Enter Your support_emails') }}">
                                                </div>

                                             
                                            </div>
                                        </div>

                                    @endif
                                </div>

                                <a href="javascript:;" id="feature-btn4" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
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
                                    <h4 class="title">{{ __('product emails') }}</h4>
                                </div>

                                <div class="feature-tag-top-filds" id="feature-section5">
                                    @if(!empty($gs->product_emails))
                                        @php
                                        $addresses3 =    explode(',', $gs->product_emails);
                                     
                                        @endphp
                                        @foreach($addresses3 as $key => $data1)

                                            <div class="feature-area">
                                                <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <input type="text" name="product_emails[]" class="input-field" placeholder="{{ __('Enter Your product_emails') }}" value="{{ $addresses3[$key] }}">
                                                    </div>

                                                   
                                                </div>
                                            </div>


                                        @endforeach
                                    @else

                                        <div class="feature-area">
                                            <span class="remove feature-remove"><i class="fas fa-times"></i></span>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <input type="text" name="product_emails[]" class="input-field" placeholder="{{ __('Enter Your product_emails') }}">
                                                </div>

                                             
                                            </div>
                                        </div>

                                    @endif
                                </div>

                                <a href="javascript:;" id="feature-btn5" class="add-fild-btn"><i class="icofont-plus"></i> {{ __('Add More Field') }}</a>
                            </div>
                        </div>
                    </div>
                        <div class="row justify-content-center">
                          <div class="col-lg-3">
                            <div class="left-area">
                              
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <button class="addProductSubmit-btn" type="submit">{{ __('Submit') }}</button>
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

    <script src="{{asset('assets/admin/js/product.js')}}"></script>
 

@endsection