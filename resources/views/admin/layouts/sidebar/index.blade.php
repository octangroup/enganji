<div id="nav-mobile" class="w-15 xs:w-60 md:w-30 h-100 z-9999 fixed t-0 bg-white-smoke rounded-r-xlg xs:hidden-temp text-black ">
    <div class=" flex  ">
        <div class="w-85 text-center text-black  ">
            <h2 class="w-70 mx-auto  font-primary  ">Enganji</h2>

        </div>

        <div class=" w-15 py-4 xl:hidden lg:hidden text-right r-0">
            <button data-toggle="#nav-mobile"
                    class="border-0 text-xl bg-transparent  text-white toggler font-bold "><i
                    class="fi flaticon-error text-black"></i></button>
        </div>


    </div>

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
            @component('admin.layouts.sidebar.sidebar-item',['url'=>action('Admin\CategoriesController@index')])
                @slot('icon')
                    <i class="fi flaticon-menu-4"></i>
                @endslot
                Categories
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
