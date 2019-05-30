<nav id="sidebar" class=" md:w-45 w-65  h-screen hidden-temp rounded-b-xlg shadow mb-4  bg-white  z-9999 t-0  fixed xl:hidden lg:hidden  mt-0 overflow-hidden ">
    <div class="w-100 ">

        <div class="bg-primary flex  ">
            <div class="w-85 text-center text-white  ">
                <h4 class=" text-xl ">Menu</h4>

            </div>

            <div class=" w-15 py-4">
                <button  data-toggle="#sidebar"
                        class="border-0 text-xl bg-transparent  text-white toggler font-bold "><i
                            class="fi flaticon-error"></i></button>
            </div>


        </div>

        <ul class="list-type-0 px-4 mt-4 md:px-5 py-2 pb-3 my-0 text-base w-90 mx-auto text-black font-light ">

            <li class="flex my-4">
                <div class="w-20 text-center">
                    <i
                            class="fi flaticon-home w-20  text-lg float-left "></i>
                </div>
                <div class="w-80 mx-3">
                    <p class="my-0  font-normal cursor-pointer font-primary">Home</p>

                </div>
            </li>
            <div class="border-0 border-t-1  border-solid border-grey-lighter"></div>
            <li class="flex my-4">
                <div class="w-20 text-center">
                    <i
                            class="fi flaticon-list w-20  text-lg float-left "></i>
                </div>
                <div class="w-80 mx-3 font-primary">
                    <p class="my-0  font-normal cursor-pointer font-primary">Categories</p>

                </div>
            </li>
            <div class="border-0 border-t-1  border-solid border-grey-lighter"></div>
            <li class="flex my-4">
                <div class="w-20 text-center">
                    <i
                            class="fi flaticon-shopping-cart w-20  text-lg float-left "></i>
                </div>
                <div class="w-80 mx-3 font-primary">
                    <p class="my-0  font-normal cursor-pointer font-primary">Cart</p>

                </div>
            </li>
            <div class="border-0 border-t-1  border-solid border-grey-lighter"></div>
            <li class="flex my-4">
                <div class="w-20 text-center">
                    <i
                            class="fi flaticon-like-2 w-20 cursor-pointer text-lg float-left "></i>
                </div>
                <div class="w-80 mx-3 font-primary">
                        <p class="my-0 cursor-pointer font-normal font-primary">WishList</p>

                </div>
            </li>
            <div class="border-0 border-t-1  border-solid border-grey-lighter"></div>

        </ul>


        <ul class="list-type-0 px-4 md:px-5 py-2 pb-3 my-0 text-base w-90  text-black font-light ">
            <div class="flex">
                <li class=" w-60 flex  my-4">
                    <div class="w-20 text-center">
                        <i
                                class="fi flaticon-upload cursor-pointer  w-20  text-lg float-left "></i>
                    </div>
                    <div class="w-80 mx-2 font-primary">
                        <p class="my-0 text-lg cursor-pointer font-primary">signin</p>

                    </div>
                </li>
                <li class=" w-40 mx-2 flex my-4">
                    <div class="w-20 text-center">
                        <i
                                class="fi flaticon-login w-20  text-lg float-left "></i>
                    </div>
                    <div class="w-80 mx-2 font-primary">
                        <p class="my-0 text-lg  font-primary">login</p>

                    </div>
                </li>
            </div>


        </ul>

        {{--<ul class="list w-100 my-3  text-black-dark mx-5 my-4 text-sm">--}}
            {{--@foreach(\App\Category::get()->take(6) as $category)--}}
                {{--<li class=" mx-2"><a--}}
                            {{--href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"--}}
                            {{--class="inherit-color text-sm font-primary font-medium  no-underline  ">{{__($category->name)}}</a>--}}
                {{--</li>--}}
            {{--@endforeach--}}
            {{--<li class=" mx-2"><a--}}

                        {{--class=" text-sm font-primary font-medium text-accent no-underline">Deals </a></li>--}}

        {{--</ul>--}}
    </div>

</nav>