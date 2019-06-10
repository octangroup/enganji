@extends('layouts.app')

@section('content')

    <div class="panel mx-auto w-90">
        <div class="pt-2 pb-4">
            <h1 class=" text-2xl font-primary">Shopping Cart</h1>
        </div>
        <div class="flex xs:block md:block sm:block">
            <div class="w-70 xs:w-100 xl:pr-4 hidden xl:block ">
                @foreach($carts as $cart)
                    @component('product.components.listing.horizontal-card',['product'=>$cart->product])
                        <p class="text-sm">Quantity: <span class="font-medium">
                            {{$cart->quantity}}
                        </span></p>
                    @endcomponent
                @endforeach
            </div>

            <div class="w-30 xs:w-100 md:w-100 sm:w-100 xl:pl-3">
                @if($carts && count($carts))
                    <div class="bg-white-smoke rounded-xlg w-100 mb-4 p-4 ">
                        <h5 class="text-lg font-bold my-2 font-primary">
                            Price Details

                        </h5>
                        <div class="flex my-0">
                            <p class="w-85 text-sm">
                                Items :


                            </p>
                            <p class="w-15 text-right">
                                {{$cart->product->quantity}}
                            </p>
                        </div>
                        <div class="flex text-sm my-0">
                            <p class="w-85 ">
                                Sub Total :


                            </p>
                            <p class="w-15 text-right">
                                {{$cart->product->price}}

                            </p>
                        </div>
                        <div class="border-0 border-b-1 border-solid border-black"></div>
                        <div class="flex text-sm my-2">
                            <p class="w-85">
                                Total :


                            </p>
                            <p class="w-15 text-accent font-bold text-right">
                                {{$cart->product->price}}

                            </p>
                        </div>

                    </div>
                @endif
            </div>
            <div class="w-70 xs:w-100 md:w-100 sm:w-100 xl:pr-4 xl:hidden">
                @foreach($carts as $cart)
                    @component('product.components.listing.horizontal-card',['product'=>$cart->product])
                        <p class="text-sm">Quantity: <span class="font-medium">
                            {{$cart->quantity}}
                        </span></p>
                    @endcomponent
                @endforeach
            </div>
        </div>

    </div>

@endsection
