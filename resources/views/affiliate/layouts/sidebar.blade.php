<div class="w-100 h-px-800 bg-white-smoke rounded-r-xxl text-black">
    <h2 class="w-70 mx-auto  font-primary  py-4">Enganji</h2>
    <div class="mt-2">

        <div class="w-70 mx-auto my-0  flex text-base">
            <div class="w-25 ">
                <p class="w-25   font-primary my-3 text-xl"><i class="fi flaticon-home "></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="w-75   font-primary my-3" href="{{action('Affiliate\HomeController@index')}}">Dashboard</a>
            </div>
        </div>

        <div class="w-70 mx-auto  flex text-base">
            <div class="w-25 ">
                <p class="my-3  font-primary  text-xl"><i class="fi flaticon-file"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="nav-link" href="{{action('Affiliate\ProductsController@index')}}">Manage products</a>
            </div>

        </div>

        <div class="w-70 mx-auto flex text-base">
            <div class="w-25 ">
                <p class="font-primary my-3 text-2xl"><i class="fi flaticon-spotlight"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="nav-link" href="{{action('Affiliate\DealsController@index')}}">Deals</a>
            </div>

        </div>


        <div class="w-70 mx-auto  flex text-base">
            <div class="w-25 ">
                <p class="my-3 font-primary  text-xl"><i class="fi flaticon-settings-1"></i></p>
            </div>
            <div class="w-75 flex align-items-center">
                <a class="nav-link" href="{{action('Affiliate\ChatsController@index')}}">{{__('Chat')}}</a>
            </div>

        </div>


    </div>

</div>
