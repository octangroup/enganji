@extends('affiliate.layouts.app')

@section('content')
    <div class="w-90 mx-auto">
        <div class="row">

            <div class="panel panel-default">
                <div class="text-left">
                    <h4 class="font-primary m-2 mb-4">Affiliate Dashboard</h4>
                </div>
                @if(!$affiliate->is_Active())
                    <div class="text-center text-red">
                        {{__('You are not active')}}
                    </div>
                @endif
            </div>


            <div class="panel-body  w-100 xs:w-90 mx-auto">
                <div class="flex mb-5">
                    <div class="w-25 xs:w-100 mx-3 bg-blue-light   rounded-xlg inline-block">

                        <div class="text-center text-white">
                            <h4 class="my-4 text-4xl font-primary">{{$products->count()}}</h4>
                            <p class="my-3">{{__('Approved Products')}}</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="mt-0 w-50 xs:w-100 border-1 border-solid border-grey-light p-3 mb-4 ml-3 rounded-xlg">
            {!! $chart->container() !!}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {!! $chart->script() !!}

    </div>
@endsection
