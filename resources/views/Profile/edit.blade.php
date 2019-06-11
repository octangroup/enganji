@extends('layouts.app')

@section('content')
<div class="">


    <div class="w-50 mx-auto text-center mb-5">
    <p><i class="fi flaticon-user-3 text-5xl"></i></p>
    <h4 class="font-primary">Edit</h4>
    </div>
    <div class="w-90 mx-auto">
        <form method="post" action="{{ action('ProfileController@update', [$user->id]) }}}">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="bg-white py-4 border-1 border-grey-light border-solid my-5 w-70 xs:w-90 xl:flex mx-auto rounded-lg">



                <div class="w-80 xs:w-100">
                    <div class="border-1 border-solid  mx-4  relative border-grey">

                        <label for="name"
                               class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                               style="top: -25%;">{{ __('Name') }}" </label>
                        <input id="name" type="text"
                               class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                               autocomplete="false"
                               value="{{ $user->name }}"
                               name="name"
                               required>



                    </div>
                </div>


                <div class=" w-20  mx-3 xs:pt-3 xs:px-1 sm:pt-3 sm:px-1 md:pt-3 md:px-1">
                    <button type="submit" class=" btn btn-primary xs:text-xs  rounded-full xs:py-2 "> Change </button>
                </div>

            </div>
        </form>




        <div class="bg-white py-4 border-1 border-grey-light border-solid my-5 w-70 xs:w-90 xl:flex mx-auto rounded-lg">
            <div class="w-80 w-100">
                <div class="border-1 border-solid  mx-4  relative border-grey">

                    <label for="email"
                           class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                           style="top: -25%;">{{ __('Email') }}" </label>
                    <input id="email" type="text"
                           class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                           autocomplete="false"
                           value="{{ $user->email }}"
                           name="email"
                           required>



                </div>
            </div>

            <div class=" w-20  mx-3 xs:pt-3 xs:px-1 sm:pt-3 sm:px-1 md:pt-3 md:px-1">
                <button type="submit" class=" btn btn-primary xs:text-xs rounded-full xs:py-2 "> Change </button>
            </div>
        </div>


        <form method="post" action="{{action('ProfileController@updatePassword',[$user->id])}}">
            {{csrf_field()}}
            @method('PATCH')
            <div class="bg-white py-4 border-1 border-grey-light border-solid my-5 w-70 xs:w-90 xl:flex mx-auto rounded-lg">
                <div class="w-80 xs:w-100">
                    <div class="border-1 border-solid  mx-4  relative border-grey">

                        <label for="password"
                               class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small" style="top: -25%;">{{ __('Old Password') }}</label>
                        <input id="password" type="password"
                               class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                               autocomplete="false"
                               name="old"
                               required>



                    </div>
                    <div class="border-1 border-solid mt-4  mx-4  relative border-grey">


                        <label for="password"
                               class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small" style="top: -25%;">{{ __('new Password') }}</label>
                        <input id="password" type="password"
                               class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                               autocomplete="false"

                               name="new_password"
                               required>


                    </div>
                    <div class="border-1 border-solid mt-4 mx-4  relative border-grey">

                        <label for="password"
                               class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small" style="top: -25%;">{{ __('confirm_password') }}</label>
                        <input id="password" type="password"
                               class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                               autocomplete="false"

                               name="confirm"
                               required>



                    </div>
                </div>

                <div class=" w-20 my-auto  mx-3 xs:pt-3 xs:px-1 sm:pt-3 sm:px-1 md:pt-3 md:px-1">
                    <button type="submit" class=" btn btn-primary xs:text-xs rounded-full xs:py-2 "> Change </button>
                </div>
            </div>

        </form>

        <div class="bg-white py-4 border-1 border-grey-light border-solid my-5 w-70 xs:w-90 xl:flex mx-auto rounded-lg">
            <div class=" w-100">

                <form action="{{action('ProfileController@updateProfile', [$user->id])}}" method="post" enctype="multipart/form-data" class="w-90 xs:w-100 xs:mx-auto xl:flex">
                    {{csrf_field()}}
                    @method('PATCH')
                    <div class="  mt-2 px-4 ">
                        <label>Upload Profile</label>
                        @if(($prct ?? null) && $user->avatarOriginal())
                            <div class="w-50 my-3">
                                <img class="w-100" src="{{$user->avatarOriginal()}}">
                            </div>
                        @endif
                        <div class="xl:flex w-100  ">
                            <div class="w-90 xs:w-100  mt-3">
                                <input type="file" name="fileToUpload"  id="fileToUpload">
                            </div>
                            <div class="w-10  xl:mx-5 md:pt-3 xs:pt-3 xs:px-1 sm:pt-3 sm:px-1 md:px-1 ">
                                <button class=" btn btn-primary rounded-full xs:text-xs" type="submit ">Upload Profile</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>

    </div>


    {{--<div class="bg-white py-5 shadow my-5 w-70 xs:w-100 mx-auto rounded-lg">--}}
        {{--<div class="w-90 mx-auto mb-5 pt-3">--}}

        {{--</div>--}}
        {{--<div class="bg-white border-1 border-solid border-grey-light py-3 w-80 md:w-90 xs:w-90 pb-3 xs:pb-1 px-4 md:px-3 xs:px-3 mx-auto">--}}
            {{--<div class="xl:flex md:flex lg:flex px-4 xs:px-2 py-2">--}}

    {{--<form method="post" action="{{ action('ProfileController@update', [$user->id]) }}}">--}}
        {{--{{ csrf_field() }}--}}
        {{--@method('PATCH')--}}

        {{--<div class="card">--}}

        {{--<div class="row">--}}
            {{--<div class="col-lg-2">--}}

        {{--Name: <input type="text" name="name"  value="{{ $user->name }}" class="form-control" />--}}

        {{--<button type="submit">Change</button>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
    {{--<div class="card">--}}

        {{--<form method="post" action="{{action('ProfileController@updatePassword',[$user->id])}}">--}}
            {{--{{csrf_field()}}--}}
            {{--@method('PATCH')--}}

            {{--<div class="card">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-4">--}}
                    {{--Old Password: <input type="password" name="old" class="form-control">--}}
                    {{--New Password: <input type="password" name="new_password" class="form-control">--}}
                    {{--Confirm Password: <input type="password" name="new_password_confirmation" class="form-control">--}}

                    {{--<button type="submit">Change</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        {{--</form>--}}
    {{--</div>--}}

    {{--<div class="card">--}}

        {{--<form action="{{action('ProfileController@updateProfile', [$user->id])}}" method="post" enctype="multipart/form-data">--}}
            {{--{{csrf_field()}}--}}
            {{--@method('PATCH')--}}
            {{--<div class="col-md-6  mt-3">--}}
                {{--<label>Upload Profile</label>--}}
                {{--@if(($prct ?? null) && $user->avatarOriginal())--}}
                    {{--<div class="w-50 my-3">--}}
                        {{--<img class="w-100" src="{{$user->avatarOriginal()}}">--}}
                    {{--</div>--}}
                {{--@endif--}}
                {{--<input type="file" name="fileToUpload" class="w-100" id="fileToUpload">--}}
                {{--<button type="submit">Upload Profile</button>--}}
            {{--</div>--}}


        {{--</form>--}}
    {{--</div>--}}
{{--</div>--}}


@endsection