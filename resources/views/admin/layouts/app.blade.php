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
<div class="mx-5 my-3 lg:hidden">

            <button data-toggle="#nav-mobile"
                    class=" text-black xl:hidden bg-transparent toggler border-0 ">
                <i class="fi flaticon-menu text-black text-2xl md:text-3xl"></i>

            </button>

</div>

    <div class="bg-transparent  mt-2 my-4">

        <form name="search_form" method="get"  class="mx-5  w-40 mx-auto text-right text-center ">
            <div class=" w-90 md:w-80 xs:w-80 mx-auto text-center border-1 border-solid border-grey-light rounded-full  py-2 ">
                <input name="keyword" type="text" placeholder="Search...."
                       class="bg-white appearance-none  rounded-full px-3 outline-none border-none  m-0 w-100">
            </div>




        </form>
    </div>

            {{--<form name="search_form" method="get" action="{{action('Admin\AdsController@search')}}">--}}
                {{--<input name="keyword" type="text" placeholder="Search.." value="{{$keyword ?? null}}"--}}
                       {{--class="bg-transparent appearance-none outline-none border-none p-3 xs:text-xs m-0 w-80 md:w-70 xs:w-60"--}}
                       {{--required>--}}
                {{--<button class="rounded-full btn bg-primary text-white ">Search</button>--}}
            {{--</form>--}}


    <div class="flex  xs:block md:block">
        <div class="w-15 ">
            @if(Auth::guard('admin')->check())
            @include('admin.layouts.sidebar.index')
                @endif
        </div>
        <div class="w-85 mx-auto xs:w-90 xs:mx-auto xl:px-3">
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
