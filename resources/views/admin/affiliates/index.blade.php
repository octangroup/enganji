@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif

            {{--<div class="bg-transparent  w-100  ">--}}

                {{--<form name="search_form" method="get"  class="flex my-4">--}}
                    {{--<div class="w-50 mx-auto  py-2 ">--}}
                        {{--<input name="keyword" type="text" placeholder="Search...."--}}
                               {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
                    {{--</div>--}}



                {{--</form>--}}
            {{--</div>--}}

        <div class="card">
            <div class=" w-90 mx-auto ">
                <h4 class=" font-primary   text-2xl">Affiliates</h4>

            </div>


            {{--<div class="w-60 mx-auto">--}}
                {{--<form method="GET" action="{{action('Admin\AffiliatesController@search')}}">--}}
                    {{--<input type="text" name="keyword" class="form-control">--}}
                    {{--<button type="submit">search</button>--}}
                {{--</form>--}}
            {{--</div>--}}

            @if(count($affiliates))
                @foreach($affiliates as $affiliate)
                    <div class=" w-90 xs:w-100 mx-auto mt-5">
                    <div class="  bg-white border-1 border-solid border-grey-light rounded-xlg w-100 mb-4 p-2 py-5 ">
                        <div class="flex">
                            <div class="w-60 xs:mx-2 font-primary font-bold mx-5">
                               <p class="my-0 capitalize">{!! $affiliate->name !!}</p>
                            </div>

                            <div class=" w-40 text-right xs:mr-2 mr-3">
                                @if($affiliate->is_Active())
                                    <a class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary toggler"
                                       href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}">{{__('Disable')}}</a>
                                @else
                                    <a class="btn btn-outline-success rounded-full px-3 text-sm py-2 font-primary  toggler"
                                       href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}">{{__('Enable')}}</a>
                                @endif
                            </div>
                        </div>

                        </div>
            </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
