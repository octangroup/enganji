@extends('layouts.app')
@section('content')

    {{$product->name}}<br>
    {{$product->quantity}}<br>
  by{{$product->affiliate->name}}
    <img src="{{asset($product->cover())}}" class="clip-full">
@endsection