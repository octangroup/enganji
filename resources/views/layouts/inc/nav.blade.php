<nav class="w-90 mx-auto rounded-b-xlg -mt-3  mb-4 py-4 bg-white-smoke ">
    <div class="w-90 mx-auto flex flex-wrap">
        <ul class="w-50 list my-0   text-black-dark">
            <li class="pb-4 pt-1">
                <a href="{{action('HomeController@index')}}"
                   class="font-primary font-medium text-3xl inherit-color no-underline">
                    <img src="{{asset('img/logo.png')}}" class="w-rem-32 absolute t-0 pt-2">
                </a>
            </li>
        </ul>
        <ul class="w-50 list my-0 text-right text-black-dark">
            <li class="text-xl mt-0 pt-0 w-60 mr-4 inline-block font-primary font-medium">
                <form name="search_form" method="get" action="{{action('ProductsController@search')}}"
                      class="flex my-0">
                    <div class="flex-90">
                        <input name="keyword" type="text" placeholder="Search" value="{{$keyword ?? null}}"
                               class="text-right text-black-dark bg-transparent m-0 focus:shadow-none font-medium form-input border-none border-none p-0 ">
                    </div>
                    <div class="flex-10 text-right p-0">
                        <button type="submit"
                                class="btn bg-transparent shadow-none py-0 m-0 appearance-none -mt-2 hover:text-accent transition-250ms focus:text-primary">
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
        <ul class="list w-100 text-center text-black-dark   text-sm">
            @foreach(\App\Category::get()->take(6) as $category)
                <li class="inline-block mx-3"><a
                        href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                        class="inherit-color text-sm font-primary font-medium  no-underline">{{__($category->name)}}</a>
                </li>
            @endforeach
            <li class="inline-block mx-3"><a

                    class=" text-sm font-primary font-medium text-accent no-underline">Deals</a></li>

        </ul>
    </div>

</nav>
