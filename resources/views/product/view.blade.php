@extends('layouts.app')
@section('content')
    <chat @guest :is_guest="true" @endif
    :product="{{$product}}"
    >
    </chat>
    <div class="panel panel-default">
        <div class="panel-body w-90 mx-auto">
            <div class="flex">
                <div class="w-50">
                    <div class="flex">
                        <div class="w-40 p-3 border border-solid border-grey-light rounded-tl-xxl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">

                        </div>
                        <div
                            class="w-40 p-3  border border-solid mx-2  border-grey-light rounded-tr-xxl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">
                        </div>

                    </div>
                    <div class="flex mt-2">
                        <div class="w-40 p-3 border border-solid border-grey-light rounded-bl-xxl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">
                        </div>
                        <div class="w-40 p-3 border border-solid mx-2 border-grey-light rounded-br-xxl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">
                        </div>

                    </div>

                </div>
                <div class="w-50">
                    <div>
                        <h1 class="text-4xl  my-0 font-medium m-0 font-primary">{!! $product->name !!}</h1>
                    </div>
                    <div class="mt-3">
                        <div class="mr-3 pt-1 text-accent inline-block">
                            <i class="fi flaticon-star-4"></i>
                            <i class="fi flaticon-star-4"></i>
                            <i class="fi flaticon-star-4"></i>
                            <i class="fi flaticon-star"></i>
                            <i class="fi flaticon-star"></i>
                        </div>
                        <p class="text-black mx-2 text-xs  mt-2 inline-block">28 reviews</p>
                    </div>

                    <div class="w-100">
                        <p class="my-1"><span class="mr-3">Price:</span> <span
                                class="text-accent text-3xl font-primary font-medium">
                                {{$product->currency->name}} {{$product->price}}
                            </span></p>
                    </div>
                    <div class="w-100 mx-1  text-base ">

                        <form action="{{action('CartController@store')}}" method="post" class="w-50">
                            {{csrf_field()}}

                            <div class="flex my-3">
                                <div class="pr-3 flex align-items-center justify-content-center">
                                    <p class="m-0">Quantity:</p>
                                </div>
                                <div class="w-20  py-0 m-0">
                                    <input min="1" type="number" name="quantity"
                                           class="border-1 py-2 border-grey border-solid outline-none rounded text-center"
                                           value="1" required>
                                    <input value="{{$product->id}}" type="hidden" name="product_id">
                                </div>

                            </div>
                            <div class="w-100 my-4">
                                <button class="btn btn-accent rounded">
                                    AddCart
                                </button>
                                <a href="{{action('WishListController@add',[$product->id])}}"
                                   class="btn btn-outline-accent rounded ml-3">
                                    WishList
                                </a>
                            </div>

                        </form>
                    </div>
                    <div class="flex w-40">
                        <div class="w-50">


                        </div>
                        <div class="w-50 mx-3">

                        </div>

                    </div>
                    <div class="mt-3">
                        <p class="fi flaticon-menu"> Share</p>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm font-semibold"> Return Policy: 14­day refund or replacement</p>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <div class="panel panel-default px-2">
        <div class="mt-3 w-90 mx-auto">   
            <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                Product Details</h3>
            <div class="px-3">
                <p class="text-base">{{$product->description}}</p>
            </div>
        </div>

        <div class="my-3 w-90 mx-auto">   
            <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                Specifications</h3>
            <div class="px-3">
                <p class="text-xs my-0">Type  </p>
                <p class="text-xs my-0">Sneakers  </p>
                <p class="text-xs my-0">Toe Shape </p>
            </div>
        </div>
        <div class="my-3 w-90 mx-auto">   
            <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                Reviews</h3>
            <div class="flex px-3">
                <div class="w-30  xs:text-xs2 xs:w-60">
                    <h5 class="xs:text-sm font-normal mt-0 mb-3">Item rating</h5>

                    <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                        <span class="text-orange mt-2">
                                                                ★

                                     </span>
                        <span class=" mt-2">
                                                                ★
                                            ★
                                     </span>

                    </div>
                    <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                        <span class="text-orange mt-2">
                                                                ★

                                     </span>
                        <span class=" mt-2">
                                                                ★
                                            ★
                                     </span>

                    </div>
                    <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                        <span class="text-orange mt-2">
                                                                ★

                                     </span>
                        <span class=" mt-2">
                                                                ★
                                            ★
                                     </span>

                    </div>
                </div>
                <div class="w-70">
                    <div class="w-70 xs:w-100 pl-5 xs:pl-3">
                        <h5 class="text-xl xs:text-sm mt-0 mb-3 p-0 font-normal">Overview Rating</h5>
                        <p class="text-dodge-blue xs:text-sm m-0 mb-4"></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <product-section title="Similar Products" :products="{{$similar_products}}"></product-section>

    <product-section title="Hot Products" :products="{{$hot_products}}"></product-section>

@endsection
