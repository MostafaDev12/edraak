







<li>
    <a href="#Career" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Careers') }}
    </a>
    <ul class="collapse list-unstyled" id="Career" data-parent="#accordion">


        <li>
            <a href="{{ route('admin-prod-index') }}"></i><span>{{ __('Careers') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-prod-physical-create') }}"></i><span>{{ __('Add Career') }}</span></a>
        </li>
        <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category') active @endif">
            <a href="{{ route('admin-cat-index') }}"><span>{{ __('Category For Career filter') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-applied-index') }}"></i><span>{{ __('Applied jobs') }}</span></a>
        </li>
    </ul>
</li>


<li>
    <a href="#product" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Products') }}
    </a>
    <ul class="collapse list-unstyled" id="product" data-parent="#accordion">


        <li>
            <a href="{{ route('admin-product-index') }}"></i><span>{{ __('Products') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-product-physical-create') }}"></i><span>{{ __('Add Product') }}</span></a>
        </li>
        <li >
            <a href="{{ route('admin-product-cat-index') }}"><span>{{ __('Product Category') }}</span></a>
        </li>

            <li >
            <a href="{{ route('admin-subscription-index') }}"><span>{{ __('Subscription plans') }}</span></a>
        </li>

          <li >
            <a href="{{ route('admin-Content-index') }}"><span>{{ __('Product Content') }}</span></a>
        </li>


       
    </ul>
</li>





{{--<li>
    <a href="{{ route('admin-ps-contact') }}"><i class="fas fa-edit"></i><span>{{ __('Contact Us Page') }}</span></a>
</li>--}}

<li>
    <a href="{{ route('admin-Contact-index') }}"><i class="fas fa-edit"></i><span>{{ __('Contacts') }}</span></a>
</li>
<li>
    <a href="{{ route('admin-Support-index') }}"><i class="fas fa-edit"></i><span>{{ __('Technical Support') }}</span></a>
</li>
<li>
    <a href="#menu8" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Country') }}
    </a>
    <ul class="collapse list-unstyled" id="menu8" data-parent="#accordion">



        <li><a href="{{route('admin-country-index2')}}"><span>{{ __('Country') }}</span></a></li>
        <li><a href="{{route('admin-city-index')}}"><span>{{ __('City') }}</span></a></li>


    </ul>
</li>
<li>
    <a href="#Programs" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="icofont-user"></i>{{ __('Programs') }}
    </a>
    <ul class="collapse list-unstyled" id="Programs" data-parent="#accordion">



        <li><a href="{{route('admin-program-index2')}}"><span>{{ __('Programs') }}</span></a></li>
        <li><a href="{{route('admin-page-index')}}"><span>{{ __('Pages') }}</span></a></li>


    </ul>
</li>
<li>
    <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-cogs"></i>{{ __('General Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="general" data-parent="#accordion">


     {{--   <li>
            <a href="{{ route('admin-gs-logo') }}"><span>{{ __('Logo') }}</span></a>
        </li>



        <li>
            <a href="{{ route('admin-gs-fav') }}"><span>{{ __('Favicon') }}</span></a>
        </li>--}}

        <li>
            <a href="{{ route('admin-gs-load2') }}"><span>{{ __('Admin Loader') }}</span></a>
        </li>


      {{--  <li>
            <a href="{{ route('admin-gs-contents') }}"><span>{{ __('Website Contents') }}</span></a>
        </li>


        <li>
            <a href="{{ route('admin-gs-footer') }}"><span>{{ __('Footer') }}</span></a>
        </li>
         <li><a href="{{route('admin-social-index')}}"><span>{{ __('Social Links') }}</span></a></li>

            <li>
                <a href="{{ route('admin-gs-popup') }}"><span>{{ __('Popup Banner') }}</span></a>
            </li>

--}}
        <li>
            <a href="{{ route('admin-gs-maintenance') }}"><span>{{ __('Website Maintenance') }}</span></a>
        </li>

      {{--  <li>
            <a href="{{ route('admin-role-index') }}" class=" wave-effect"><span>{{ __('Manage Roles') }}</span></a>
        </li>
        <li>
            <a href="{{ route('admin-staff-index') }}" class=" wave-effect"><span>{{ __('Manage Staffs') }}</span></a>
        </li>--}}

    </ul>
</li>


<li>
    <a href="#emails" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-at"></i>{{ __('Email Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="emails" data-parent="#accordion">
        {{----}}<li><a href="{{route('admin-mail-index')}}"><span>{{ __('Email Template') }}</span></a></li>
        <li><a href="{{route('admin-mail-config')}}"><span>{{ __('Email Configurations') }}</span></a></li>
        <li><a href="{{route('admin-group-show')}}"><span>{{ __('Group Email') }}</span></a></li>
    </ul>
</li>



<li>
        <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>{{ __('Subscribers') }}</a>
    </li> 



<li>
    <a href="#langs" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
        <i class="fas fa-language"></i>{{ __('Language Settings') }}
    </a>
    <ul class="collapse list-unstyled" id="langs" data-parent="#accordion">
        {{--<li><a href="{{route('admin-lang-index')}}"><span>{{ __('Website Language') }}</span></a></li>--}}
        <li><a href="{{route('admin-tlang-index')}}"><span>{{ __('Admin Panel Language') }}</span></a></li>

    </ul>
</li>
{{--<li>
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







    </ul>
</li>--}}


   <li>
            <a href="{{ route('admin-cache-clear') }}" class=" wave-effect"><i class="fas fa-sync"></i>{{ __('Clear Cache') }}</a>
        </li>


