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
                    @endforeach
            @endif
            </div>
                </div>

@endsection