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
                {{__('Categories')}}
                <button data-toggle="#add-post-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>

            <div id="add-post-form" class="card-body hidden-temp">
                <form action="{{action('Admin\CategoriesController@store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col">
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="col">
                            <label></label>
                            <button class="btn btn-success mt-4"> save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><br>
        @if(count($categories))
            @foreach($categories as $category)
                <div class="list-group-item">
                    <h6>{{$category->name}}<span style="float: right"> <button data-toggle="#add-subcat-form{{$category->id}}" class="btn btn-primary toggler" >Sub category</button>
                            <button data-toggle="#modify-form{{$category->id}}" class="btn btn-success toggler" >Modify</button>
                            <a class="btn btn-danger" href="{{action('Admin\CategoriesController@destroy',$category->id)}}">delete</a>
                        </span></h6>

                    <div id="modify-form{{$category->id}}" class="card-body hidden-temp">
                        <form action="{{action('Admin\CategoriesController@update',[$category->id])}}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col">
                                    <input class="form-control" value="{{$category->name}}" type="text" name="name">
                                </div>
                                <div class="col">
                                    <label></label>
                                    <button class="btn btn-success mt-4"> save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="add-subcat-form{{$category->id}}" class="card-body hidden-temp">
                        <form action="{{action('Admin\SubCategoriesController@store',[$category->id])}}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col">
                                    <input class="form-control"  type="text" name="name">
                                </div>
                                <div class="col">
                                    <label></label>
                                    <button class="btn btn-success mt-4"> save</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
                @endforeach

        @endif
    </div>

@endsection
