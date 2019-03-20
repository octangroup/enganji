@extends('affiliate.layouts.app')
@section('content')
    <div class="container">
                <h4><a href="{{action('Affiliate\ProductsController@create')}}" class="btn btn-primary mx-3"><i
                                class="fas fa-plus-circle"></i> Add</a></h4>
            <div class="w-60 mx-auto">
                <form method="GET" action="{{action('Affiliate\ProductsController@search')}}">
                    <input type="text" name="keyword" class="form-control">
                        <button type="submit">search</button>
                </form>
            </div>
        <div class="card-body">
                        <form method="GET" action="{{action('Affiliate\ProductsController@filter')}}">
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
        </br>
            <div class="container">
                @if($products && count($products))
                    @foreach($products as $product)
                        <div class="py-4 px-2 bg-white border-1 border-solid border-grey-light rounded-lg">
                            <div class="flex">
                                <div class="w-30">
                                        <img class="w-100" src="{{$product->thumbnail()}}">
                                </div>
                                <div class="w-50 pl-3">
                                    <h3>{!! $product->name !!}</h3>
                                    <p class="my-2"><strong>Quantity: </strong>{{$product->quantity}}</p>
                                    <p class="my-2"><strong>Price: </strong>{{$product->price}}</p>
                                </div>
                                <h4><a href="{{action('Affiliate\ProductsController@edit', [$product->id])}}" class="btn btn-primary mx-3"><i
                                                class="fas fa-plus-circle"></i> Update</a></h4>
                                <h4><a href="{{action('Affiliate\ProductsController@destroy', [$product->id])}}" class="btn btn-primary mx-3"><i
                                                class="fas fa-plus-circle"></i> Delete</a></h4>
                        </div>
                        </div>
                    @endforeach
            @endif

                </div>
        </div>
    </div>
@endsection