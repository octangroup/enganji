<div id="nav-affiliate " class="w-15 xs:w-60 lg:w-20 md:w-25 z-9999 h-100 fixed md:hidden-temp xs:hidden-temp  t-0 bg-white-smoke  rounded-r-xxl text-black">
    <div class="">
        <h2 class="w-70 mx-auto  font-primary  py-4">Enganji</h2>
        <button data-toggle="#nav-mobile-admin"
                class=" text-black xl:hidden lg:hidden  bg-transparent inline-block toggler border-0 ">
            <i class="fi flaticon-close text-red font-bold md:text-2xl text-lg"></i>

        </button>
    </div>
    <div class="mt-2">

        <div class="w-70 mx-auto my-0  flex text-base">
            <div class="w-25 ">
                <p class="w-25   font-primary my-3 text-xl"><i class="fi flaticon-home "></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="w-75   font-primary my-3 no-underline" href="{{action('Affiliate\HomeController@index')}}">Dashboard</a>
            </div>
        </div>

        <div class="w-70 mx-auto  flex text-base">
            <div class="w-25 ">
                <p class="my-3  font-primary  text-xl"><i class="fi flaticon-file"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="w-75   font-primary my-3 no-underline" href="{{action('Affiliate\ProductsController@index')}}">Manage products</a>
            </div>

        </div>

        <div class="w-70 mx-auto flex text-base">
            <div class="w-25 ">
                <p class="font-primary my-3 text-2xl"><i class="fi flaticon-spotlight"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="w-75   font-primary my-3 no-underline" href="{{action('Affiliate\DealsController@index')}}">Deals</a>
            </div>

        </div>


        <div class="w-70 mx-auto  flex text-base">
            <div class="w-25 ">
                <p class="my-3 font-primary  text-xl"><i class="fi flaticon-settings-1"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="w-75   font-primary my-3 no-underline" href="{{action('Affiliate\ChatsController@index')}}">{{__('Chat')}}</a>
            </div>

        </div>


    </div>

</div>
