@extends('admin.layouts.app',['has_search'=>true,'search_url'=> action('Admin\CategoriesController@search')])

@section('content')
    <div class="w-95 mx-auto">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="w-90 mx-auto  flex">
            <div class="w-80">
                <h4 class=" font-primary text-2xl">{{__('Categories')}}</h4>
            </div>
            <div class="w-20 mt-3 mx-0 text-right">
                <button data-toggle="#add-post-form"
                        class="btn  btn-primary text-sm rounded-xlg border-0  toggler ">{{__('Add Category')}}</button>
            </div>

        </div>
        <div id="add-post-form"
             class="card w-80 md:w-100 mx-auto hidden-temp rounded-xlg py-5 border-1 border-solid border-grey-light">
            <form action="{{action('Admin\CategoriesController@store')}}" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="flex w-90 mx-auto">
                    <div class="w-70 px-2">
                        <label class="text-xs">Category Cover</label>
                        <input class="form-input" type="text" name="name">
                    </div>
                    <div class="w-40 px-2">
                        <label class="text-xs">Category Cover</label>
                        <input type="file" name="fileToUpload" class="w-100" id="fileToUpload">
                    </div>
                </div>
                <div class="w-90 mx-auto px-2">
                    <label></label>
                    <button class="btn btn-success mt-4 rounded"> save</button>
                </div>
            </form>
        </div>
        @if(count($categories))
            @foreach($categories as $category)
                <div class=" border-1 border-solid border-grey-light rounded-lg p-4 mt-3">
                    <div class="flex p-2 xs:block">
                        {{--                        <div class="w-20">--}}
                        {{--                            <img class="w-100" src="{{$category->thumbnail()}}">--}}
                        {{--                        </div>--}}
                        <div class="w-60 md:w-50 xs:w-100">
                            <strong> {{$category->name}}</strong>
                        </div>
                        <div class=" w-40 md:w-50 xs:w-100 md:flex xl:text-right">
                            <button data-toggle="#add-subcat-form{{$category->id}}"
                                    class="btn btn-primary toggler xs:my-2 rounded md:mx-1 ">Sub
                                category
                            </button>
                            <button data-toggle="#modify-form{{$category->id}}" class="btn btn-success toggler md:mx-1  rounded">
                                Modify
                            </button>
                            <a class="btn btn-danger rounded md:mx-1" data-toggle="modal"
                               data-target="#delete-Modal-{{$category->id}}">delete</a>
                        </div>

                        <div class="modal fade" id="delete-Modal-{{$category->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <a href="{{action('Admin\CategoriesController@destroy',[$category->id])}}"
                                           class="btn btn-primary">yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modify-form{{$category->id}}" class="card-body hidden-temp">
                        <form action="{{action('Admin\CategoriesController@update',[$category->id])}}" method="POST">
                            @method('patch')
                            @csrf
                            <div class="w-100 md:mt-3 flex">
                                <div class="w-60">
                                    <input class="form-input rounded-r-none h-12 rounded-l-lg" value="{{$category->name}}" type="text"
                                           name="name">

                                </div>
                                <div class="w-40 ">
                                    <button type="submit" class="btn btn-success my-0 py-2 h-12 rounded-r-lg"> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="add-subcat-form{{$category->id}}" class="hidden-temp border-1 border-solid border-grey-light rounded-lg my-3 p-4">
                        <form action="{{action('Admin\SubCategoriesController@store',[$category->id])}}" method="POST">
                            {{ csrf_field() }}
                            <p class="mt-0">Add Subcategories</p>
                            <div class="w-100 flex xs:mt-3">
                                <div class="w-60">
                                    <input class="form-input rounded-r-none h-12 rounded-l-lg" type="text" placeholder="Subcategory Name"
                                           name="name">

                                </div>
                                <div class="w-40">
                                    <button type="submit" class="btn btn-success my-0 py-2 h-12 rounded-r-lg"> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @foreach($category->subCategory as $subcategory)
                        <div class="border-1 border-solid border-grey-light py-3 px-4 my-3 rounded-lg">
                            <div class="flex xs:block">
                                <div class="w-60">
                                    {{$subcategory->name}}
                                </div>
                                <div class="w-40 xs:flex xs:mt-3 text-right">
                                    <button data-toggle="#modify-subcat-form{{$subcategory->id}}"
                                            class="btn btn-success rounded toggler">Modify
                                    </button>
                                    <a class="btn btn-danger rounded xs:mx-2" data-toggle="modal"
                                       data-target="#delete-Modal-{{$subcategory->id}}">delete</a>
                                </div>
                            </div>

                            <div class="modal fade" id="delete-Modal-{{$subcategory->id}}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <a href="{{action('Admin\SubCategoriesController@destroy',[$subcategory->id])}}"
                                               class="btn btn-primary">yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="modify-subcat-form{{$subcategory->id}}" class="card-body hidden-temp">
                                <form
                                    action="{{action('Admin\SubCategoriesController@update',[$subcategory->id,'category_id'=>$category->id])}}"
                                    method="POST">
                                    {{ csrf_field() }}

                                    <div class="w-100 xs:mt-3 flex">
                                        <div class="w-60">
                                            <input class="form-input rounded-r-none h-12 rounded-l-lg" value="{{$subcategory->name}}" type="text"
                                                   name="name">

                                        </div>
                                        <div class="w-40">
                                            <button class="btn btn-success my-0 py-2 h-12 rounded-r-lg"> Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

        @endif
    </div>

@endsection
