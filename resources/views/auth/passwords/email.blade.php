@extends('layouts.app')
@section('content')
    <div class="w-80 mx-auto xs:w-90  mt-70 mb-70">
        <div
                class="panel panel-default xs:w-100 lg:w-80 sm:w-100 md:w-100 border-1 border-solid border-grey-light w-65 mx-auto mt-70 rounded-xlg">
            <div class="panel-body py-5">
                <h2 class="text-center my-3 font-primary">{{ __('Reset Password') }}</h2>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="w-50 xs:w-100 sm:w-100 md:w-100 mx-auto mt-5">
                        <div
                                class="border-1 border-solid  relative  {{ $errors->has('email') ? ' border-red' : ' mb-4 border-grey' }}">
                            <label for="email"
                                   class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Email') }}</label>
                            <input id="email" type="email"
                                   class="form-input my-0 border-none px-3 relative shadow-none py-1 mt-2 rounded-none"
                                   autocomplete="false"
                                   value="{{old('email')}}"
                                   name="email"
                                   required>
                        </div>
                        @if ($errors->has('email'))
                        <div>
                            <p class="my-0 text-sm text-red">{{ $errors->first('email') }}</p>
                        </div>
                        @endif
                        
                        
                        <div class="w-100 mx-auto mt-1 text-center mt-4">
                            <a href="{{ route('login') }}"
                               class="btn border-1 btn-outline-primary border-primary hover:text-white hover:bg-primary rounded-full mx-3">
                                {{ __('Go Back') }}
                            </a>
                            <button type="submit" class="btn btn-primary xs:mt-2  rounded-full mx-3 ">
                                {{ __('Reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
