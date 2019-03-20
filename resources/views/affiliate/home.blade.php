@extends('affiliate.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Affiliate Dashboard</div>


                <div class="panel-body">
                     {{$affiliate->check_subscription()}}

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
