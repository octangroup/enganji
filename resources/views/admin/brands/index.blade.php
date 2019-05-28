@extends('admin.layouts.app')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="w-80 mx-auto  pb-4  ">
            <div class="inline-block">
                {{__(' Brand')}}
            </div>
            <div class="inline-block mx-3">
                <button data-toggle="#add-brand-form" class="btn btn-primary text-sm  rounded-full mx-2 border-0 toggler">{{__('Add NEW')}}</button>
            </div>

            {{--<div class="bg-transparent  w-100  ">--}}

                {{--<form name="search_form" method="get"  class="flex my-4">--}}
                    {{--<div class="w-50 mx-auto  py-2 ">--}}
                        {{--<input name="keyword" type="text" placeholder="Search...."--}}
                               {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
                    {{--</div>--}}



                {{--</form>--}}
            {{--</div>--}}


            <div id="add-brand-form" class="card hidden-temp rounded-none border-none shadow">
                <form action="{{action('Admin\BrandController@store')}}" method="post">
                    {{csrf_field()}}

                    <div class="flex mx-auto">
                        <div class="w-30 mt-3 my-3 mx-3 ">
                            <label class="inline-block">Name</label>
                            <input class="inline-block" name="name" type="text">
                        </div>
                        <div class="w-70 mx-4">
                            <button class="btn btn-success rounded py-1 mt-5">{{__('save')}}</button>
                        </div>

            </div>
                </form>
            </div>
            <br>


            @foreach($brands as $brand)
                <div class=" w-80 md:w-100 xs:w-100 mt-5 ">
                    <div class=" xl:mx-2 mt-3 bg-white border-1 border-solid border-grey-light rounded w-100 mb-4 p-2 py-3">

                        <div class="w-40 px-4 my-2">
                            {!! $brand->name !!}
                        </div>

                    <div class=" text-right mr-3">
                        <button data-toggle="#modify-form-{{$brand->id}}"
                                class="btn btn-outline-success xs:text-xs rounded-full px-3 text-sm py-2 font-primary toggler">
                            Modify
                        </button>
                        <a href="{{action('Admin\BrandController@destroy',[$brand->id])}}"
                           class="btn btn-outline-danger rounded-full xs:text-xs px-3 text-sm py-2 font-primary">delete</a>

                    </div>

                    <div id="modify-form-{{$brand->id}}" class="card-body hidden-temp">
                        <form action="{{action('Admin\BrandController@update',[$brand->id])}}" method="post">


                            {{csrf_field()}}
                            @method('put')

                            <div class="row">
                                <div class="col-md-5">

                                    <input class="form-control" name="name" type="text" value="{{$brand->name}}">

                                </div>
                                <button class="btn btn-success mt-4">{{__('save')}}</button>
                            </div>

                        </form>
                    </div>


                </div>
                </div>

            @endforeach

        </div>

    </div>
@endsection
