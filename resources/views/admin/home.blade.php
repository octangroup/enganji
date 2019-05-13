@extends('admin.layouts.app')

@section('content')


    <div class="container">


        <div class="flex w-85 mx-auto  mt-2 ">

            <div class="w-25  bg-orange my-5 rounded-lg">
                <div class="text-center text-white">
                    {{__('Affiliates')}}<br>

                    {{$affiliates->count()}}

                </div>
            </div>


            <div class="w-25 mx-3 bg-blue-light my-5  rounded-lg">
                <div class="text-center text-white">
                    {{__('Users')}}<br>

                    {{$users->count()}}

                </div>
            </div>


            <div class="w-25 mx-3 bg-pink-darker opacity-75 my-5 rounded-lg">
                <div class="text-center text-white">
                    {{__('Products')}}<br>

                    {{$products->count()}}

                </div>
            </div>

        </div>

        <div class="panel panel-default">


            <div class="mt-6 w-50 ml-5">
                {!! $chart->container() !!}
                {{--{!! $userChart->container() !!}--}}

            </div>
            <div class="mt-6 w-50 ml-5">
                {!! $userChart->container() !!}

            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

    {!! $chart->script() !!}
    {!! $userChart->script() !!}


@endsection
