@extends('layouts.app')
@section('content')

    {{--<div class="panel-body">--}}
        {{--<div class="is-flex">--}}
            {{--<div class="w-40">--}}
    <chat @guest :is_guest="true" @endif
     :product="{{$product}}"
    >

    </chat>

    {{--<div class="panel-body">--}}
        {{--<div class="flex ">--}}
            {{--<div class="w-40  mx-auto h-100 z-10">--}}
                {{--<img  src="{{$product->cover()}}" class="transition-500ms w-100">--}}
            {{--</div>--}}
            {{--<div class="w-50  mt-4">--}}
            {{--<div class="w-65 text-left px-4  mb-3">--}}
                {{--<h1 class="text-3xl sm:text-2xl xs:text-2xl my-0 font-normal m-0 font-primary">{!! $product->name !!}</h1>--}}
                {{--<p class="text-black text-base xs:text-base m-0 text-muted">Price:{{$product->price}}</p>--}}
            {{--</div>--}}
            {{--<div class="w-  mt-1">--}}
                {{--{!! $product->description !!}--}}
            {{--</div>--}}
    {{--<form action="{{action('CartController@store')}}" method="post" class="w-50">--}}
        {{--{{csrf_field()}}--}}
        {{--<p class="w-65 text-left px-4  mb-3">--}}

            {{--<span class="text-black text-base xs:text-sm text-muted">Quantity:</span>--}}

            {{--<input min="1" type="number" name="quantity"--}}
                   {{--class="p-2 w-15 border-1 border-grey border-solid outline-none rounded has-text-centered"--}}
                   {{--value="1" required>--}}

            {{--<input value="{{$product->id}}" type="hidden" name="product_id">--}}

        {{--</p>--}}
    {{--</form>--}}
{{--<div class="flex">--}}
    {{--<p class="w-40">--}}


        {{--<button class="btn btn-success shadow mr-2  mx-4  text-lg py-2 rounded uppercase hover:bg-accent-darker">--}}
            {{--<i class="fas fa-cart-plus text-xl mr-2 "></i><span class=" text-sm">Add to Cart</span>--}}
        {{--</button>--}}


    {{--</p>--}}
    {{--<form action="{{action('ProductsController@addToWishList',[$product->id])}}" method="post" >--}}
        {{--{{csrf_field()}}--}}
        {{--<p class="w-60 mx-3 ">--}}
            {{--<button class="bg-red-dark shadow border-0 py-2 text-white    text-lg rounded uppercase hover:bg-accent-darker"><span class=" text-sm">Add to wish list</span></button>--}}
        {{--</p>--}}

    {{--</form>--}}

{{--</div>--}}



    {{--</form>--}}







            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

    {{--<button data-toggle="#review-form"--}}
            {{--class="btn ml-5 mt-3 border-1 border-solid border-grey rounded toggler">--}}
        {{--<i class="far mr-2 fa-edit"></i>--}}
        {{--<span>Write Review</span>--}}
    {{--</button>--}}



    {{--<div id="review-form"--}}
         {{--class="w-50 ml-5 my-5 border-1 bg-white rounded shadow-lg border-grey border-solid  is-hidden-temp">--}}




    {{--<form action="{{action('ReviewController@store',[$product->id])}}" method="post">--}}
        {{--{{csrf_field()}}--}}
        {{--<div>--}}
            {{--<div class="row">--}}

                    {{--<input type="text" name="title" placeholder="title"--}}
                           {{--class="form-control mx-auto w-40 mb-3 mt-5">--}}




                    {{--<textarea name="body" placeholder="Write your review.."--}}
                              {{--class="form-control mx-auto w-40 mb-3 resize-y"></textarea>--}}




                {{--<select class="form-control mx-auto w-40" name="rating">--}}
                    {{--<option>1</option>--}}
                    {{--<option>2</option>--}}
                    {{--<option>3</option>--}}
                    {{--<option>4</option>--}}
                    {{--<option>5</option>--}}
                {{--</select>--}}
                {{--<fieldset>--}}
                    {{--<legend class="clipped">Rate this product (required)</legend>--}}


                    {{--<label for="star2" title="Two Stars" data-w-onclick="handleStarsClick|w0-reviewsStarsWidget" id="w0-reviewsStarsWidget-1[0]" class=""><span class="clipped">Two Stars</span></label>--}}
                    {{--<input type="radio" title="It’s okay" id="star3" name="rating" value="3" data-w-onkeyup="handleStarsTabChange|w0-reviewsStarsWidget" class="">--}}

                    {{--<label for="star3" title="Three Stars" data-w-onclick="handleStarsClick|w0-reviewsStarsWidget" id="w0-reviewsStarsWidget-1[0]" class=""><span class="clipped">Three Stars</span></label>--}}
                    {{--<input type="radio" title="It’s okay" id="star2" name="rating" value="3" data-w-onkeyup="handleStarsTabChange|w0-reviewsStarsWidget" class="">--}}

                {{--</fieldset>--}}
            {{--</div>--}}












        {{--</div>--}}

        {{--<div class="w-80 mx-auto has-text-right">--}}




            {{--<button--}}
                    {{--class="btn my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">--}}
                {{--submit--}}
            {{--</button>--}}


        {{--</div>--}}

    {{--</form>--}}
    {{--</div>--}}



    {{--@foreach($product->reviews->sortByDesc('id') as $review)--}}
        {{--<div class="is-flex p-4 mt-3">--}}

            {{--<div class="w-20  has-text-centered">--}}

                {{--<p class="has-text-dodge-blue m-0 p-0">{{$review->user->name}}</p>--}}

            {{--</div>--}}
            {{--<div class="w-80 p-4 ml-4">--}}
                {{--<p title="0 Star item" class="mb-2 mt-2 m-0 w-auto tooltip">--}}
                    {{--<span class="pl-4 has-text-grey text-sm"><i class="far fa-clock"></i> {{$review->created_at->toFormattedDateString()}}</span>--}}
                {{--</p>--}}
                {{--<p class="has-text-dodge-blue m-0">{{__('Rating')}}: {{$review->rating}}</p>--}}

                {{--<h1 class="text-xl has-text-grey-dark">{{$review->title}}</h1>--}}

                {{--<p class="my-1">--}}
                    {{--<strong class="text-2xl italic">" </strong> {!! $review->body !!} <strong class="text-2xl italic">"</strong>--}}

                {{--</p>--}}


            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}

{{--@endsection--}}




    <div class="panel panel-default">
        <div class="panel-body w-90 mx-auto">
            <div class=" flex">
                <div class="w-50">
                    <div class="flex">
                        <div class="w-40 border border-solid ">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">

                        </div>
                        <div class="w-40 border border-solid mx-2">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>

                    </div>
                    <div class="flex mt-2">
                        <div class="w-40 border border-solid">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>
                        <div class="w-40 border border-solid mx-2">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>

                    </div>

                </div>
                <div class="w-50">
                    <div >
                        <h1 class="text-2xl  my-0 font-normal m-0 font-primary">{!! $product->name !!}</h1>

                    </div>
                    <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>
                        <span class=" mt-2">
                                                                ★
                                            ★
                                     </span>
                        <p class="text-black font-bold mx-2 text-sm  mt-2">28 views</p>
                    </div>

                    <div class="flex">
                        <div class="w-10">
                            <p>Shipping:</p>
                        </div>
                        <div class="w-90 mx-3 text-red text-sm font-bold">
                            <p>Free shipping</p>
                        </div>
                    </div>

                    <div class="flex">
                        <div class="w-10">
                            <p>Price:</p>
                        </div>
                        <div class="w-90 mx-2 text-red text-sm font-bold">
                            <p>$ 700</p>
                        </div>
                    </div>
                    <div class="w-60 mx-1  text-base ">

                        <form action="{{action('CartController@store')}}" method="post" class="w-50">
                            {{csrf_field()}}

                            <div class="flex">
                                <div class="w-70 mt-2">
                                    <p>Quantity:</p>
                                </div>
                                <div class="w-30  py-1 m-0 mx-3">
                                    <input min="1" type="number" name="quantity"
                                           class="  border-1 border-grey border-solid outline-none rounded text-center"
                                           value="1" required>
                                    <input value="{{$product->id}}" type="hidden" name="product_id">
                                </div>

                            </div>
                            {{--<span class="text-black text-base xs:text-sm text-muted">Quantity:</span>--}}
                            {{--<input value="{{$product->id}}" type="hidden" name="product_id">--}}

                        </form>

                    </div>
                    <div class="flex w-40">
                        <div class="w-50">
                            <form action="{{action('WishListController@add',[$product->id])}}" method="post" >
                                {{csrf_field()}}
                            <button class="bg-white border-1 border-solid border-red text-red cursor-pointer px-3 py-2 hover:bg-primary font-bold text-sm">WishList</button>
                            </form>

                        </div>
                        <div class="w-50 mx-3">
                            <button class="bg-red border-0 text-white cursor-pointer hover:bg-primary px-3 py-2 ">AddCart</button>
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

            <div class="panel panel-default ">
                <div class="mt-3 w-90 mx-auto">   
                    <h6 class="font-bold text-base"> PRODUCT DETAILS </h6>
                    <p class="text-xs">A pair of round­toe solid black sneakers, has regular styling, lace­up detail  Canvas upper Cushioned footbed Textured and patterned outsole   Warranty : 1 month Warranty provided by brand/manufacturer</p>
                    <div class="flex">
                        <div class="w-15 border border-solid ">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>
                        <div class="w-15 border border-solid mx-2">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>
                        <div class="w-15 border border-solid mx-2 ">
                            <img  src="{{$product->cover()}}" class="transition-500ms ">
                        </div>
                    </div>

                </div>

                <div class="my-0 w-90 mx-auto">   
                    <h6 class="font-bold text-base"> Specifications </h6>
                    <p class="text-xs my-0">Type  </p>
                    <p class="text-xs my-0">Sneakers  </p>
                    <p class="text-xs my-0">Toe Shape </p>
                </div>
            </div>
            <div class="flex w-90 mx-auto">
                <h5 class="w-80 text-2xl xs:text-lg font-normal font-primary my-4">Reviews</h5>
                <p data-toggle="#product-review" class="w-20 toggler text-2xl text-right my-auto  pr-3 my-4">
                    <i class="fi flaticon-plus cursor-pointer"></i></p>
            </div>
            <div class="p-3 xs:p-1 w-90 mx-auto" id="product-review">
                <div class="flex ">
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
    <div class="panel panel-white-smoke">
        <div class="w-90 mx-auto ">
            <div class=" my-3 ">
                <h4 class="text-xl font-primary">Similar Product</h4>
            </div>
            <div class="flex mx-auto py-3">

                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2 mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2 mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>
                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>


                </div>

                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>
                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>



                </div>
        </div>


    </div>

    </div>

    <div class="panel panel-default mt-3">
        <div class="w-90 mx-auto ">
            <div class=" my-3 ">
                <h4 class="text-xl font-primary">Hot Products Related To This Item</h4>
            </div>
            <div class="flex mx-auto py-3">

                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2 mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>

                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>
                </div>
                <div class="w-20 px-2 mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>
                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>


                </div>

                <div class="w-20 px-2  mx-2 shadow bg-white rounded ">
                    <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                        <img class="w-70" src="{{$product->thumbnail()}}">
                    </a>
                    <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                        <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                        <p class="text-base font-primary text-red  mt-2 ">100$ - 150$</p>
                    </div>



                </div>
            </div>


        </div>

    </div>

<script>
    import ChatPopUp from "../../js/components/chatPopUp";
    export default {
        components: {ChatPopUp}
    }
</script>

    @endsection