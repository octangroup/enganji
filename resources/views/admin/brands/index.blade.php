@extends('admin.layouts.app')
@section('content')

    <div class="container">

        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
            <div class=" w-80 mx-auto  flex">
                <div class="w-80">
                    <h4 class=" py-0 font-primary   text-xl"> {{__(' Brand')}}</h4>
                </div>
                <div class="w-20 my-3 mx-0 ">
                    <button data-toggle="#add-brand-form" class="btn  btn-primary text-sm rounded-xlg border-0  toggler ">
                        {{__('ADD NEW')}}
                    </button>
                </div>

            </div>



            {{--<div class="bg-transparent  w-100  ">--}}

                {{--<form name="search_form" method="get"  class="flex my-4">--}}
                    {{--<div class="w-50 mx-auto  py-2 ">--}}
                        {{--<input name="keyword" type="text" placeholder="Search...."--}}
                               {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
                    {{--</div>--}}



                {{--</form>--}}
            {{--</div>--}}


            <div id="add-brand-form" class=" py-4 hidden-temp rounded-none border-none shadow">
                <form action="{{action('Admin\BrandController@store')}}" method="post">
                    {{csrf_field()}}

                    <div class=" w-90 flex mx-auto">
                        <div class="w-30  mx-5 ">
                            <div class="border-1 border-solid border-grey relative mb-4">
                            <label for="password"
                                   class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">name</label>
                            <input id="password" type="name"
                                   class="form-control my-0 border-none px-3 w-100 py-1 relative shadow-none py-0 mt-2 rounded-none"
                                   autocomplete="false"
                                   name="email"
                                   required>
                            </div>
                        </div>
                        <div class="w-70 mx-4 py-1">
                            <button class="btn btn-success rounded py-2 ">{{__('save')}}</button>
                        </div>

            </div>
                </form>
            </div>
            <br>


            @foreach($brands as $brand)
                <div class=" w-80 xs:w-100 mx-auto xl:mt-3 ">
                    <div class="  xs:mx-0 bg-white border-1 border-solid border-grey-light rounded-xlg w-100 mb-4 p-2 py-5">
<div class="flex">
                        <div class="w-60 xs:mx-2 font-primary font-bold mx-5">
                           <p class="my-0 capitalize">{!! $brand->name !!}</p>
                        </div>

                    <div class="w-40 text-right xs:mr-2 mr-3">
                        <button data-toggle="#modify-form-{{$brand->id}}"
                                class="btn btn-outline-success xs:text-xs rounded-xlg px-3 text-sm py-2 font-primary toggler">
                            Modify
                        </button>
                        <a href="{{action('Admin\BrandController@destroy',[$brand->id])}}"
                           class="btn btn-outline-danger rounded-xlg xs:text-xs px-3 text-sm py-2 font-primary">delete</a>

                    </div>
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
