@extends('admin.layouts.app')
@section('content')
    <div class="container">
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
                            <button data-toggle="modal" data-target="#delete-Modal-{{$currency->id}}" class="btn btn-danger">Delete</button>
                        </div>

                    </div>

                    <div class="modal fade" id="delete-Modal-{{$currency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{action('Admin\CurrencyController@destroy',[$currency->id])}}" class="btn btn-primary">yes</a>
                                </div>
                            </div>
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
