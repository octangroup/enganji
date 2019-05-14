@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
        @endif
        <div>
            <h4 class=" font-primary inline-block  text-3xl">Product</h4>
            <button
                class="rounded-r-xxl rounded-l-xxl hover:bg-black text-base bg-black-darker text-white py-3 px-3 border-0 mx-3 shadow inline-block">
                ADD PRODUCT
            </button>
        </div>
        {{--@if(count($products))--}}
        <div class="flex w-80 mx-auto">
            {{--            <div class="w-25">--}}
            {{--                <div class="bg-white-smoke mb-4 px-4 font-primary text-black shadow rounded-xl">--}}
            {{--                </div>--}}
            {{--            </div>--}}


            <div class="w-100">
                @foreach($products as $product)
                    <div class="mx-4 bg-white border-1 border-solid border-grey-light rounded w-100 mb-4 p-2 py-3 ">
                        <div class="flex">

                            <div class="flex-65 flex">
                                <div class="w-40 px-4">
                                    <p class="text-base font-primary  font-bold">
                                        {{$product->name}}
                                    </p>
                                </div>

                                <div class="w-35">
                                    <div class="font-primary ">
                                        <p class="text-base">

                                            Quantity:{{$product->quantity}}
                                        </p>
                                    </div>

                                </div>
                                <div class="w-45">
                                    <p><strong>Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}
                                    </p>
                                </div>
                            </div>
                            <div class="flex-35 text-right mr-3">
                                {{--<p class="fi flaticon-edit mx-2 text-xl inline-block "></p>--}}
                                {{--<p class="fi flaticon-locked text-green font-bold mx-2 text-xl inline-block"></p>--}}

                                <div>
                                    @if($product->isActive())
                                        <a class="btn btn-primary"
                                           href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}"
                                        >
                                            {{__('Disable')}}
                                        </a>


                                    @else
                                        <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}"
                                           class="btn btn-primary">

                                            {{__('Activate')}}
                                        </a>

                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
