@extends('layouts.app')
@section('content')

    @foreach($category->subCategory->products as $product)

        {{$product->name}}

    @endforeach

@endsection