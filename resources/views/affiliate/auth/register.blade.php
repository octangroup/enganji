@extends('affiliate.layouts.app')

@section('content')
<div class="container">
    <div class="bg-white py-5  border-1 border-solid border-grey-light my-5 w-70 xs:w-100 mx-auto rounded-lg">
        <div class="w-75 mx-auto mb-5 pt-3">
            <div class="w-50 mx-auto text-center mb-5">

                <h4 class="font-primary">Register</h4>
            </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('affiliate.register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <div
                                    class="border-1 border-solid  relative {{ $errors->has('name') ? ' border-red' : 'border-grey' }}">
                                <label for="name"
                                       class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                       style="top: -25%;">{{ __('Names') }}</label>
                                <input id="name" type="text"
                                       class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                                       value="{{old('name')}}"
                                       name="name"
                                >
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="border-1 border-solid  relative mt-4 {{ $errors->has('email') ? ' border-red' : 'border-grey' }}">
                                <label for="email"
                                       class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                       style="top: -25%;">{{ __('Email') }}</label>
                                <input id="email" type="email"
                                       class="form-control my-0 border-none px-3 relative shadow-none py-0 mt-2 rounded-none"
                                       autocomplete="false"
                                       value="{{old('email')}}"
                                       name="email"
                                       required>
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="border-1 border-solid  mt-4 relative {{ $errors->has('name') ? ' border-red' : 'border-grey' }}">
                                <label for="password"
                                       class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                       style="top: -25%;">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control my-0 border-none relative px-3 shadow-none py-0 mt-2 rounded-none"
                                       name="password"
                                       required>
                            </div>
                            <div class="col-md-6">


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="border-1 border-solid border-grey relative mt-4">
                            <label for="password_confirmation"
                                   class="my-0 absolute z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small"
                                   style="top: -25%;">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password"
                                   class="form-control my-0 border-none relative px-3 shadow-none py-0 mt-2 rounded-none"
                                   name="password_confirmation"
                                   required>
                        </div><br>






                        <div class="form-group">
                            <div class="w-50 xs:w-100 text-right">
                                <button class="btn btn-dark px-4 hover:bg-white hover:text-black py-2 uppercase text-xs rounded-full mx-0">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<script>
    new Vue({
        el: '#product-root',
        mounted: function () {
            $('.toggler').click(function (){
                let toggle = $(this).data('toggle');
                $(toggle).toggle(150);
            });
        }
    })
</script>


@endsection
