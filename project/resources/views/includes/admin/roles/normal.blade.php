@if(Auth::guard('admin')->user()->role_id != 0)



@if(Auth::guard('admin')->user()->sectionCheck('home_page_settings'))


<li>
    <a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-edit"></i>{{ __('Home Page Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">
        <li>
            <a href="{{ route('admin-sl-index') }}"><span>{{ __('Sliders') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-partner-index') }}"><span>{{ __('home Partners images') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-package-index') }}"><span>{{ __('Home counter') }}</span></a>
        </li>
    </ul>
</li>

@endif

@if(Auth::guard('admin')->user()->sectionCheck('services'))

<li>
    <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-cart"></i>{{ __('Services') }}<span class="badge badge-danger">New</span>
    </a>
    <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
        <li>
            <a href="{{ route('admin-prod-physical-create') }}"><span>{{ __('Add New Service') }}</span><span class="badge badge-danger">New</span></a>
        </li>
        <li>
            <a href="{{ route('admin-prod-index') }}"><span>{{ __('All Services') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-shipment-index') }}"><span>{{ __('speakers') }}</span></a>
        </li>




        <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category') active @endif">
            <a href="{{ route('admin-cat-index') }}"><span>{{ __('Main Category') }}</span></a>
        </li>
        <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory') active @endif">
            <a href="{{ route('admin-subcat-index') }}"><span>{{ __('Sub Category') }}</span></a>
        </li>
        {{--  <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory') active @endif">
              <a href="{{ route('admin-childcat-index') }}"><span>{{ __('Child Category') }}</span></a>
          </li>--}}



    </ul>
</li>

@endif

@if(Auth::guard('admin')->user()->sectionCheck('about_us'))
<li>
    <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('about us') }}
    </a>
    <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">

        <li>
            <a href="{{ route('admin-brand-index') }}" class=" wave-effect"><span>{{ __('about sections') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-service-index') }}"><span>{{ __('Our Team') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-ads-index') }}"><span>{{ __('Sponsors') }}</span></a>
        </li>


        <li><a href="{{route('admin-country-index')}}"><span>{{ __('History') }}</span></a></li>


    </ul>
</li>
@endif


@if(Auth::guard('admin')->user()->sectionCheck('gallery'))
<li>
    <a href="#menu8" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Gallery') }}
    </a>
    <ul class="collapse list-unstyled" id="menu8" data-parent="#accordion">



        <li><a href="{{route('admin-country-index2')}}"><span>{{ __('Gallery Category') }}</span></a></li>
        <li><a href="{{route('admin-city-index')}}"><span>{{ __('Gallery subCategory') }}</span></a></li>
        <li><a href="{{route('admin-state-index')}}"><span>{{ __('Gallery') }}</span></a></li>

    </ul>
</li>
@endif

@if(Auth::guard('admin')->user()->sectionCheck('blog'))
<li>
    <a href="#blog" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-fw fa-newspaper"></i>{{ __('Blog') }}
    </a>
    <ul class="collapse list-unstyled" id="blog" data-parent="#accordion">
        <li>
            <a href="{{ route('admin-cblog-index') }}"><span>{{ __('Categories') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-blog-index') }}"><span>{{ __('Posts') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-comment-index') }}"><span>{{ __('Comments') }}</span></a>
        </li>
    </ul>
</li>
@endif
@if(Auth::guard('admin')->user()->sectionCheck('reviews'))
<li>
    <a href="{{ route('admin-review-index') }}"> <i class="fas fa-edit"></i><span>{{ __('Reviews') }}</span></a>
</li>
@endif
@if(Auth::guard('admin')->user()->sectionCheck('contact_us'))
<li>
    <a href="{{ route('admin-ps-contact') }}"><i class="fas fa-edit"></i><span>{{ __('Contact Us Page') }}</span></a>
</li>
@endif

@if(Auth::guard('admin')->user()->sectionCheck('general_settings'))
<li>
    <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-cogs"></i>{{ __('General Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="general" data-parent="#accordion">


        <li>
            <a href="{{ route('admin-gs-logo') }}"><span>{{ __('Logo') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-gs-block') }}"><span>{{ __('Block Images') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-gs-fav') }}"><span>{{ __('Favicon') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-gs-load2') }}"><span>{{ __('Admin Loader') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-contents') }}"><span>{{ __('Website Contents') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-footer') }}"><span>{{ __('Footer') }}</span></a>
        </li>
        <li><a href="{{route('admin-social-index')}}"><span>{{ __('Social Links') }}</span></a></li>

        <li>
            <a href="{{ route('admin-gs-popup') }}"><span>{{ __('Popup Banner') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-maintenance') }}"><span>{{ __('Website Maintenance') }}</span></a>
        </li>

        @if(Auth::guard('admin')->user()->sectionCheck('super'))
        <li>
            <a href="{{ route('admin-role-index') }}" class=" wave-effect"><span>{{ __('Manage Roles') }}</span></a>
        </li>
        @endif
        @if(Auth::guard('admin')->user()->sectionCheck('manage_staffs'))
        <li>
            <a href="{{ route('admin-staff-index') }}" class=" wave-effect"><span>{{ __('Manage Staffs') }}</span></a>
        </li>
        @endif

    </ul>
</li>
@endif
@if(Auth::guard('admin')->user()->sectionCheck('emails_settings'))
<li>
    <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-at"></i>{{ __('Email Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
        {{--<li><a href="{{route('admin-mail-index')}}"><span>{{ __('Email Template') }}</span></a></li>--}}
        <li><a href="{{route('admin-mail-config')}}"><span>{{ __('Email Configurations') }}</span></a></li>
        <li><a href="{{route('admin-group-show')}}"><span>{{ __('Group Email') }}</span></a></li>
    </ul>
</li>
@endif

@if(Auth::guard('admin')->user()->sectionCheck('subscribers'))
<li>
    <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>{{ __('Subscribers') }}</a>
</li>
@endif

@if(Auth::guard('admin')->user()->sectionCheck('language_settings'))
<li>
    <a href="#langs" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-language"></i>{{ __('Language Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="langs" data-parent="#accordion">
        <li><a href="{{route('admin-lang-index')}}"><span>{{ __('Website Language') }}</span></a></li>
        <li><a href="{{route('admin-tlang-index')}}"><span>{{ __('Admin Panel Language') }}</span></a></li>

    </ul>
</li>
@endif
@if(Auth::guard('admin')->user()->sectionCheck('seo_tools'))
<li>
    <a href="#seoTools" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-wrench"></i>{{ __('SEO Tools') }}
        <span class="badge badge-danger">New</span></a>
    <ul class="collapse list-unstyled" id="seoTools" data-parent="#accordion">
        <li>
            <a href="{{ route('admin-prod-popular',30) }}"><span>{{ __('Popular service') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-seotool-keywords') }}"><span>{{ __('ِِAll Website Meta') }}</span></a>
        </li>

        <li>
            <a href="{{ route('admin-product-header') }}"><span>{{ __('Service Page Header') }}</span></a>
        </li>



        <li>
            <a href="{{ route('admin-category-header') }}"><span>{{ __('Category Page Header') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-subcategory-header') }}"><span>{{ __('SubCategory Page Header') }}</span></a>
        </li>




    </ul>
</li>
@endif

@if(Auth::guard('admin')->user()->sectionCheck('super'))
<li>
    <a href="{{ route('admin-cache-clear') }}" class=" wave-effect"><i class="fas fa-sync"></i>{{ __('Clear Cache') }}</a>
</li>
@endif


@endif
