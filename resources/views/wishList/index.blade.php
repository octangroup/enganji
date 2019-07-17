@extends('layouts.app')
@section('content')


    <div class="panel mx-auto w-90">
        <div class="xl:pt-2 xl:pb-4">
            <h1 class=" text-2xl font-primary">Wishlist</h1>
        </div>
        <div class="w-70 xs:w-100 mx-auto">
            @foreach($wishLists as $wishList)
                @component('product.components.listing.horizontal-card',['product'=>$wishList->product])
                    @slot('right_section')
                        <form action="{{action('CartController@store')}}" method="post">
                            {{csrf_field()}}
                            <input min="1" type="hidden" name="quantity"
                                   value="1" required>
                            <input value="{{$wishList->product->id}}" type="hidden" name="product_id">
                            <div class="w-100  text-right">
                                <button class="btn btn-accent rounded-full">
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    @endslot
                @endcomponent
            @endforeach
        </div>

    </div>


@endsection
