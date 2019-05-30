<nav class=" w-65  rounded-b-xlg  mb-4  bg-white-smoke  z-9999 t-0  fixed xl:hidden lg:hidden  mt-0 overflow-hidden ">
    <div class="w-100 ">

        <div class="bg-primary flex  ">
            <div class="w-85 text-center text-white  ">
                <h4 class=" text-xl ">Menu</h4>

            </div>

            <div class=" w-15 py-4">
                <button data-toggle="#nav-mobile"
                        class="border-0 text-xl bg-transparent  text-white toggler font-bold "><i
                            class="fi flaticon-error"></i></button>
            </div>


        </div>
        <ul class="list w-100 my-3 text-center text-black-dark   text-sm">
            @foreach(\App\Category::get()->take(6) as $category)
                <li class=" mx-3"><a
                            href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                            class="inherit-color text-sm font-primary font-medium  no-underline">{{__($category->name)}}</a>
                </li>
            @endforeach
            <li class=" mx-3"><a

                        class=" text-sm font-primary font-medium text-accent no-underline">Deals</a></li>

        </ul>
    </div>

</nav>