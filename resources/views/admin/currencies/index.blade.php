@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{__('Currency')}}
                <button data-toggle="#add-currency-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>

            <div id="add-currency-form" class="card-body hidden-temp">
                <form action="{{action('Admin\CurrencyController@store')}}" method="POST">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">

                            <label>Name</label>
                            <input class="form-control" name="name" type="text">

                        </div>
                        <button class="btn btn-success mt-4">{{__('save')}}</button>
                    </div>
                </form>
            </div><br>


            @foreach($currencies as $currency)

                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-10">
                            {{$currency->name}}
                        </div>
                        <div>
                            <button data-toggle="#mod-currency-{{$currency->id}}" class="btn btn-success toggler ">Modify</button>
                            <a href="{{action('Admin\CurrencyController@destroy',[$currency->id])}}" class="btn btn-danger">Delete</a>
                        </div>

                    </div>


                    <div id="mod-currency-{{$currency->id}}" class="hidden-temp">
                        <form action="{{action('Admin\CurrencyController@update',[$currency->id])}}" method="post">
                            {{csrf_field()}}
                            @method('put')
                            <div class="row">
                                <div class="col-md-5">

                                    <input class="form-control" name="name" type="text" value="{{$currency->name}}">

                                </div>
                                <button class="btn btn-success mt-4">{{__('save')}}</button>
                            </div>


                        </form>
                    </div>

                </div>


            @endforeach

        </div>
    </div>
@endsection
