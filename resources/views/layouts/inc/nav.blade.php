{{--<div class="w-100 bg-white py-4">--}}
{{--<div class="flex w-90 mx-auto">--}}
{{--<div class="w-30">--}}
{{--<h1 class="text-4xl text-grey-darker">ENGANJI</h1>--}}
{{--</div>--}}
{{--<div class="w-50">--}}
{{--<div class="w-100 flex pt-4">--}}
{{--<div class="w-80">--}}
{{--<input class="form-input border-red " type="text" placeholder="search">--}}
{{--</div>--}}
{{--<div class="w-20 mx-1">--}}
{{--<button class="btn bg-red"><i class="fi flaticon-search-1"></i></button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="w-50 text-center mx-auto py-4 lg:mx-2">--}}

{{--<div class="bg-white rounded-full border-1 border-solid border-grey-light">--}}
{{--<form name="search_form" method="get" action="{{action('ProductsController@search')}}">--}}
{{--<input name="keyword" type="text" placeholder="Search.." value="{{$keyword ?? null}}"--}}
{{--class="bg-transparent appearance-none outline-none border-none p-3 m-0 w-80" required>--}}
{{--<button class="rounded-full btn bg-primary text-white ">Search</button>--}}
{{--</form>--}}
{{--</div>--}}
{{--</div>--}}

{{--@guest--}}
{{--<div class="w-30 pt-4 text-center">--}}
{{--<ul class="list inline-block ">--}}
{{--<li class="mx-2"><i class="fi flaticon-exclamation-sign-in-a-circle"></i><a--}}
{{--class="inherit-color hover:bg-grey-lighter"--}}
{{--href="{{ route('login') }}">{{ __('Login') }}</a><i class="fas fa-user-plus mx-1"></i></li>--}}
{{--@if (Route::has('register'))--}}
{{--<li class="mx-2"><i class="fas fa-sign-in-alt mx-1"></i><a class="inherit-color hover:bg-grey-lighter"--}}
{{--href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--</ul>--}}
{{--</div>--}}
{{--@else--}}
{{--<li class="mx-3 inline-block text-white">--}}
{{--<a href="{{action('ProductsController@viewWishList')}}" class="cursor-pointer inherit-color">--}}
{{--<i class="fi flaticon-like-2 text-2xl"></i>--}}
{{--</a>--}}
{{--</li>--}}

{{--<li class="mx-3 inline-block text-white">--}}
{{--<a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">--}}
{{--<i class="fi flaticon-shopping-cart text-2xl"></i>--}}
{{--</a>--}}

{{--</li>--}}
{{--<li class="dropdown ml-2 inline-block text-black">--}}
{{--<a class="inherit-color font-primary">--}}
{{--{{ title_case(Auth::user()->name) }} <i class="fas fa-chevron-circle-down"></i>--}}
{{--</a>--}}
{{--<div class="dropdown-content w-rem-74 mx-0 -ml-16 text-left rounded-lg font-roboto font-normal shadow mt-0--}}
{{--border-2 border-solid border-white cursor-pointer overflow-hidden">--}}
{{--<a class="dropdown-item hover:bg-grey-lighter" href="{{action('ProfileController@index')}}">--}}

{{--{{ __('Profile') }}--}}
{{--</a>--}}

{{--<a class="dropdown-item hover:bg-grey-lighter" href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}--}}
{{--</a>--}}
{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</div>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="bg-primary">--}}
{{--<div class="flex w-90 mx-auto py-4 ">--}}
{{--<div class="w-25 text-white  flex">--}}
{{--<div class="w-10">--}}
{{--<i class="fas fa-bars text-xl"></i>--}}
{{--</div>--}}

{{--<div class="w-90 mx-1">--}}
{{--<h5 class="my-0 py-0">Category</h5>--}}

{{--</div>--}}
{{--</div>--}}

{{--<div class="w-50">--}}
{{--<div>--}}
{{--<ul class="list inline-block text-white text-sm">--}}
{{--@foreach(\App\Category::get()->take(8) as $category)--}}
{{--<li class=" inline-block"><a--}}
{{--href="{{action('ProductsController@index',[$category->name,$category->id])}}"--}}
{{--class="inherit-color">{{__($category->name)}}</a></li>--}}
{{--@endforeach--}}
{{--&nbsp;--}}

{{--</ul>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="w-25 text-center text-white">--}}
{{--<ul class="list inline-block  text-sm text-center">--}}
{{--<li class="mx-3"><a href="{{action('ProductsController@viewWishList')}}" class="cursor-pointer inherit-color">--}}
{{--Favorites  <i class="fi flaticon-like-2 text-2xl"></i>--}}
{{--</a></li>--}}
{{--<li class="mx-1"><a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">--}}
{{--Cart <i class="fi flaticon-shopping-cart text-2xl"></i>--}}
{{--</a><i class="fas fa-shopping-cart text-red mx-2"></i></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}


{{--</div>--}}
<div class="w-100 bg-white py-4">
    <div class="flex w-90 mx-auto">
        <div class="w-30 pt-1">
            <h1 class="text-4xl text-grey-darker">ENGANJI</h1>
        </div>
        <div class="w-50">         <form name="search_form" method="get" action="{{action('ProductsController@search')}}">
            <div class="w-100 flex pt-2">

                <div class="w-80 ">
                    <input class="form-input border-red py-1" name="keyword" type="text" placeholder="search">

                </div>
                <div class="w-15 mx-1 py-0">
                    <button class="btn bg-red py-1"><i class="fas fa-search text-white text-xs"></i></button>
                </div>

            </div></form>
        </div>

        @guest
            <div class="w-30 pt-1 text-center">
                <ul class="list inline-block ">
                    @if (Route::has('register'))
                        <li class="mx-2"><i class="fas fa-sign-in-alt mx-1"></i><a
                                    class="inherit-color hover:bg-grey-lighter"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                    <li class="mx-2"><i class="fi flaticon-exclamation-sign-in-a-circle"></i><a
                                class="inherit-color hover:bg-grey-lighter"
                                href="{{ route('login') }}">{{ __('Login') }}</a><i
                                class="fas fa-user-plus mx-1"></i></li>

                </ul>
            </div>

@else



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

                <ul class="list inline-block ml-7  -mt-2 text-white text-sm">
                    @foreach(\App\Category::get()->take(8) as $category)
                        <li class=" inline-block mx-3"><a
                                    href="{{action('ProductsController@index',[$category->name,$category->id])}}"
                                    class="inherit-color">{{__($category->name)}}</a></li>
                    @endforeach
                    &nbsp;

                </ul>

            </nav>
        </div>



        <div class="w-25 text-center text-white">
            <ul class="list inline-block -mt-2 text-sm text-center">

                <li class="mx-3"><a href="{{action('WishListController@index')}}"
                                    class="cursor-pointer inherit-color">
                        Favorites<i class="fi flaticon-like-1 mx-1 text-red"></i>
                    </a></li>

                <li class="mx-3 inline-block text-white">
                    <a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">
                        Cart <i class="fas fa-shopping-cart text-red mx-1">
                        </i>
                    </a>
                </li>
            </ul>

        </div>



    </div>

</div>

{{--<div class="w-100 bg-primary">--}}
    {{--<div class="flex w-90 mx-auto p-3">--}}
        {{--<div class="w-25 flex text-white text-sm">--}}
            {{--<div class="w-20">--}}
                {{--<i class="fas fa-bars text-xl"></i>--}}
            {{--</div>--}}
            {{--<div class="w-70">--}}
                {{--Catetgories--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="w-50">--}}
            {{--<nav>--}}

                {{--<ul class="list inline-block ml-7 -mt-2 text-white text-sm">--}}
                    {{--@foreach(\App\Category::get()->take(8) as $category)--}}
                        {{--<li class=" inline-block"><a--}}
                                    {{--href="{{action('ProductsController@index',[$category->name,$category->id])}}"--}}
                                    {{--class="inherit-color">{{__($category->name)}}</a></li>--}}
                    {{--@endforeach--}}
                    {{--&nbsp;--}}

                {{--</ul>--}}

            {{--</nav>--}}
        {{--</div>--}}
        {{--<div class="w-25 text-center text-white">--}}
            {{--<ul class="list inline-block -mt-2 text-sm text-center">--}}

                {{--<li class="mx-3"><a href="{{action('ProductsController@viewWishList')}}"--}}
                                    {{--class="cursor-pointer inherit-color">--}}
                        {{--Favorites<i class="fi flaticon-like-1 mx-1 text-red"></i>--}}
                    {{--</a></li>--}}

                {{--<li class="mx-3 inline-block text-white">--}}
                    {{--<a href="{{action('CartController@index')}}" class="cursor-pointer inherit-color">--}}
                        {{--Cart <i class="fas fa-shopping-cart text-red mx-1">--}}
                        {{--</i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="w-100 bg-primary">--}}
{{--<div class="flex w-90 mx-auto p-3">--}}
{{--<div class="w-25 flex text-white text-sm">--}}
{{--<div class="w-30">--}}
{{--<i class="fas fa-bars text-xl"></i>--}}
{{--</div>--}}
{{--<div class="w-70">--}}
{{--Categories--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="w-50">--}}
{{----}}


{{--</div>--}}


{{--</div>--}}
{{--</div>--}}
