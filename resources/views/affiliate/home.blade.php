@extends('affiliate.layouts.app')

@section('content')
<div class="container">
    <div class="row">

            <div class="panel panel-default">
                <div class="panel-heading">Affiliate Dashboard</div>


                <div class="panel-body">
                    @if($affiliate->is_Active())
                    {{__('You are active')}}
                    @else
                        {{__('You are not active')}}
                    @endif

                </div>

        </div>


            <div class="panel-body bg-white-smoke w-80 has-text-centered mx-auto">

                <div class="is-flex">
                    <div class="flex-30 rounded-ma mx-3 px-3 py-3 bg-white border-none has-text-centered border-solid shadow">
                        <i class="fas fa-video"></i><br>
                        <div class="text-centered">
                        {{__('Approved Products')}}<br>
                        </div>


                        <div class="text-centered">
                        {{$products->count()}}
                        </div>

                    </div>


                </div>
            </div>

</div>
</div>
@endsection
