@extends('admin.layouts.app',['has_search'=>true])
@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-info">
                {{Session::get('success')}}
            </div>
        @endif
        {{--<div class="bg-transparent  w-100  ">--}}

        {{--<form name="search_form" method="get"  class="flex my-4">--}}
        {{--<div class="w-50 mx-auto  py-2 ">--}}
        {{--<input name="keyword" type="text" placeholder="Search...."--}}
        {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
        {{--</div>--}}



        {{--</form>--}}
        {{--</div>--}}

        <div class=" w-80 mx-auto  flex">
            <div class="w-80">
                <h4 class=" py-0 font-primary   text-xl">Product</h4>
            </div>

        </div>
        {{--@if(count($products))--}}
        <div class="w-80 mx:w-90 xs:w-100 mx-auto mt-3">


            <div class="w-100">
                @foreach($products as $product)
                    <div
                        class=" xs:mx-0 bg-white border-1 border-solid border-grey-light rounded-xlg w-100 mb-4 p-2 py-5 ">
                        <div class="flex xs:block mx-auto text-center">

                            <div class="w-70 xs:w-100 flex xs:block">
                                <div class="w-35 xs:w-100 ">
                                    <h4 class="text-base  font-primary  font-bold my-3">
                                        {{$product->name}}
                                    </h4>
                                </div>

                                <div class="w-35 md:mx-2 xs:w-100">
                                    <p class="text-base my-3">

                                        <strong class="font-primary">Quantity:</strong> {{$product->quantity}}
                                    </p>


                                </div>
                                <div class="w-45 md:mx-2 xs:w-100">
                                    <p class="text-base my-3"><strong
                                            class="font-primary">Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}
                                    </p>
                                </div>
                            </div>
                            <div class="w-30 xs:w-100 xs:mx-auto  xl:mr-3">
                                {{--<p class="fi flaticon-edit mx-2 text-xl inline-block "></p>--}}
                                {{--<p class="fi flaticon-locked text-green font-bold mx-2 text-xl inline-block"></p>--}}

                                <div class="">
                                    @if($product->isActive())
                                        <a class="btn btn-outline-danger rounded-xlg xs:text-xs px-3 text-sm py-2 font-primary"
                                           href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}"
                                        >
                                            {{__('Disable')}}
                                        </a>


                                    @else
                                        <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}"
                                           class="btn btn-outline-success rounded-xlg xs:text-xs px-3 text-sm py-2 font-primary">

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
