@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="card">


            {{--<div class="w-60 mx-auto">--}}
                {{--<form method="GET" action="{{action('Admin\AffiliatesController@search')}}">--}}
                    {{--<input type="text" name="keyword" class="form-control">--}}
                    {{--<button type="submit">search</button>--}}
                {{--</form>--}}
            {{--</div>--}}
            @if(count($affiliates))
                @foreach($affiliates as $affiliate)
                    <div class=" mt-4   text-center mx-4 bg-white shadow rounded-xl  mb-4 p-2 py-4 ">
                        <div class="flex">
                            <div class="w-40 px-4">
                                {!! $affiliate->name !!}
                            </div>
                        </div>
                        <div class=" text-right mr-3">
                                @if($affiliate->is_Active())
                                    <a class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary"
                                       href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}">{{__('Disable')}}</a>
                                @else
                                    <a class="btn btn-outline-success rounded-full px-3 text-sm py-2 font-primary toggler"
                                       href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}">{{__('Enable')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
