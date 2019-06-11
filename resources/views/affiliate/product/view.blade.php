@extends('affiliate.layouts.app')
@section('content')

    <div class="panel-body">
        <div class="is flex ">
            <div class="w-40  mx-auto h-100 z-10">
                <img src="{{$product->cover()}}" class="transition-500ms w-100">
            </div>
            <div class="w-50  mt-4">
                <div class="w-65 text-left px-4  mb-3">
                    <h1 class="text-3xl sm:text-2xl xs:text-2xl my-0 font-normal m-0 font-primary">{!! $product->name !!}</h1>
                    <p class="text-black text-base xs:text-base m-0 text-muted">Price:{{$product->price}}</p>
                </div>
                <div class="w-  mt-1">
                    {!! $product->description !!}
                </div>
            </div>
        </div>
    </div>
@endsection
