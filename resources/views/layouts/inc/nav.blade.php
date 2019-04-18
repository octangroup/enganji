<div class="w-100 bg-white">
    <div class="flex w-90 mx-auto">
        <div class="w-30">
            <h1 class="text-4xl text-grey-darker">ENGANJI</h1>
        </div>

        <div class="w-50 text-center mx-auto py-4 lg:mx-2">

            <div class="bg-white rounded-full border-1 border-solid border-grey-light">
                <form name="search_form" method="get" action="{{action('ProductsController@search')}}">
                    <input name="keyword" type="text" placeholder="Search.." value="{{$keyword ?? null}}"
                           class="bg-transparent appearance-none outline-none border-none p-3 m-0 w-80" required>
                    <button class="rounded-full btn bg-primary text-white ">Search</button>
                </form>
            </div>
        </div>

        @guest
            <div class="w-30 pt-4 text-center">
                <ul class="list inline-block ">
                    <li class="mx-2"><i class="fi flaticon-exclamation-sign-in-a-circle"></i><a class="inherit-color hover:bg-grey-lighter"
                    href="{{ route('login') }}">{{ __('Login') }}</a><i class="fas fa-user-plus mx-1"></i></li>
                    @if (Route::has('register'))
                 <li class="mx-2"><i class="fas fa-sign-in-alt mx-1"></i><a class="inherit-color hover:bg-grey-lighter"
                        href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                </ul>
      </div>
            @else
                <li class="mx-3 inline-block text-white">
                    <a href="{{action('ProductsController@viewWishList')}}" class="cursor-pointer inherit-color">
                        <i class="fi flaticon-like-2 text-2xl"></i>
                    </a>
                </li>

            <li class="mx-3 inline-block text-white">
                <a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">
                    <i class="fi flaticon-shopping-cart text-2xl"></i>
                </a>

            </li>
                <li class="dropdown ml-2 inline-block text-black">
                    <a class="inherit-color font-primary">
                        {{ title_case(Auth::user()->name) }} <i class="fas fa-chevron-circle-down"></i>
                    </a>
                    <div class="dropdown-content w-rem-74 mx-0 -ml-16 text-left rounded-lg font-roboto font-normal shadow mt-0
                               border-2 border-solid border-white cursor-pointer overflow-hidden">
                        <a class="dropdown-item hover:bg-grey-lighter" href="{{action('ProfileController@index')}}">

                            {{ __('Profile') }}
                        </a>

                        <a class="dropdown-item hover:bg-grey-lighter" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

    </div>
</div>
<div class="w-100 bg-primary">
    <div class="flex w-90 mx-auto p-3">
        <div class="w-25 flex text-white text-sm">
            <div class="w-20">
                <i class="fas fa-bars text-xl"></i>
            </div>
            <div class="w-70">
                Categories
            </div>
        </div>
        <div class="w-50">
            <nav>
                <ul class="list inline-block ml-7 -mt-2 text-white text-sm">
                    @foreach(\App\Category::get()->take(8) as $category)
                    <li class="mx-4 inline-block"><a
                    href="{{action('ProductsController@index',[$category->name,$category->id])}}"
                    class="inherit-color">{{__($category->name)}}</a></li>
                    @endforeach
                    &nbsp;

                </ul>
            </nav>
        </div>
        @auth
        <div class="w-25 text-center text-white">
            <ul class="list inline-block -mt-2 text-sm text-center">
                <li class="mx-3"><a href="{{action('ProductsController@viewWishList')}}" class="cursor-pointer inherit-color">
                        Favorites  <i class="fi flaticon-like-2 text-2xl"></i>
                    </a>
                <li class="mx-1"><a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">
                        Cart <i class="fi flaticon-shopping-cart text-2xl"></i>
                    </a><i class="fas fa-shopping-cart text-red mx-1"></i></li>
            </ul>
        </div>
            @endauth
    </div>
</div>