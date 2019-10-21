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
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div id="app" class="relative">

    <div class="flex  mx-auto xs:block md:block">
        @if(Auth::guard('affiliate')->check())
            <div class="w-15 ">
                @include('affiliate.layouts.sidebar')
            </div>
        @endif
        <div class="@if(Auth::guard('affiliate')->check()) w-85 @else w-100 @endif xs:w-100 xs:mx-auto xl:px-3">
            @include('affiliate.layouts.nav')
            @yield('content')
        </div>

    </div>

</div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
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
