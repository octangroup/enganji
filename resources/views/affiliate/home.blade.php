@extends('affiliate.layouts.app')

@section('content')
<div class="container">
    <div class="row">

            <div class="panel panel-default">
                <div class="text-center ">
                    <h4>Affiliate Dashboard</h4>
                </div>


                <div class="text-center">
                    @if($affiliate->is_Active())
                    {{__('You are active')}}
                    @else
                        {{__('You are not active')}}
                    @endif

                </div>

        </div>


            <div class="panel-body  w-80 xs:w-90 has-text-centered mx-auto">

                <div class="flex">
                    <div class="w-25 xs:w-100 mx-3 bg-blue-light my-5  rounded-lg inline-block">

                            <div class="text-center text-white">
                                <h4 class="my-4 text-2xl">  {{$products->count()}}</h4>
                                <p class="my-3">{{__('Approved Products')}}</p>
                            </div>


                    </div>


                    {{--<div class="flex-30 rounded-ma mx-3 px-3 py-3 bg-white border-none has-text-centered border-solid shadow">--}}
                        {{--<div class="text-centered">--}}
                            {{--{{__('Visits')}}<br>--}}
                        {{--</div>--}}


                        {{--<div class="text-centered">--}}
                            {{--{{$product_visits->visits->count()}}--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>






                </div>
            </div>


        <div class="mt-6 w-50 xs:w-100 mx-auto ml-5">
            {!! $chart->container() !!}
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {!! $chart->script() !!}

</div>
</div>
@endsection
