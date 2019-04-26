@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

            <div class="w-60 mx-auto">
                <form method="GET" action="{{action('Admin\ProductsController@search')}}">
                    <input type="text" name="keyword" class="form-control">
                    <button type="submit">search</button>
                </form>
            </div>

            <div class="card-body">
                <form method="GET" action="{{action('Admin\ProductsController@filter')}}">
                    <div class="my-2">
                        <h4>Categories</h4>
                        @foreach ($categories as $category)
                            <p>
                                <input type="checkbox" name="categories[]"
                                       value="{{$category->id}}"> {{$category->name}}
                            </p>
                        @endforeach
                    </div>
                    <div class="my-2">
                        <h4>Conditions</h4>
                        @foreach ($conditions as $condition)
                            <p>
                                <input type="checkbox" name="conditions[]" value="{{$condition->id}}"> {{$condition->name}}
                            </p>
                        @endforeach
                    </div>
                    <div class="my-2">
                        <h4>Brands</h4>
                        @foreach ($brands as $brand)
                            <p>
                                <input type="checkbox" name="brands[]" value="{{$brand->id}}"> {{$brand->name}}
                            </p>
                        @endforeach
                    </div>
                    <div>
                        @if($products && count($products))
                            <h4>Price</h4>
                            @foreach ($products as $product)
                                <p>
                                    <input type="checkbox" name="price[]"
                                           value="{{$product->price}}">
                                </p>
                            @endforeach
                        @endif
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-primary">Filter</button>
                    </div>
                </form>
            </div>

        {{--@if(count($products))--}}
                @foreach($products as $product)
                    <div class="list-group-item">
                        <div class="row">

                            <div class="col-md-10">
                                <h4>{{$product->name}}</h4>
                                <p><strong>Quantity: </strong> {{$product->quantity}}</p>
                                <p><strong>Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}</p>
                            </div>

                            <div>
                                @if($product->isActive())
                                    <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" class="btn btn-danger">
                                        {{__('Deactivate')}}   </a>

                                @else
                                    <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" class="btn btn-primary">

                                        {{__('Activate')}}
                                    </a>

                                @endif


                            </div>



                        </div>
                    </div>
                @endforeach
    </div>
    @endsection
