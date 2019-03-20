@extends('layouts.app')
@section('content')
    @foreach($products as $product)
    <a href="{{action('ProductsController@show',[$product->id])}}">{{$product->name}}</a><br>
        {{$product->thumbnail()}}
    @endforeach
@endsection