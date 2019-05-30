@extends('layouts.app')
@section('content')
    <chat @guest :is_guest="true" @endif
    :product="{{$product}}"
    >
    </chat>
    <div class="panel panel-default">
        <div class="panel-body w-90 mx-auto">
            <div class="xl:flex ">
                <div class="xl:w-50 xs:w-100 xl:flex">
                    {{--<div class="flex ">--}}
                        {{--<div class="w-40 xs:w-50 p-3 border border-solid border-grey-light rounded-tl-xxl overflow-hidden">--}}
                            {{--<img src="{{$product->cover()}}" class="transition-500ms ">--}}

                        {{--</div>--}}
                        {{--<div--}}
                            {{--class="w-40 p-3 xs:w-50 border border-solid mx-2  border-grey-light rounded-tr-xxl overflow-hidden">--}}
                            {{--<img src="{{$product->cover()}}" class="transition-500ms ">--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="flex mt-2 ">--}}
                        {{--<div class="w-40 xs:w-50 p-3 border border-solid border-grey-light rounded-bl-xxl overflow-hidden">--}}
                            {{--<img src="{{$product->cover()}}" class="transition-500ms ">--}}
                        {{--</div>--}}
                        {{--<div class="w-40 xs:w-50 p-3 border border-solid mx-2 border-grey-light rounded-br-xxl overflow-hidden">--}}
                            {{--<img src="{{$product->cover()}}" class="transition-500ms ">--}}
                        {{--</div>--}}

                    {{--</div>--}}

                {{--</div>--}}

                    <div class="w-30 xs:hidden">
                        <div class=" w-65 p-3 border border-solid border-grey-light rounded-xl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">

                        </div>
                        <div class=" w-65 p-3 border border-solid border-grey-light mt-4 rounded-xl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">

                        </div>

                        <div class=" w-65 p-3 border border-solid border-grey-light mt-4 rounded-xl overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">

                        </div>

                    </div>
                    <div class="xl:w-70 xs:w-100 ">
                        <div class="mt-2 ">
                            <h1 class="xl:text-4xl xs:text-base  my-0 font-medium m-0 font-primary">{!! $product->name !!}</h1>
                        </div>
                        <div class="  border border-solid border-grey-light rounded-xlg overflow-hidden">
                            <img src="{{$product->cover()}}" class="transition-500ms ">

                        </div>
                    </div>
                </div>
                <div class="w-50 mx-5">
                    <div class="mt-2 ">
                        <h1 class="xl:text-4xl xs:text-base  my-0 font-medium m-0 font-primary">{!! $product->name !!}</h1>
                    </div>
                    <div class="mt-3">

                        <span class="text-accent">
                            @for($j=1;$j<=$product->rating;$j++)
                                <i class="fi flaticon-star-4"></i>
                            @endfor
                            @for($j=1;$j<=(5- $product->rating);$j++)
                                <i class="fi flaticon-star"></i>
                            @endfor
                        </span>

                        <p class="text-black mx-2 text-xs  mt-2 inline-block">{{$product->reviews->count()}} reviews</p>
                    </div>

                    <div class="w-100">
                        <p class="my-1"><span class="mr-3 inline-block">Price:</span> <span
                                class="text-accent xl:text-3xl xs:text-base font-primary inline-block font-medium">
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
{{--                    <div class="mt-3">--}}
{{--                        <p class="fi flaticon-menu"> Share</p>--}}
{{--                    </div>--}}


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
                <p class="text-md my-0">Brand Name:{{$product->brand->name}}</p>
                <p class="text-md my-0">Condition:{{$product->condition->name}}</p>
                <p class="text-md my-0">Color:{{$product->color}}</p>
            </div>
        </div>
        <div class="my-3 w-90 mx-auto">   
            <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                Reviews</h3>
            <div class="flex px-3 pb-4">
                <div class="w-30  xs:text-xs2 xs:w-60 pt-3">
                    @for($i = 5;$i>0;$i--)
                        <p title="0 Star item" class="mb-2 mt-2 w-auto tooltip">
                            <span class="pr-3">{{$i}} star</span>
                            <span class="text-accent">
                                        @for($j=1;$j<=$i;$j++)
                                    <i class="fi flaticon-star-4"></i>
                                @endfor

                                @for($j=1;$j<=(5-$i);$j++)
                                    <i class="fi flaticon-star"></i>
                                @endfor
                                </span>
                            <span class="pl-3">{{$product->ratingCountOf($i)}}</span>
                        </p>
                    @endfor
                </div>
                <div class="w-70">
                    <div class="w-70 xs:w-100 pl-5 xs:pl-3">
                        <h5 class="text-xl  mt-0 mb-3 p-0 font-medium font-primary">Overview Rating</h5>
                        <p class="text-dodge-blue xs:text-sm m-0 mb-4">{{$product->rating()}} {{$product->ratingCategory()}}</p>
                        @guest()
                            <a href="{{action('Auth\LoginController@showLoginForm')}}"
                               class="btn mt-3 border-1 inherit-color border-solid mt-5  xs:text-sm border-grey rounded-full toggler uppercase text-sm">
                                <i class="far mr-2 fa-edit"></i>
                                <span>Login to Review</span>
                            </a>
                        @endguest

                        @auth()
                            <button data-toggle="#review-form"
                                    class="btn mt-3 border-1 border-solid xs:text-sm border-grey rounded-full toggler text-sm uppercase">
                                <i class="far mr-2 fa-edit"></i>
                                <span>Write Review</span>
                            </button>
                            @include('product.components.reviews.form')
                        @endauth


                    </div>
                </div>

            </div>
            <div class="w-70 mx-auto">
                @foreach($product->reviews as $review)
                    @component('product.components.reviews.card',['review'=>$review])
                    @endcomponent
                @endforeach
            </div>
        </div>

    </div>
    <product-section title="Similar Products" :products="{{$similar_products}}"></product-section>

    <product-section title="Hot Products" :products="{{$hot_products}}"></product-section>

@endsection
