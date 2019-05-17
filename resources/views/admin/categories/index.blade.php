@extends('admin.layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="w-60 mx-auto">
                <form method="GET" action="{{action('Admin\CategoriesController@search')}}">
                    <input type="text" name="keyword" class="form-control">
                    <button type="submit">search</button>
                </form>
            </div>
                {{__('Categories')}}
                <button data-toggle="#add-post-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            <div class="card">
            <div id="add-post-form" class="card-body hidden-temp">
                <form action="{{action('Admin\CategoriesController@store')}}" method="POST" enctype="multipart/form-data" >
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col">
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="col-md-6  mt-3">
                            <label>Category Cover</label>
                            @if(($prct ?? null) && $category->cover())
                                <div class="w-50 my-3">
                                    <img class="w-100" src="{{$category->cover()}}">
                                </div>
                            @endif
                            <input type="file" name="fileToUpload" class="w-100" id="fileToUpload">
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
                    <div class="row">
                        <div class="col-md-9">
                         <strong> {{$category->name}}</strong>
                        </div>
                        <div class="w-30">
                            <img class="w-100" src="{{$category->thumbnail()}}">
                        </div>
                        <div>
                    <button data-toggle="#add-subcat-form{{$category->id}}" class="btn btn-primary toggler" >Sub category</button>
                            <button data-toggle="#modify-form{{$category->id}}" class="btn btn-success toggler" >Modify</button>
                            <a class="btn btn-danger" data-toggle="modal" data-target="#delete-Modal-{{$category->id}}">delete</a>
                        </div>

                        <div class="modal fade" id="delete-Modal-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a  href="{{action('Admin\CategoriesController@destroy',[$category->id])}}" class="btn btn-primary">yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                <div class="col-md-5">
                                    <input class="form-control"  type="text" name="name">
                                    <button class="btn btn-success mt-4"> save</button>
                                </div>
                            </div>
                        </form>
                    </div><br>
                        @foreach($category->subCategory as $subcategory)
                        <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-5">
                                {{$subcategory->name}}
                            </div>
                            <div>
                                <button data-toggle="#modify-subcat-form{{$subcategory->id}}" class="btn btn-success toggler" >Modify</button>
                                <a class="btn btn-danger" data-toggle="modal" data-target="#delete-Modal-{{$subcategory->id}}">delete</a>
                            </div>

                            <div class="modal fade" id="delete-Modal-{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a  href="{{action('Admin\SubCategoriesController@destroy',[$subcategory->id])}}" class="btn btn-primary">yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="modify-subcat-form{{$subcategory->id}}" class="card-body hidden-temp">
                                <form action="{{action('Admin\SubCategoriesController@update',[$subcategory->id,'category_id'=>$category->id])}}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-5">
                                            <input class="form-control" value="{{$subcategory->name}}" type="text" name="name">
                                            <button class="btn btn-success mt-4"> update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                            @endforeach
                    </div>
            </div><br>
                @endforeach

        @endif
    </div>

@endsection
