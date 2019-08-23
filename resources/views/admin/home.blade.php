@extends('admin.layouts.app')

@section('content')


    <div class="w-90 mx-auto">


        <div class="w-100 mx-auto px-2 mt-2 flex xs:block">

            <div class="w-25 xs:w-100 h-100 mx-3 xs:mx-0 bg-orange my-5 xs:my-2 rounded-xlg ">
                <div class="text-center text-white">
                    <h4 class="my-4 text-4xl font-primary">{{$affiliates->count()}}</h4>
                    <p class="my-3">{{__('Affiliates')}}</p>
                </div>
            </div>


            <div class="w-25 xs:w-100 mx-3 xs:mx-0 bg-blue-light my-5 xs:my-2  rounded-xlg">
                <div class="text-center text-white">
                    <h4 class="my-4 text-4xl font-primary"> {{$users->count()}}</h4>
                    <p class="my-3">{{__('Users')}}</p>
                </div>
            </div>


            <div class="w-25 xs:w-100 mx-3 xs:mx-0 bg-pink-darker opacity-75 my-5 xs:my-2 rounded-xlg">
                <div class="text-center text-white">
                    <h4 class="my-4 text-4xl font-primary">{{$products->count()}}</h4>
                    <p class="my-3">{{__('Products')}}</p>
                </div>
            </div>
            <div class="w-25 xs:w-100 mx-3 xs:mx-0 bg-green-darker opacity-75 my-5 xs:my-2 rounded-xlg">
                <div class="text-center text-white">
                    <h4 class="my-4 text-4xl font-primary">3</h4>
                    <p class="my-3">{{__('Ads')}}</p>
                </div>
            </div>

        </div>

        <div class="panel panel-default">
            <div class="w-100 mx-auto flex md:block xs:block">
                <div class="w-50 md:w-100 xs:w-100  mx-3 xs:mx-0 border-1 border-solid border-grey-light rounded-xlg overflow-hidden p-3">
                    {!! $chart->container() !!}
                    {{--{!! $userChart->container() !!}--}}

                </div>
                <div class="w-50 md:w-100 xs:w-100 md:mt-3 mx-3 xs:mx-0 xs:my-3 border-1 border-solid border-grey-light rounded-xlg overflow-hidden p-3">
                    {!! $userChart->container() !!}

                </div>
            </div>


        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

    {!! $chart->script() !!}
    {!! $userChart->script() !!}


@endsection
