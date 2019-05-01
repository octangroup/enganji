<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/helpers.css')}}" rel="stylesheet">
    <link href="{{asset('css/desktop.css')}}" rel="stylesheet">
    <link href="{{asset('css/mobile.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/tablet.css')}}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('affiliate')->check())
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('affiliate') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ URL::to('affiliate/register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{action('Affiliate\ProductsController@index')}}">Manage products</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{action('Affiliate\DealsController@index')}}">Deals</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{action('Affiliate\ChatsController@index')}}">{{__('Chat')}}</a> </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::guard('affiliate')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('affiliate.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('affiliate.logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
        </div>
</nav>

@yield('content')
</div>



<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js" charset="utf-8"></script>
<script defer>
    $('.toggler').click(function () {
        let toggle = $(this).data('toggle');
        $(toggle).toggle(150);
        //   alert('hello');
    });
    // $(document).ready(function (){
    //     alert('hello');
    // })
</script>
@yield('script')

</body>
</html>
