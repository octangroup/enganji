@extends('layouts.app')

@section('content')
    <div class="w-80 mx-auto xs:w-90  mt-70 mb-70">
        <div class="panel panel-default xs:w-100 sm:w-100 md:w-100 shadow-md w-65 mx-auto mt-70 rounded-lg">
            <div class="panel-body py-5">
                <h2 class="text-center my-3 font-primary">{{ __('Login') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="w-50 xs:w-100 sm:w-100 md:w-100 mx-auto mt-5">
                        <div class="border-1 border-solid border-grey relative mb-4">
                            <label for="password"
                                   class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Email') }}</label>
                            <input id="password" type="email"
                                   class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none px-3 relative shadow-none py-1 mt-2 rounded-none"
                                   autocomplete="false"
                                   name="email"
                                   required>
                        </div>
                        <div class="border-1 border-solid border-grey relative mt-5">
                            <label for="password"
                                   class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }} my-0 border-none relative px-3 shadow-none py-1 mt-2 rounded-none"
                                   name="password"
                                   required>
                        </div>

                        <div class="w-50 xs:w-100 mx-auto mt-4 text-sm mx-auto text-center">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                            @if (Route::has('password.request'))
                                <a class="btn shadow-none text-sm" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="w-100 mx-auto mt-1 text-center mt-4">

                            <a href="{{ route('register') }}"
                               class="btn border-1 text-primary border-primary hover:bg-accent rounded-full mx-3">
                                {{ __('Register') }}
                            </a>

                            <button type="submit" class="btn btn-primary hover:bg-accent rounded-full mx-3 ">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
