@extends('affiliate.layouts.app')

@section('content')
    <div>
        <div class="bg-white py-5  border-1 border-solid border-grey-light my-5 w-50 mt-5 xs:w-100 mx-auto rounded-xlg">
            <div class="w-75 xs:w-100 xs:px-3 mx-auto mb-5 pt-3">
                <div class="w-50 mx-auto text-center mb-5">

                    <h3 class="font-primary">Login</h3>
                </div>
                        <form class="form-horizontal w-80 xs:w-100 sm:w-100 md:w-100 mx-auto mt-5" role="form" method="POST" action="{{ route('affiliate.login') }}">
                            {{ csrf_field() }}

                            <div class="border-1 border-solid border-grey relative mb-4">
                                <label for="password"
                                       class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                       style="top: -25%;">{{ __('Email') }}</label>
                                <input id="password" type="email"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none px-3 w-100 py-1 relative shadow-none py-0 mt-2 rounded-none"
                                       autocomplete="false"
                                       name="email"
                                       required>
                            </div>
                            <div class="border-1 border-solid border-grey relative mt-4">
                                <label for="password"
                                       class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                       style="top: -25%;">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none w-100 py-1 relative px-3 shadow-none py-0 mt-2 rounded-none"
                                       name="password"
                                       required>
                            </div>

                            <div class="w-50 xs:w-100 mx-auto mt-4 text-sm mx-auto text-center">
                                    <a class="btn shadow-none text-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            </div>
                            <div class="w-100 mx-auto mt-1 text-center mt-4">
                                <a href="{{ route('affiliate.register') }}"
                                   class="btn border-1 btn-outline-primary border-primary hover:text-white hover:bg-primary rounded-full mx-3">
                                    {{ __('Register') }}
                                </a>
                                <button type="submit" class="btn btn-primary xs:mt-2  rounded-full mx-3 ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
