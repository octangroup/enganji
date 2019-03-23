@extends('layouts.app')

@section('content')

    <form method="post" action="{{ action('ProfileController@update', [$user->id]) }}}">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="card">

        <div class="row">
            <div class="col-lg-2">

        Name: <input type="text" name="name"  value="{{ $user->name }}" />

        Email: <input type="email" name="email"  value="{{ $user->email }}" />

        Password: <input type="password" name="password" />

        Password Confirmation: <input type="password" name="password_confirmation" >

        <button type="submit">Submit</button>
            </div>
        </div>
        </div>
    </form>


@endsection