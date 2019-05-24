@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white py-5  border-1 border-solid border-grey-light my-5 w-60 mt-5 xs:w-100 mx-auto rounded-lg">
            <div class="w-75 xs:w-100 xs:px-3 mx-auto mb-5 pt-3">
                <div class="w-50 mx-auto text-center mb-5">

                    <h3 class="font-primary">Login</h3>
                </div>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="border-1 border-solid border-grey relative mb-4">
                        <label for="password"
                               class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                               style="top: -25%;">{{ __('Email') }}</label>
                        <input id="password" type="email"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                               autocomplete="false"
                               name="email"
                               required>
                    </div>
                    <div class="border-1 border-solid border-grey relative mt-4">
                        <label for="password"
                               class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                               style="top: -25%;">{{ __('Password') }}</label>
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none relative px-3 shadow-none py-0 mt-2 rounded-none"
                               name="password"
                               required>
                    </div>
                    <div class="w-100 xl:flex md:flex mt-4">
                        <div class="w-50 xs:w-100">
                            <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                        <div class="w-50 xs:w-100 text-right">
                            <button class="btn btn-dark px-4 hover:bg-white hover:text-black py-2 uppercase text-xs rounded-full mx-0">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
