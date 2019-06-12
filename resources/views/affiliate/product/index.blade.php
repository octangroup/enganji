@extends('affiliate.layouts.app')
@section('content')
    <div class="w-95 mx-auto">
        <div class=" w-100 mx-auto  flex">
            <div class="w-80">
                <h2 class="py-0 font-primary text-2xl font-bold">Product</h2>
            </div>
            <div class="w-20 my-3 mx-0  text-right">
                <a href="{{action('Affiliate\ProductsController@create')}}"
                   class="btn btn-primary text-sm text-white  rounded-xlg mx-2 border-0   inline-block">ADD PRODUCT</a>
            </div>

        </div>


        <div>
            <i data-toggle="#filter" class="fi flaticon-menu-4 hidden xs:block text-2xl  toggler text-black"></i>
        </div>
        <div class="flex xs:block ">
            <div id="filter" class="w-20 xs:w-90 xs:hidden-temp ">
                <div
                    class=" mt-3 bg-white mb-4 px-4 font-primary text-black border-1 border-solid border-grey-light rounded-xlg">
                    <form method="GET" action="{{action('Affiliate\ProductsController@filter')}}">
                        <div class="my-2">
                            <h5>Categories</h5>
                            @foreach ($categories as $category)
                                <p>
                                    <input type="checkbox" name="categories[]"
                                           value="{{$category->id}}"> {{$category->name}}
                                </p>
                            @endforeach
                        </div>
                        <div class="my-2">
                            <h5>Conditions</h5>
                            @foreach ($conditions as $condition)
                                <p>
                                    <input type="checkbox" name="conditions[]"
                                           value="{{$condition->id}}"> {{$condition->name}}
                                </p>
                            @endforeach
                        </div>
                        <div class="my-2">
                            <h5>Brands</h5>
                            @foreach ($brands as $brand)
                                <p>
                                    <input type="checkbox" name="brands[]" value="{{$brand->id}}"> {{$brand->name}}
                                </p>
                            @endforeach
                        </div>
                        <div class="w-50 mx-auto">
                            <button type="submit" class="btn btn-outline-primary text-center rounded-xlg my-3">Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class=" w-80 xs:w-90 my-4">
                @if($products && count($products))
                    @foreach($products as $product)

                        <div
                            class=" mx-4 xs:mx-0 bg-white border-1 border-solid border-grey-light rounded-xlg  mb-4 p-2 py-3">
                            <div class="xl:flex p-3">
                                <div class="w-20 xs:w-80 mx-auto  text-center">
                                    <a href="{{action('Affiliate\ProductsController@show',[$product->id])}}"> <img
                                            src="{{$product->thumbnail()}}" class="w-100  mx-auto text-center"></a>
                                </div>
                                <div class="w-50 xs:w-100 px-4">
                                    <a class="inherit-color no-underline" href="{{action('Affiliate\ProductsController@show',[$product->id])}}">
                                        <h5 class="font-primary mb-2 mt-0 mx-2 text-xl font-bold">{!! $product->name !!}</h5>
                                    </a>
                                    @if(!$product->isService())
                                        <p class="my-2  font-primary mx-2 ">
                                            <strong>Quantity: </strong>{{$product->quantity}}</p>
                                        <p class="my-2 font-primary mx-2 "><strong>Price: </strong>{{$product->price}}
                                        </p>
                                    @endif
                                </div>
                                <div class="w-30 text-right pt-1">
                                    <a href="{{action('Affiliate\ProductsController@edit', [$product->id])}}"
                                       class="btn border-green text-green bg-white text-black hover:text-red hover:bg-green rounded-xlg mr-2"><i
                                            class="fas fa-plus-circle"></i> Update</a>
                                    <a href="{{action('Affiliate\ProductsController@destroy', [$product->id])}}"
                                       class="btn btn-outline-danger bg-white text-red hover:text-white hover:bg-red rounded-xlg ml-2"><i
                                            class="fas fa-minus-circle"></i> Delete</a>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>

        </div>
    </div>

@endsection
