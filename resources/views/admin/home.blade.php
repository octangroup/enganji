@extends('admin.layouts.app')

@section('content')


    <div class="container">


        <div class=" w-85 md:w-90 mx-auto  mt-2 text-center">

            <div class="w-25 xs:w-100 bg-orange my-5 xs:my-2 rounded-lg inline-block">
                <div class="text-center text-white">
                    <h4 class="my-4 text-2xl">{{$affiliates->count()}}</h4>
                    <p class="my-3">{{__('Affiliates')}}</p>
                </div>
            </div>


            <div class="w-25 xs:w-100 mx-3 xs:mx-0 bg-blue-light my-5 xs:my-2  rounded-lg inline-block">
                <div class="text-center text-white">
                    <h4 class="my-4 text-2xl"> {{$users->count()}}</h4>
                    <p class="my-3">{{__('Users')}}</p>
                </div>
            </div>


            <div class="w-25 xs:w-100 mx-3 xs:mx-0 bg-pink-darker opacity-75 my-5 xs:my-2 rounded-lg inline-block">
                <div class="text-center text-white">
                    <h4 class="my-4 text-2xl">{{$products->count()}}</h4>
                    <p class="my-3">{{__('Products')}}</p>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div  class="w-80 mx-auto">
                <div class="mt-6 w-50 md:w-100 ml-5">
                    {!! $chart->container() !!}
                    {{--{!! $userChart->container() !!}--}}

                </div>
                <div class="mt-6 w-50 md:w-100 ml-5">
                    {!! $userChart->container() !!}

                </div>
            </div>



        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

    {!! $chart->script() !!}
    {!! $userChart->script() !!}


@endsection
