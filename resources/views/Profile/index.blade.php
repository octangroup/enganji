@extends('layouts.app')
@section('content')

    <div class="panel bg-grey-lightest t w-100 mx-auto mb-5 pb-5">
        <div class="panel-body w-85 mx-auto">
            <div class="flex xs:flex-wrap">


                <div class="w-30 xs:w-40  md:w-40  ">
                    <div class="relative">
                        <img src="{{Auth::user()->avatar}}" class="rounded-full md:p-4 sm:p-4 lg:p-4 relative">
                        <div class="text-right absolute r-5 t-65">
                            <p class="w-rem-12 xs:w-rem-10 xs:h-10 h-12 bg-white border-1 pt-1 border-solid border-grey text-center my-auto rounded-full ml-auto">
                                <i class="fas text-2xl xs:text-xl xs:mt-1 mt-2 fa-camera"></i>
                            </p>
                        </div>
                    </div>

                </div>
                <div class="w-30 md:w-35 xs:mx-2 sm:mx-4 xs:w-50 p-4 xs:mt-3 lg:mt-5 xs:p-0 ">
                    <p class="text-2xl md:text-xl xs:text-base font-medium p-0 m-0 mt-2">{{$user->name}}</p>
                    <a href="{{action('ProfileController@edit', [$user->id])}}" class="btn mt-3 border-1 border-solid xs:text-xs border-grey rounded">
                        <i class="fas fa-pen xs:text-sm "></i>
                        <spna class="xs:text-sm">Edit profile</spna>
                    </a>
                </div>

                <div class="w-40 mt-4 rounded  xs:w-100 rounded-lg  bg-white border-1 p-4 border-1 border-solid border-grey">
                    <h1 class="text-xl font-normal p-0 m-0 mt-2">About</h1>
                    <p class="m-0 montserrat pt-2 p-0">{{$user->email}}</p>

                </div>
            </div>


            <div class="  mt-4">
                <div class="w-70 mx-auto mt-5 xl:pr-4 xs:pr-0 ">
                    <div class="rounded h-48 bg-white rounded-lg text-center relative border-1 border-grey border-solid">
                        <div
                                class=" w-25 bg-white py-1 text-sm border-1 mt-3  border-grey border-solid text-center rounded ml-3 absolute r-35 -t-15">
                            Cart </div>
                    </div>
                </div>
                <div class="w-70 mx-auto mt-5 xl:pr-4 xs:pr-0 ">
                    <div class="rounded h-48 bg-white rounded-lg text-center relative border-1 border-grey border-solid">
                        <div
                                class=" w-25 bg-white py-1 text-sm border-1 mt-3  border-grey  border-solid text-center rounded ml-3 absolute r-35 -t-15">
                            Wish List
                        </div>
                    </div>

                </div>


            </div>


            {{--<div class="flex mt-4">--}}
                {{--<div class="w-@extends('layouts.app')--}}
                {{--@section('content')--}}

                        {{--<div class= "panel bg-grey-lightest t w-100 mx-auto mb-5 pb-5">--}}

                {{--<div class="panel-body w-85 mx-auto">--}}
                    {{--<div class="flex">--}}
                        {{--<div class="w-30">--}}
                            {{--<div class="relative">--}}
                                {{--<img src="{{Auth::user()->avatar}}" class="rounded-full p-5 relative">--}}
                                {{--<div class="text-right absolute r-10 t-65">--}}
                                    {{--<p class="w-rem-12 h-12 bg-white border-1 pt-1 border-solid border-grey text-center my-auto rounded-full ml-auto">--}}
                                        {{--<i class="fas text-2xl mt-2 fa-camera"></i>--}}
                                    {{--</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="w-30 p-4">--}}
                            {{--<p class="text-2xl font-medium p-0 m-0 mt-2">{{$user->name}}</p>--}}
                            {{--<h4><a href="{{action('ProfileController@edit', [$user->id])}}" class="btn btn-primary mx-3"><i--}}
                                            {{--class="fas fa-plus-circle"></i> Edit profile</a></h4>--}}
                        {{--</div>--}}

                        {{--<div class="w-40 mt-4 rounded  rounded-lg h-54 bg-white border-1 p-4 border-1 border-solid border-grey">--}}
                            {{--<h1 class="text-xl font-normal p-0 m-0 mt-2">About User:</h1>--}}
                            {{--<p class="m-0 montserrat pt-2 p-0">{{$user->email}}</p>--}}

                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--@endsection--}}

                {{--</div>--}}


            </div>

        </div>

@endsection
