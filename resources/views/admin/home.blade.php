@extends('admin.layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                {{$today_products}}
                {{$last_week_products}}
                {{$this_week}}
            </div>
        </div>
    </div>
</div>


@endsection
