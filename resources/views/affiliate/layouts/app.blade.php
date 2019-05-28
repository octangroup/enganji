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
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/desktop.css')}}" rel="stylesheet">
    <link href="{{asset('css/mobile.css')}}" rel="stylesheet">
    <link href="{{asset('css/tablet.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/_flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/flaticonV2/flaticon.css')}}" rel="stylesheet">
</head>
<body>
    <div id="app" class="relative">


        <div class="mx-3 my-3 lg:hidden">

            <button data-toggle="#nav-affiliate" class=" hidden xs:block text-black  bg-transparent toggler border-0 ">
                <i class="fi flaticon-menu text-black text-2xl md:text-3xl"></i>

            </button>

        </div>
        <div class="bg-transparent  w-100  ">

            <form name="search_form" method="get"  class="flex my-4">
                <div class="w-50 md:w-80 xs:w-80 mx-auto  py-2 ">
                    <input name="keyword" type="text" placeholder="Search...."
                           class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">
                </div>




            </form>
        </div>
        <div class="flex ">

            <div class="w-15 xs:hidden">
                @if(Auth::guard('affiliate')->check())
                @include('affiliate.layouts.sidebar')
                    @endif
            </div>

            <div class="w-85 xs:w-90 xs:mx-auto xl:px-3">
                @yield('content')

            </div>

            </div>

        </div>



<script src="{{ asset('js/app.js') }}"></script>

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
