@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">

    <form method="post" action="{{ action('ProfileController@update', [$user->id]) }}}">
        {{ csrf_field() }}
        @method('PATCH')

        <div class="card">

        <div class="row">
            <div class="col-lg-2">

        Name: <input type="text" name="name"  value="{{ $user->name }}" class="form-control" />

        <button type="submit">Change</button>

        </div>
        </div>
        </div>
    </form>
    </div>
    <div class="card">

        <form method="post" action="{{action('ProfileController@updatePassword',[$user->id])}}">
            {{csrf_field()}}
            @method('PATCH')

            <div class="card">
                <div class="row">
                <div class="col-md-4">
                    Old Password: <input type="password" name="old" class="form-control">
                    New Password: <input type="password" name="new_password" class="form-control">
                    Confirm Password: <input type="password" name="new_password_confirmation" class="form-control">

                    <button type="submit">Change</button>
                </div>
            </div>
            </div>

        </form>
    </div>

    <div class="card">

        <form action="{{action('ProfileController@updateProfile', [$user->id])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            @method('PATCH')
            <div class="col-md-6  mt-3">
                <label>Upload Profile</label>
                @if(($prct ?? null) && $user->avatarOriginal())
                    <div class="w-50 my-3">
                        <img class="w-100" src="{{$user->avatarOriginal()}}">
                    </div>
                @endif
                <input type="file" name="fileToUpload" class="w-100" id="fileToUpload">
                <button type="submit">Upload Profile</button>
            </div>


        </form>
    </div>
</div>


@endsection