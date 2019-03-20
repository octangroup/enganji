@extends('admin.layouts.app')

@section('content')
    <div class="container">
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
                    <div class="row">
                        <div class="col-md-9">
                         <strong> {{$category->name}}</strong>
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
