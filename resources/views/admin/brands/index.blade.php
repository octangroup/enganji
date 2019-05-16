@extends('admin.layouts.app')
@section('content')

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{__(' Brand')}}
                <button data-toggle="#add-brand-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>

            {{--<div class="bg-transparent  w-100  ">--}}

                {{--<form name="search_form" method="get"  class="flex my-4">--}}
                    {{--<div class="w-50 mx-auto  py-2 ">--}}
                        {{--<input name="keyword" type="text" placeholder="Search...."--}}
                               {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
                    {{--</div>--}}



                {{--</form>--}}
            {{--</div>--}}


            <div id="add-brand-form" class="card-body hidden-temp">
                <form action="{{action('Admin\BrandController@store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-5">

                            <label>Name</label>
                            <input class="form-control" name="name" type="text">

                        </div>
                        <button class="btn btn-success mt-4">{{__('save')}}</button>
                    </div>
                </form>
            </div>
            <br>


            @foreach($brands as $brand)
                <div class=" mt-4   text-center mx-4 bg-white shadow rounded-xl  mb-4 p-2 py-4 ">
                    <div class="flex">
                        <div class="w-40 px-4">
                            {!! $brand->name !!}
                        </div>
                    </div>
                    <div class=" text-right mr-3">
                        <button data-toggle="#modify-form-{{$brand->id}}"
                                class="btn btn-outline-success rounded-full px-3 text-sm py-2 font-primary toggler">
                            Modify
                        </button>
                        <a href="{{action('Admin\BrandController@destroy',[$brand->id])}}"
                           class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary">delete</a>

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


            @endforeach

        </div>

    </div>
@endsection
