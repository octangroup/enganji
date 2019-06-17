@extends('layouts.app)
@section('content')
    @foreach($categories->subCategory->products as $product)

        {{$product->name}}

    @endforeach
@endsection