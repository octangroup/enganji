@extends('layouts.app')
@section('content')


    <div class="panel mx-auto w-90">
        <div class="pt-2 pb-4">
            <h1 class=" text-2xl font-primary">Wishlist</h1>
        </div>
        <div class="w-70 mx-auto">
            @foreach($wishLists as $wishList)
                @component('product.components.listing.horizontal-card',['product'=>$wishList->product])
                    @slot('right_section')
                        <form action="{{action('CartController@store')}}" method="post">
                            {{csrf_field()}}
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
