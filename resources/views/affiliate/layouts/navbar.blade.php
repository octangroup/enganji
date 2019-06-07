<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->

                <!-- Branding Image -->
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('affiliate')->check())
                        <li><a href="{{ URL::to('affiliate') }}">Login</a></li>
                        {{--<li><a href="{{ URL::to('admin/register') }}">Add admin</a></li>--}}
                    @else
                        {{--<li><a href="{{action('Admin\ProductsController@index')}}">Manage products</a></li>--}}
                        {{--<li><a href="{{action('Admin\AffiliatesController@index')}}">Affiliates</a></li>--}}
                        {{--<li><a href="{{action('Admin\BrandController@index')}}">Brand</a></li>--}}
                        {{--<li><a href="{{action('Admin\CurrencyController@index')}}">Currency</a></li>--}}
                        {{--<li><a href="{{action('Admin\ConditionsController@index')}}">Manage Conditions</a></li>--}}
                        {{--<li><a href="{{action('Admin\CategoriesController@index')}}">Manage Categories</a></li>--}}
                        {{--<li><a href="{{action('Admin\RolesController@index')}}">Roles</a></li>--}}
                        {{--<li><a href="{{action('Admin\AdsController@index')}}">Ads</a></li>--}}
                        {{--<li><a href="{{action('Admin\Auth\RegisterController@showRegistrationForm')}}">Add admin</a></li>--}}
                        {{--<li><a href="{{action('Admin\AdminsController@index')}}">Manage admins</a></li>--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('affiliate')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('affiliate.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('affiliate.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


</div>
