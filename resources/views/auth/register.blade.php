@extends('layouts.app')

@section('content')
    <div class="w-80 mx-auto xs:w-90 mt-70 mb-70">
        <div class="panel panel-default xs:w-100 shadow-md w-65 mx-auto mt-70 rounded-lg">
            <div class="panel-body py-5">
                <h2 class="text-center my-4 font-primary">{{ __('Register') }}</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="w-50 xs:w-100 mx-auto mt-2">
                        <div
                                class="border-1 border-solid  relative {{ $errors->has('name') ? ' border-red' : 'border-grey' }}">
                            <label for="name"
                                   class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Names') }}</label>
                            <input id="name" type="text"
                                   class="form-input my-0 border-none px-3 relative shadow-none py-1 mt-2 rounded-none"
                                   value="{{old('name')}}"
                                   name="name"
                            >
                        </div>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback block" role="alert">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <div
                                class="border-1 border-solid  relative mt-4 {{ $errors->has('email') ? ' border-red' : 'border-grey' }}">
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
                            <span class="invalid-feedback block" role="alert">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div
                                class="border-1 border-solid  mt-4 relative z-100 {{ $errors->has('phone_number') ? ' border-red' : 'border-white' }}">
                            <phone-input  v-bind:class="'w-100 border-0 shadow-none-focused focus:border-accent py-1'"

                                          field_name="phone_number"></phone-input>

                        </div>
                        @if ($errors->has('phone_number'))
                            <span class="invalid-feedback block" role="alert">
                                                                    <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                        <div
                                class="border-1 border-solid  mt-4 relative {{ $errors->has('name') ? ' border-red' : 'border-grey' }}">
                            <label for="password"
                                   class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-input my-0 border-none relative px-3 shadow-none py-1 mt-2 rounded-none"
                                   name="password"
                                   required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback block" role="alert">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="border-1 border-solid border-grey relative mt-4">
                            <label for="password_confirmation"
                                   class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password"
                                   class="form-input my-0 border-none relative px-3 shadow-none py-1 mt-2 rounded-none"
                                   name="password_confirmation"
                                   required>
                        </div>
                    </div>
                    <div class="w-60 mx-auto xs:w-100 mt-2 text-center mt-4">
                        <a href="{{ route('login') }}"
                           class="btn border-1 text-primary border-primary hover:bg-grey-dark rounded-full mx-3">
                            {{ __('Already have an account?') }}
                        </a>
                        <button type="submit" class="btn btn-primary xs:mt-3 hover:bg-grey-dark rounded-full mx-3">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
