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
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">{{__('Currency')}}</div>
                                </div>
                                <input type="text" name="name" class="form-control">

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success mt-3">Save</button>
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
                            <div class="row mt-2">
                                <div class="col-md-5">

                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" value="{{$currency->name}}">
                                    </div>

                                    <button class="btn btn-success mt-2">Save</button>
                                </div>



                            </div>

                        </form>
                    </div>

                </div>


            @endforeach

        </div>
    </div>
@endsection
