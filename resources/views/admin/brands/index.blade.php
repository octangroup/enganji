@extends('admin.layouts.app')
@section('content')

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
            @endif
        <div class="card">
            <div class="card-header">
                {{__(' Brand')}}
                <button data-toggle="#add-brand-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>


            <div id="add-brand-form" class="card-body hidden-temp">
                <form action="{{action('Admin\BrandController@store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-5">

                            <label>Name</label>
                            <input class="form-control" name="name" type="text">

                        </div>
                        <button class="btn btn-success mt-4">{{__('save')}}</button>
                    </div>
                </form>
            </div><br>


            @foreach($brands as $brand)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-9">
                            {!! $brand->name !!}
                        </div>

                        <div>
                            <button data-toggle="#modify-form-{{$brand->id}}" class="btn btn-success toggler">Modify
                            </button>
                            <a href="{{action('Admin\BrandController@destroy',[$brand->id])}}" class="btn btn-danger">delete</a>

                        </div>

                        <div id="modify-form-{{$brand->id}}" class="card-body hidden-temp">
                            <form action="{{action('Admin\BrandController@update',[$brand->id])}}" method="post">


                                {{csrf_field()}}
                                @method('put')

                                <div class="row">
                                    <div class="col-md-5">

                                        <input class="form-control" name="name" type="text" value="{{$brand->name}}">

                                    </div>
                                    <button class="btn btn-success mt-4">{{__('save')}}</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>


            @endforeach

        </div>

    </div>
@endsection
