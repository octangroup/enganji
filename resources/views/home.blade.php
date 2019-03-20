@extends('layouts.app')
@section('content')

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