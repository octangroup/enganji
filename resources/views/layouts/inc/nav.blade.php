<nav class=" w-90 mx-auto rounded-b-xlg xl:-mt-3 xl:mb-4 xl:py-4  bg-white-smoke relative">


    <div class="w-90 mx-auto flex flex-wrap">
        <ul data-toggle="#sidebar"
            class="w-10 md:w-40 xs:w-25 xl:hidden lg:hidden mt-3 list my-0  toggler text-black-dark">
            <li class="pb-4 pt-1">
                <i class="fi flaticon-menu text-black text-2xl"></i>
            </li>
        </ul>

        <ul class="w-50 lg:w-30 lg:my-3 md:w-40 xs:w-60  list my-0 mt-2  text-black-dark">
            <li class="pb-4 pt-1">
                <a href="{{action('HomeController@index')}}"
                   class="font-primary font-medium text-3xl inherit-color no-underline">
                    <img src="{{asset('img/logo.png')}}" class="w-rem-32 mt-2 absolute t-0 pt-2">
                </a>
            </li>
        </ul>

        <div data-toggle="#search"
             class="w-15 toggler mt-3 text-center hidden xs:block md:block sm:block  py-3 flex align-items-center justify-content-center ">
            <p class="m-0 text-xl"><i class="fi flaticon-search"></i></p>
        </div>
        <div id="search" class="w-90 xl:hidden lg:hidden  text-center mx-auto py-3 hidden-temp " style="display: none;">
            <form name="search_form" method="get" action="{{action('ProductsController@search')}}">
                <div
                    class="bg-white rounded-full border-1 border-solid border-grey-light w-85 mx-auto overflow-x-hidden  flex">
                    <div class="w-80 md:w-90 sm:w-90">
                        <input name="keyword" type="text" placeholder="Search.." value="" required
                               class="bg-transparent appearance-none outline-none border-none w-100 pl-4 m-0 py-2 ">
                    </div>
                    <div class="w-20 md:w-10 sm:w-10  pr-2">
                        <button class="border-0 bg-transparent  text-black  text-center px-0 py-0 text-lg  h-100">
                            <i class="fi flaticon-search "></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <ul class="w-50 hidden xl:block lg:block lg:w-70 list my-0 text-right text-black-dark">
            <li class="text-xl mt-0 pt-0 w-60 mr-4 inline-block font-primary font-medium">
                <form name="search_form" method="get" action="{{action('ProductsController@search')}}"
                      class="flex my-0">
                    <div class="flex-90">
                        <input name="keyword" type="text" placeholder="Search" value="{{$keyword ?? null}}"
                               class="text-right text-black-dark bg-transparent m-0 focus:shadow-none font-medium form-input border-none border-none p-0 ">
                    </div>
                    <div class="flex-10 text-right p-0">
                        <button type="submit"
                                class="btn bg-transparent shadow-none py-0 m-0 appearance-none hover:text-accent transition-250ms focus:text-primary">
                            <i
                                class="fi flaticon-search  text-xl leading-0"></i></button>
                    </div>
                </form>
            </li>
            <li class="text-xl  mt-0 pt-2 mr-4 inline-block font-primary font-medium hover:text-accent transition-250ms">
                <a href="{{action('WishListController@index')}}" class="inherit-color no-underline">
                    <i class="fi flaticon-like-1"></i>
                </a>
            </li>
            <li class="text-xl  mt-0 pt-2 mr-4 inline-block font-primary font-medium hover:text-accent transition-250ms">
                <a href="{{action('CartController@index')}}" class="inherit-color no-underline">
                    <i class="fi flaticon-shopping-cart"></i>
                </a>

            </li>

            <li class="text-xl mt-0 pt-2 mr-4 inline-block font-primary font-medium hover:text-accent transition-250ms">
                <a href="{{action('ChatsController@index')}}" class="inherit-color no-underline">
                    <i class="fi flaticon-chat"></i>
                </a>
            </li>

            <li class="text-xl  mt-0 pt-2  inline-block font-primary font-medium hover:text-accent transition-250ms relative dropdown mx-0 z-999">
                <a class="inherit-color font-primary"><i class="fi flaticon-user"></i> <i
                        class="fas fa-chevron-down text-xs"></i></a>
                <div class="dropdown-content w-rem-74 mx-0 -ml-20 md:-ml-8 text-left font-roboto font-normal shadow mt-0
                               border-2 border-solid border-white cursor-pointer z-999 absolute">
                    <div class="w-100 absolute -t-2">
                        <div class="bg-white h-10 w-rem-10 shadow rotate-45deg mx-auto">

                        </div>
                    </div>
                    @auth()
                        <div class="relative bg-white">
                            <p class="text-center text-xs bg-grey-lighter py-2">My Account</p>
                            <p><a href="{{action('ProfileController@index')}}"
                                  class="hover:bg-grey-lightest px-4 text-sm"><i
                                        class="fi flaticon-user mr-2 text-base"></i> {{Auth::user()->name}}</a></p>
                            <p><a href="{{ route('logout') }}" dusk="logout-user"
                                  class="hover:bg-grey-lightest px-4 text-sm"
                                  onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                    <i class="fi flaticon-login mr-2 text-base"></i>
                                    Sign out
                                </a>
                            </p>
                            <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    @endauth
                    @guest()
                        <div class="relative bg-white">
                            <p class="text-center text-xs bg-grey-lighter py-2">My Account</p>
                            <p><a href="{{route('login')}}"
                                  class="hover:bg-grey-lightest px-4 text-sm"><i
                                        class="fi flaticon-login mr-2 text-base"></i> Sign in</a></p>
                            <p><a href="{{route('register')}}"
                                  class="hover:bg-grey-lightest px-4 text-sm"><i
                                        class="fi flaticon-user-7 mr-2 text-base"></i> Sign up</a></p>
                        </div>
                    @endguest
                </div>
            </li>
        </ul>
        <ul class="list w-100 hidden lg:my-3 xl:block lg:block text-center text-black-dark   text-sm">
            <li class="inline-block mx-3"><a
                    data-toggle="#all-categories-div"
                    class="text-sm font-primary font-medium text-accent no-underline cursor-pointer toggler"><i
                        class="fi flaticon-menu"></i> </a></li>

            @foreach(\App\Models\Category::get()->take(6) as $category)
                <li class="inline-block mx-3"><a
                        href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                        class="inherit-color text-sm font-primary font-medium  no-underline">{{__($category->name)}}</a>
                </li>
            @endforeach
            {{--            <li class="inline-block mx-3"><a--}}

            {{--                        class=" text-sm font-primary font-medium text-accent no-underline">Deals</a></li>--}}

        </ul>
    </div>

</nav>
<div id="all-categories-div" class="w-20 mx-auto fixed h-100 t-0 l-0 hidden-temp z-999">
    <div class="w-100 h-100 bg-white rounded-xlg border-1 border-grey-light border-solid relative">
        <div class="absolute r-0 mr-4 w-20 text-right z-99">
            <p data-toggle="#all-categories-div" class="text-xl cursor-pointer  mt-3 text-grey-darker mb-0 toggler"><i class="fi flaticon-close"></i></p>
        </div>
        <ul class="list w-100 h-100 overflow-scroll p-4 lg:my-3  text-left text-black-dark   text-sm relative">
            @foreach(\App\Models\Category::get() as $category)
                <li class="mx-3 w-100 my-3" ><a
                        href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                        class="inherit-color text-sm font-primary font-medium  no-underline font-bold">{{__($category->name)}}</a>
                    <ul>
                        @foreach($category->subcategories as $subcategory)
                            <li class="mx-3"><a
                                    href="{{action('ProductsController@index',[$category->stripped_name,$subcategory->id])}}"
                                    class="inherit-color text-sm font-primary font-medium  no-underline">{{__($subcategory->name)}}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</div>
