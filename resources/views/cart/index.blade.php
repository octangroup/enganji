@extends('layouts.app')

@section('content')
    <div class="w-100 bg-white-smoke p-2">
        <div class="w-90 mx-auto">
            <h1 class="text-3xl pl-2">SHOPPING CART</h1>
            <div class="w-100 flex">
                @foreach($carts as $cart)
                <div class="w-65 relative mx-2">
                    <div class="w-100 border-ful bg-white p-3">
                        <div class="flex">
                            <div class="w-30 pl-5 pr-3 ">
                                <a href="{{action('ProductsController@show',[$cart->product->id])}}"> <img src="{{asset($cart->product->thumbnail())}}" class="clip-full"></a>
                            </div>
                            <div class="w-70 text-sm">
                                <!--small summary about the product-->
                                <div>
                                    <p class="line-height-small">{{$cart->product->name}}</p>
                                </div>
                                <!--end of summary-->
                                <div class="line-height-small pt-3">
                                    <p>Size: {{$cart->product->size}} </p>
                                    <p>Quantity: <input class="w-10" type="text"> {{$cart->product->quantity}} </p>
                                    <p class="font-bold text-red">Price : {{$cart->product->price}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="w-35 mx-3 relative ">
                        <div class="w-100 p-3 bg-white border-ful">
                            <div class="p-2">
                                <span class="font-bold">Price Details</span>
                                <p>Item : &emsp;{{$cart->product->count()}}</p>
                                <p>Sub total : </p>
                            </div>
                            <div class="w-95 border-top mx-auto mt-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   --}}
@endsection
