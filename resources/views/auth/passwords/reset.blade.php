@extends('layouts.app')

@section('content')
        <div class="w-80 mx-auto xs:w-90 mt-70 mb-70">
            <div class="panel panel-default xs:w-100 border-1 border-solid border-grey-light w-65 mx-auto mt-70  rounded-xlg">
                 <div class="text-center my-4 font-primary">
                <h2 class="text-center my-4 font-primary">Reset Password</h2>
                 </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="border-1 border-solid  relative mt-4 border-grey{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small" style="top: -25%;">E-Mail Address</label>


                                <input id="email" type="email" class="form-input my-0 border-none px-3 relative shadow-none py-1 mt-2 rounded-none" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                        <div class="border-1 border-solid  relative mt-4 border-grey{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="my-0 absolute  z-99 bg-white px-1 mx-2 text-grey-darker text-sm line-height-small">Password</label>


                                <input id="password" type="password" class="form-input my-0 border-none px-3 relative shadow-none py-1 mt-2 rounded-none" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
