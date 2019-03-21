@extends('layouts.app')

@section('content')

    @foreach($carts as $cart)

        <div class="panel-body p-0">

            <div class=" w-65 h-48 bg-white mb-3 shadow is-centered p-0">
                <div class="is-flex">
                    <div class="w-30 h-48">

                        <img src="" class="clip-full">
                    </div>
                    <div class="w-50 h-48 p-3">
                        <h2 class="text-xl m-0">{{$cart->product->name}}</h2>
                        <p class="text-xl m-0 pt-2">{{$cart->product->condition->name}}</p>
                        <div class="is-flex">
                            <div class="w-50">

                                {{--<span class="text-grey-darkest text-base">Quantity:</span>--}}

                                {{--<input min="1" type="number" name="quantity"--}}
                                       {{--class="p-2 w-25 border-1 border-grey border-solid outline-none rounded has-text-centered"--}}
                                       {{--value="1" required>--}}

                                <input value="" type="hidden" name="product_id">

                            </div>
                            <p class="text-xl m-0 pt-2 w-50 my-auto">
                       <span
                               class="has-text-black text-xl">Price: </span> {{$cart->product->price}}
                            </p>
                        </div>
                    </div>
                    <div class="w-20  h-48 p-3 has-text-right">
                        <p class="text-sm text-red-light m-0 ">
                            {{--<a href="{{action('CartController@destroy',[$cart->id])}}">--}}
                                {{--<i class="far fa-trash-alt"></i>--}}
                                {{--Remove--}}
                            {{--</a></p>--}}

                    </div>

                </div>
            </div>



        </div>


    @endforeach
@endsection
