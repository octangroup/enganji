@extends('admin.layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="mt-6 w-50 ml-5">
                    {!! $chart->container() !!}
                    {{--{!! $userChart->container() !!}--}}

                </div>
                <div class="mt-6 w-50 ml-5">
                    {!! $userChart->container() !!}

                </div>
        </div>
        </div>
        <div class="card-body">
            {{__('Affiliates')}}<br>

            {{$affiliates->count()}}

        </div>
    </div>
    <div class="card-body">
        {{__('Users')}}<br>

        {{$users->count()}}

    </div>
    <div class="card-body">
        {{__('Products')}}<br>

        {{$products->count()}}

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

{!! $chart->script() !!}
    {!! $userChart->script() !!}


@endsection
