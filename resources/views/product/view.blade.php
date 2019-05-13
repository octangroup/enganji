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

                        <span class="text-orange">
                                        @for($j=1;$j<=$product->rating();$j++)
                                ★
                            @endfor
                 </span>

                        <p class="text-black mx-2 text-xs  mt-2 inline-block">{{$product->reviews->count()}} reviews</p>
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
                            <div id="review-form"
                                 class="w-100 my-5 border-1 bg-white rounded shadow-lg border-grey border-solid">
                                <div class="xl:flex md:flex lg:flex">
                                    <div class="w-30 xs:w-100 px-3 border-0 border-solid border-grey border-r-1">
                                        <div class="h-100 py-5"><img
                                                    src="{{asset($product->getFirstMediaUrl())}}" class="">
                                            <p class="text-dodge-blue text-xl text-center">{{$product->name}}</p>
                                        </div>
                                    </div>
                                    <div class="w-70 xs:w-100">
                                        <form action="{{action('ReviewController@store',[$product->id])}}"
                                              method="post">
                                            {{csrf_field()}}
                                            <div class="flex  p-0 m-0">
                                                <p class="w-20">
                                                    <img src="{{Auth::user()->avatar}}"
                                                         class="rounded-full p-3 m-0">
                                                </p>
                                                <div class="w-80 my-auto px-2 text-left w-auto tooltip">
                                                    <p> Rate this product?
                                                        <star-rating></star-rating>
                                                    </p>
                                                </div>
                                            </div>
                                            <input type="text" name="title" placeholder="Title"
                                                   class="form-input text-sm mx-auto w-80 mb-3">

                                            <textarea name="body" placeholder="Write your review.."
                                                      class="form-input mx-auto text-sm w-80 resize-y"></textarea>

                                            <div class="w-80 flex mx-auto text-right py-3">
                                                <button data-toggle="#review-form"
                                                        type="button"
                                                        class="btn toggler my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">
                                                    cancel
                                                </button>
                                                &nbsp &nbsp &nbsp


                                                <button
                                                        class="btn my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">
                                                    submit
                                                </button>


                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endauth



                        @foreach($product->reviews as $review)
                            <div class="flex p-4 mt-3">

                                <div class="w-20  text-center">
                                    {{--<img src="{{$review->user->avatar}}" class="rounded-full p-3 m-0 w-65 mt-4">--}}

                                    <p class="text-dodge-blue m-0 p-0">{{$review->user->name}}</p>

                                </div>
                                <div class="w-80 p-4 ml-4">
                                    <p title="0 Star item" class="mb-2 mt-2 m-0 w-auto tooltip">
                                   <span class="text-orange">
                           @for($j=1;$j<=$review->rating;$j++)
                                           ★
                                       @endfor
                                    </span>
                                        <span class="text-grey-light">
                                         @for($j=1;$j<=(5-$review->rating);$j++)
                                                ★
                                            @endfor
                                    </span>
                                        <span class="pl-4 text-grey text-sm"><i class="far fa-clock"></i> {{$review->created_at->toFormattedDateString()}}</span>
                                    </p>
                                    <p class="text-dodge-blue m-0">{{$review->ratingCategory()}}</p>

                                    <h1 class="text-xl text-grey-dark font-primary">{{$review->title}}</h1>

                                    <p class="my-1">
                                        <strong class="text-2xl italic">" </strong> {!! $review->body !!} <strong
                                                class="text-2xl italic">"</strong>

                                    </p>


                                </div>
                            </div>

                        @endforeach





                    </div>
                </div>
            </div>
        </div>

    </div>
    <product-section title="Similar Products" :products="{{$similar_products}}"></product-section>

    <product-section title="Hot Products" :products="{{$hot_products}}"></product-section>

@endsection
