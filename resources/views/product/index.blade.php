@extends('layouts.app')
@section('content')

    <div class="w-60 mx-auto">
    <form method="GET" action="{{action('ProductsController@search')}}">
    <input type="text" name="keyword" class="form-control">
    <button type="submit">search</button>
    </form>
    </div>

    <div class="card-body">
    <form method="GET" action="{{action('ProductsController@search')}}">
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

    <div class="pt-3 px-2">Sort By:</div>
    <div>
        <ul class="has-inline-block border-1 rounded-full border-solid border-grey p-3 w-fit">

            <li class="mx-2 pr-3 border-solid border-0 border-r-1 border-grey">
                <a
                        @if($category ?? null)
                        href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'newest', http_build_query($attributes->only( 'min', 'max', 'brands','conditions'))])}}"
                        @else
                        href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'newest', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"
                        @endif
                >Newest</a>
            </li>

            <li class="mx-2 pr-3 border-solid border-0 border-r-1 border-grey">
                <a
                        @if($category ?? null)
                        href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-asc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"
                        @else
                        href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-asc', http_build_query($attributes->only('ratings', 'min', 'max', 'brands'))])}}"
                        @endif >Price:
                    Low to High</a>
            </li>
            <li class="mx-2">
                <a
                        @if($category ?? null)
                        href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"
                        @else
                        href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"
                        @endif >Price:
                    High to Low</a>
            </li>
        </ul>
    </div>
    <div class="container">
        @if($products && count($products))
            @foreach($products as $product)
                <div class="py-4 px-2 bg-white border-1 border-solid border-grey-light rounded-lg">
                    <div class="flex">
                        <div class="w-30">
                            <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                                <img class="w-100" src="{{$product->thumbnail()}}">
                            </a>
                        </div>
                        <div class="w-50 pl-3">
                            <h3>{!! $product->name !!}</h3>
                            <p class="my-2"><strong>Price: </strong>{{$product->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
@endsection
