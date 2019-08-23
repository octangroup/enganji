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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
<div id="app" class="relative">

    <div class="flex xs:block md:block">
        @if(Auth::guard('admin')->check())
            <div class="w-15 ">
                @include('admin.layouts.sidebar.index')
            </div>
        @endif
        <div class="@if(Auth::guard('admin')->check()) w-85 @else w-100 @endif xs:w-90 mx-auto xs:mx-auto xl:px-3">
            @include('admin.layouts.nav')
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script defer>
    $('.toggler').click(function () {
        let toggle = $(this).data('toggle');
        $(toggle).toggle(150);
    });
</script>
@yield('script')
</body>
</html>
