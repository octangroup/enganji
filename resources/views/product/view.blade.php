@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="w-25">
                <img width="50%" src="{{$product->cover()}}" class="clip-full">
            </div>
            <div class="w-65 text-left px-4">
                <h3>{!! $product->name !!}</h3>
                <p class="my-2"><strong>Price: </strong>{{$product->price}}</p>
            </div>

        </div>
        <div class="w-90 mx-auto mt-5">
            {!! $product->description !!}
        </div>
    </div>
@endsection