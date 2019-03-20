@extends('layouts.app')
@section('content')

    <div class="w-60 mx-auto">
        <form method="GET" action="{{action('ProductsController@search')}}">
            <input type="text" name="keyword" class="form-control">
            <button type="submit">search</button>
        </form>
    </div>

    <div class="card-body">
        <form method="GET" action="{{action('ProductsController@filter')}}">
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

            <div class="text-center">
                <button type="submit" class="btn btn-outline-primary">Filter</button>
            </div>
        </form>
    </div>
    @foreach($products as $product)
        <div class="card-default">

                <a href="{{action('ProductsController@show',[$product->id])}}">{{$product->name}}</a><br>
                {{$product->thumbnail()}}<br>
                {{$product->price}}
        </div><br>
    @endforeach
@endsection
