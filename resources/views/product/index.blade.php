@extends('layouts.app')
@section('content')
    <div class="panel px-0  w-90 mx-auto">
        @if($keyword ??  null)
            <div class="py-4">
                <h2 class="my-0 ml-3 font-primary text-2xl">Search: {{$keyword ?? null}}</h2>
            </div>

        @endif
        <div class="flex xs:block">
            <div class="w-25 xs:w-100">
                @include('product.components.filter.main')
            </div>
            <div class="w-75 xs:w-100 xs:mt-3 bg-white xl:px-5">
                @if($products ?? null)
                    @foreach($products as $product)
                        @component('product.components.listing.horizontal-card',['product'=>$product])
                        @endcomponent
                    @endforeach
                @endif
            </div>

        </div>

    </div>


@endsection
