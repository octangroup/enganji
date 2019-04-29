@extends('layouts.app')

@section('content')
    {{--<div class="w-100 bg-white-smoke p-2">--}}
        {{--<div class="w-90 mx-auto">--}}
            {{--<h1 class="text-3xl pl-2">SHOPPING CART</h1>--}}
            {{--<div class="w-100 flex">--}}
                {{--@foreach($carts as $cart)--}}
                {{--<div class="w-65 relative mx-2">--}}
                    {{--<div class="w-100 border-ful bg-white p-3">--}}
                        {{--<div class="flex">--}}
                            {{--<div class="w-30 pl-5 pr-3 ">--}}
                                {{--<a href="{{action('ProductsController@show',[$cart->product->id])}}"> <img src="{{asset($cart->product->thumbnail())}}" class="clip-full"></a>--}}
                            {{--</div>--}}
                            {{--<div class="w-70 text-sm">--}}
                                {{--<!--small summary about the product-->--}}
                                {{--<div>--}}
                                    {{--<p class="line-height-small">{{$cart->product->name}}</p>--}}
                                {{--</div>--}}
                                {{--<!--end of summary-->--}}
                                {{--<div class="line-height-small pt-3">--}}
                                    {{--<p>Size: {{$cart->product->size}} </p>--}}
                                    {{--<p>Quantity: <input class="w-10" type="text"> {{$cart->product->quantity}} </p>--}}
                                    {{--<p class="font-bold text-red">Price : {{$cart->product->price}}</p>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="w-35 mx-3 relative ">--}}
                        {{--<div class="w-100 p-3 bg-white border-ful">--}}
                            {{--<div class="p-2">--}}
                                {{--<span class="font-bold">Price Details</span>--}}
                                {{--<p>Item : &emsp;{{$cart->product->count()}}</p>--}}
                                {{--<p>Sub total : </p>--}}
                            {{--</div>--}}
                            {{--<div class="w-95 border-top mx-auto mt-1"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                    {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="panel panel-white-smoke">
        <div class="flex ">
            <div class="w-60">
                <div class="my-3">
                    <h3 class="px-5 text-xl">SHOPPING CART</h3>

                </div>
                @foreach($carts as $cart)
                <div class="flex bg-white rounded  mx-5 m-3 mb-4 p-2 border-1 border-solid border-grey-light">
                    <div class="w-30 mx-auto text-center mx-3 my-2">
                        <img src="{{asset('img/51YXG1bDM5L._AC_UL436_.jpg')}}" class="w-70 ">
                    </div>
                    <div class="w-70 my-3">
                        <h3 class="text-sm my-1">{{$cart->product->name}} </h3>

                        <div class="flex mt-2">
                            <p class="w-10">
                                size :

                            </p>
                            <p class="w-90">
                                {{$cart->product->size}}
                            </p>
                        </div>

                        <div class="flex mt-2">
                            <p class="w-15">
                                Quantity :

                            </p>
                            <p class="w-85">
                                {{$cart->product->quantity}}
                            </p>
                        </div>


                        <div class="flex mt-2">
                            <p class="w-15">
                                price :

                            </p>
                            <p class="w-85 font-bold text-red">
                                {{$cart->product->price}}
                            </p>
                        </div>
                    </div>



                </div>
                    @endforeach
            </div>

            <div class="w-40 mt-4 ">
                <div class="bg-white rounded w-70   m-3 mb-4 p-4 border-1 border-solid border-grey-light">
                    <p class="text-lg font-bold my-2">
                        Price Details

                    </p>
                    <div class="flex my-0">
                        <p class="w-85 text-sm">
                            Items :


                        </p>
                        <p class="w-15">
                            4
                        </p>
                    </div>
                    <div class="flex text-sm my-0">
                        <p class="w-85 ">
                            Sub Total :


                        </p>
                        <p class="w-15">
                            $700

                        </p>
                    </div>
                    <div class="flex text-sm my-0">
                        <p class="w-85">
                            Shipping Charges:

                        </p>
                        <p class="w-15">
                            Free
                        </p>
                    </div>
                    <div class="flex text-sm my-0">
                        <p class="w-85">
                            Discount :


                        </p>
                        <p class="w-15">
                            0%

                        </p>
                    </div>
                    <div class="border border-solid border-black"></div>
                    <div class="flex text-sm my-2">
                        <p class="w-85">
                            Total :


                        </p>
                        <p class="w-15 text-red font-bold ">
                            $700

                        </p>
                    </div>
                    <div class="rounded bg-primary shadow  text-white px-3 py-2 w-40 text-sm cursor-pointer">Checkout  Here</div>

                </div>

            </div>

        </div>

    </div>

@endsection
