@extends('affiliate.layouts.app')
@section('content')
    <div class="container mx-3">
        <div class=" w-80 xs:w-100 mx-auto ">
            <h4 class=" font-primary inline-block  text-xl">Product</h4>
            <a href="{{action('Affiliate\ProductsController@create')}}" class="btn btn-primary text-sm text-white  rounded-full mx-2 border-0   inline-block">ADD PRODUCT</a>


        </div>

        <div >
            <i data-toggle="#filter" class="fi flaticon-menu-4 hidden xs:block text-2xl  toggler text-black"></i>
        </div>
        <div  class="flex xs:block ">
            <div id="filter" class="w-20 xs:w-90 xs:hidden-temp ">
                <div class=" mt-3 bg-white mb-4 px-4 font-primary text-black border-1 border-solid border-grey-light rounded-xl">

                        <form method="GET" action="{{action('Affiliate\ProductsController@filter')}}">
                            <div class="my-2">
                                <h4>Categories</h4>
                                @foreach ($categories as $category)
                                    <p>
                                        <input type="checkbox" name="categories[]"
                                               value="{{$category->id}}"> {{$category->name}}
                                    </p>
                                @endforeach
                            </div>
                            <div class="my-2">
                                <h4>Conditions</h4>
                                @foreach ($conditions as $condition)
                                    <p>
                                        <input type="checkbox" name="conditions[]" value="{{$condition->id}}"> {{$condition->name}}
                                    </p>
                                @endforeach
                            </div>
                            <div class="my-2">
                                <h4>Brands</h4>
                                @foreach ($brands as $brand)
                                    <p>
                                        <input type="checkbox" name="brands[]" value="{{$brand->id}}"> {{$brand->name}}
                                    </p>
                                @endforeach
                            </div>
                            <div>
                                @if($products && count($products))
                                    <h4>Price</h4>
                                    @foreach ($products as $product)
                                        <p>
                                            <input type="checkbox" name="price[]"
                                                   value="{{$product->price}}">
                                        </p>
                                    @endforeach
                                @endif
                            </div>
                            <div class="w-50 mx-auto">
                                <button type="submit" class="btn btn-outline-primary text-center rounded my-3">Filter</button>
                            </div>
                        </form>
                </div>
            </div>

            <div class=" w-80 xs:w-90 my-4">
                @if($products && count($products))
                    @foreach($products as $product)

                        <div class=" mx-4 xs:mx-0 bg-white border-1 border-solid border-grey-light rounded  mb-4 p-2 py-3">
                            <div class="xl:flex ">

                            <div class="w-20 xs:w-80 mx-auto  text-center">
                                    <a href="{{action('Affiliate\ProductsController@show',[$product->id])}}"> <img
                                                src="{{$product->thumbnail()}}" class="w-80  mx-auto text-center"></a>
                                </div>
                                <div class="w-50 xs:w-100 xs:mx-4 xl:text-center  mt-4 ">
                                    <h5 class="font-primary my-2 mx-2 text-xl font-bold">{!! $product->name !!}</h5>
                                    <p class="my-2  font-primary mx-2 "><strong>Quantity: </strong>{{$product->quantity}}</p>
                                    <p class="my-2 font-primary mx-2 "><strong>Price: </strong>{{$product->price}}</p>
                                </div>
                                <div class="flex">
                                    <div class="w-50">
                                        <h4><a href="{{action('Affiliate\ProductsController@edit', [$product->id])}}" class="btn btn-primary bg-white text-black hover:text-red hover:bg-primary rounded mx-3"><i
                                                        class="fas fa-plus-circle"></i> Update</a></h4>
                                    </div>
                                    <div class="w-50">
                                        <h4><a href="{{action('Affiliate\ProductsController@destroy', [$product->id])}}" class="btn btn-primary bg-white text-black hover:text-white hover:bg-primary rounded mx-3"><i
                                                        class="fas fa-plus-circle"></i> Delete</a></h4>
                                    </div>

                                </div>
                        </div>
                        </div>

                    @endforeach
            @endif
            </div>

                </div>
        </div>
        </div>
    </div>
@endsection