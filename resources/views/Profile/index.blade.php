@extends('layouts.app')
@section('content')

    <div class="panel bg-grey-lightest t w-100 mx-auto mb-5 pb-5">
        <div class="panel-body w-85 mx-auto">
            <div class="flex">
                <div class="w-30">
                    <div class="relative">
                        <img src="{{Auth::user()->avatar}}" class="rounded-full p-5 relative">
                        <div class="text-right absolute r-10 t-65">
                            <p class="w-rem-12 h-12 bg-white border-1 pt-1 border-solid border-grey text-center my-auto rounded-full ml-auto">
                                <i class="fas text-2xl mt-2 fa-camera"></i>
                            </p>
                        </div>
                    </div>

                </div>
                {{--<div class="w-30 p-4">--}}
                    {{--<p class="text-2xl font-medium p-0 m-0 mt-2">{{$user->name}}</p>--}}
                    {{--<button class="btn mt-3 border-1 border-solid border-grey rounded">--}}
                        {{--<i class="fas fa-pen"></i>--}}
                        {{--<spna>Edit profile</spna>--}}
                    {{--</button>--}}
                {{--</div>--}}

                <div class="w-40 mt-4 rounded  rounded-lg h-54 bg-white border-1 p-4 border-1 border-solid border-grey">
                    <h1 class="text-xl font-normal p-0 m-0 mt-2">About</h1>
                    <p class="m-0 montserrat pt-2 p-0">{{$user->email}}</p>

                </div>
            </div>

            <div class="flex mt-4">
                <div class="w-@extends('layouts.app')
                @section('content')

                        <div class="panel bg-grey-lightest t w-100 mx-auto mb-5 pb-5 ">

                <div class="panel-body w-85 mx-auto">
                    <div class="flex">
                        <div class="w-30">
                            <div class="relative">
                                <img src="{{Auth::user()->avatar}}" class="rounded-full p-5 relative">
                                <div class="text-right absolute r-10 t-65">
                                    <p class="w-rem-12 h-12 bg-white border-1 pt-1 border-solid border-grey text-center my-auto rounded-full ml-auto">
                                        <i class="fas text-2xl mt-2 fa-camera"></i>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="w-30 p-4">
                            <p class="text-2xl font-medium p-0 m-0 mt-2">{{$user->name}}</p>
                            <h4><a href="{{action('ProfileController@edit', [$user->id])}}" class="btn btn-primary mx-3"><i
                                            class="fas fa-plus-circle"></i> Edit profile</a></h4>
                        </div>

                        <div class="w-40 mt-4 rounded  rounded-lg h-54 bg-white border-1 p-4 border-1 border-solid border-grey">
                            <h1 class="text-xl font-normal p-0 m-0 mt-2">About User:</h1>
                            <p class="m-0 montserrat pt-2 p-0">{{$user->email}}</p>

                        </div>
                    </div>

                </div>

                @endsection

                </div>


            </div>

        </div>

@endsection
