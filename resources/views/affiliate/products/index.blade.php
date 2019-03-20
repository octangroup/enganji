@extends('affiliate.layouts.app')
@section('content')
    <div id="product-root" class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{__('Add product')}}
                <button data-toggle="#add-post-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>
            <div id="add-post-form" class="card-body hidden-temp">
                <form action="{{action('Affiliate\ProductsController@store')}}" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div>
                            <label>Sub-category</label>
                            <select class="form-control" name="subcategory_id" required>
                                <option selected disabled>Choose sub-category</option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{$subcategory->id}}">{!! $subcategory->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <div>
                                <label>brand</label>
                                <select class="form-control" name="brand_id">
                                    <option selected disabled>Choose brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Condition</label>
                                <select class="form-control" name="condition_id" required>
                                    <option selected disabled>Choose condition</option>
                                    @foreach($conditions as $condition)
                                        <option value="{{$condition->id}}">{{$condition->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Currency</label>
                                <select class="form-control" name="currency_id" required>
                                    <option selected disabled>Choose currency</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency->id}}">{!! $currency->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Price</label>
                                <input class="form-control" name="price" type="number" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>
                                    Color
                                </label>
                                <input class="form-control" name="color" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Size</label>
                                <input type="text" class="form-control" name="size">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div>
                                <label>Description: </label>
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success mt-2 mr-1">Save</button>
                </form>
            </div><br>

            @foreach($products as $product)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-9">
                            <h4>{{$product->name}}</h4>
                            <p><strong>Quantity: </strong> {{$product->quantity}}</p>
                            <p><strong>Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}</p>
                        </div>


                        <div>
                            <a href="{{action('Affiliate\DealsController@view',[$product->id])}}" class="btn btn-primary">

                                Add deal
                            </a>

                            <button data-toggle="#mod-category-{{$product->id}}" class="btn btn-success toggler">
                                Modify
                            </button>

                            <a class="btn btn-danger"
                               data-toggle="modal" data-target="#delete-Modal-{{$product->id}}">Delete
                            </a>
                        </div>

                    </div>

                    <div class="modal fade" id="delete-Modal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a  href="{{action('Affiliate\ProductsController@destroy',[$product->id])}}" class="btn btn-primary">yes</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="mod-category-{{$product->id}}" class="hidden-temp">
                        <form action="{{action('Affiliate\ProductsController@update',[$product->id])}}" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @method('put')


                            <div class="row">


                                <div class="col-md-5">
                                    <div>

                                        <label>Name</label>

                                        <input type="text" name="name" class="form-control" value="{{$product->name}}">

                                    </div>

                                </div>


                                <div class="col-md-5">
                                    <div>
                                        <label>Quantity</label>

                                        <input type="number" name="quantity" class="form-control"
                                               value="{{$product->quantity}}">


                                    </div>
                                </div>


                            </div>
                            <div class="col-md-5">
                                <div>
                                    <label>Brand</label>
                                    <select class="form-control" name="subcategory_id">
                                        <option value="" disabled selected>Select</option>
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}"
                                                    @if($product->subcategory_id === $subcategory->id) selected @endif>{{$subcategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="row mt-2">


                                <div class="col-md-5">
                                    <div>
                                        <label>Brand</label>
                                        <select class="form-control" name="brand_id">
                                            <option value="" disabled selected>Select</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}"
                                                        @if($product->brand_id === $brand->id) selected @endif>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-5">
                                    <div>
                                        <label>Condition</label>
                                        <select class="form-control" name="condition_id">
                                            @foreach($conditions as $condition)
                                                <option value="{{$condition->id}}">{{$condition->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div>

                                        <label>Currency</label>


                                        <select class="form-control" name="currency_id">
                                            @foreach($currencies as $currency)
                                                <option value="{{$currency->id}}">{!! $currency->name !!}</option>
                                            @endforeach
                                        </select>


                                    </div>

                                </div>


                                <div class="col-md-5">
                                    <div>

                                        <label>Price</label>

                                        <input class="form-control" name="price" type="number"
                                               value="{{$product->price}}">

                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div>
                                        <label>
                                            Color
                                        </label>
                                        <input class="form-control" name="color" type="text"
                                               value="{{$product->color}}">
                                    </div>

                                </div>


                                <div class="col-md-5">
                                    <div>
                                        <label>Size</label>
                                        <input type="text" class="form-control" name="size" value="{{$product->size}}">
                                    </div>
                                </div>
                                {{--<div class="col-md-5">--}}
                                    {{--<label>Pictures</label>--}}
                                    {{--<input class="mt-2 w-100" type="file" name="files[]" multiple>--}}
                                {{--</div>--}}

                            </div>
                            <div class="mt-3">
                                <label>Description: </label>
                                <input type="text" name="description" value="{{$product->description}}">
                                {{--<text-editor field_name="description"--}}
                                             {{--value="{{ old('description') ?? $product->description ?? null }}"></text-editor>--}}
                                {{--@if ($errors->has('description'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                                {{--<strong>{{ $errors->first('description') }}</strong>--}}
                                                {{--</span>--}}
                                {{--@endif--}}
                            </div>


                            <button class="btn btn-success mt-2 mr-1">Save</button>


                            {{--@include('product.form')--}}
                        </form>
                    </div>


                </div>


            @endforeach

        </div>
    </div>





@endsection
