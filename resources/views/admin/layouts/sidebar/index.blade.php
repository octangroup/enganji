<div class="w-15 h-100 fixed t-0 bg-white-smoke rounded-r-xxl text-black ">
    <h2 class="w-70 mx-auto  font-primary  py-4">Enganji</h2>
    <div class="mt-2">
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\HomeController@index')])
            @slot('icon')
                <i class="fi flaticon-home "></i>
            @endslot
            Dashboard
        @endcomponent
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\ProductsController@index')])
            @slot('icon')
                <i class="fi flaticon-file"></i>
            @endslot
            Manage products
        @endcomponent
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\AffiliatesController@index')])
            @slot('icon')
                <i class="fi flaticon-users-1"></i>
            @endslot
            Affiliates
        @endcomponent
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\RolesController@index')])
            @slot('icon')
                <i class="fi flaticon-settings-1"></i>
            @endslot
            Roles
        @endcomponent
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\AdsController@index')])
            @slot('icon')
                <i class="fi flaticon-paper-plane"></i>
            @endslot
            Ads
        @endcomponent
        @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\BrandController@index')])
            @slot('icon')
                <i class="fi flaticon-like"></i>
            @endslot
            Brands
        @endcomponent

    </div>

</div>
