@extends('layouts.app')
@section('content')

    {{$product->name}}<br>
    {{$product->quantity}}<br>
  by{{$product->affiliate->name}}
    <img src="{{asset($product->cover())}}" class="clip-full"><br>
    <form action="{{action('ProductsController@addToWishList',[$product->id])}}" method="post">
        {{csrf_field()}}
        <button class="btn btn-dark-grey">Add to wish list</button>
    </form>
    {{--<a href="{{action('ProductsController@addToWishList',[$product->id])}}" class="btn btn-dark-grey">Add to wish list</a>--}}
@endsection