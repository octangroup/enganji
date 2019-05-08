@extends('layouts.app')
@section('content')
    <div class="panel px-0  w-90 mx-auto">
        <div class="flex ">
            <div class="w-25">
                @include('product.components.filter.main')
            </div>
            <div class="w-75 bg-white px-5">

                @foreach($products as $product)
                    @component('product.components.listing.horizontal-card',['product'=>$product])
                    @endcomponent
                @endforeach
            </div>

        </div>

    </div>


@endsection
