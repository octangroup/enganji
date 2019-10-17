<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/style.css?v1.1')}}" rel="stylesheet">
    <link href="{{asset('css/desktop.css?v1.1')}}" rel="stylesheet">
    <link href="{{asset('css/mobile.css?v1.1')}}" rel="stylesheet">
    <link href="{{asset('css/tablet.css?v1.1')}}" rel="stylesheet">
    <link href="{{asset('fonts/_flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/flaticonV2/flaticon.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css"
          integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">


    <!-- Script -->
</head>
<body>
<div id="app">

    @include('layouts.inc.sidebar')
    @include('layouts.inc.nav')

    @yield('notification')
    <div id="notification-section"
         class="w-25 xs:w-80 xs:mx-auto fixed xs:relative md:relative sm:relative z-99 r-2 mt-3 xs:mt-0 sm:mt-0 pt-4 md:mt-0">
        @include('layouts.notifications')
        @yield('notification')
    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@include('layouts.inc.footer')
</body>
<script>
    $('.toggler').click(function () {
        let data = $(this).data('toggle');
        $(data).toggle(100);
    });
</script>
</html>
