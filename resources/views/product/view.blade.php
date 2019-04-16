@extends('layouts.app')
@section('content')

    {{--<div class="panel-body">--}}
        {{--<div class="is-flex">--}}
            {{--<div class="w-40">--}}
    <chat @guest :is_guest="true" @endif
     :product="{{$product}}"
    >

    </chat>

    <div class="panel-body">
        <div class="is-flex">
            <div class="w-40">
                <img width="50%" src="{{$product->cover()}}" class="clip-full">
            </div>
            <div class="w-50 pl-5">
            <div class="w-65 text-left px-4">
                <h3>{!! $product->name !!}</h3>
                <p class="my-2"><strong>Price: </strong>{{$product->price}}</p>
            </div>
            <div class="w-90 mx-auto mt-5">
                {!! $product->description !!}
            </div>

                <form action="{{action('CartController@store')}}" method="post">
                    {{csrf_field()}}
                    <p class="mt-6">

                        <span class="has-text-black text-xl">Quantity:</span>

                        <input min="1" type="number" name="quantity"
                               class="p-2 w-15 border-1 border-grey border-solid outline-none rounded has-text-centered"
                               value="1" required>

                        <input value="{{$product->id}}" type="hidden" name="product_id">

                    </p>

                    <p class="w-50">


                        <button class="w-80 has-text-left text-lg p-3 rounded">
                            <i class="fas fa-cart-plus  pl-2 pr-3"></i><span class="">Add to Cart</span>
                        </button>


                    </p>


                </form>



                <form action="{{action('ProductsController@addToWishList',[$product->id])}}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-dark-grey">Add to wish list</button>
                </form>


            </div>
        </div>

    </div>

    <button data-toggle="#review-form"
            class="btn ml-5 mt-3 border-1 border-solid border-grey rounded toggler">
        <i class="far mr-2 fa-edit"></i>
        <span>Write Review</span>
    </button>



    <div id="review-form"
         class="w-50 ml-5 my-5 border-1 bg-white rounded shadow-lg border-grey border-solid  is-hidden-temp">




    <form action="{{action('ReviewController@store',[$product->id])}}" method="post">
        {{csrf_field()}}
        <div>
            <div class="row">


                    <input type="text" name="title" placeholder="title"
                           class="form-control mx-auto w-40 mb-3 mt-5">




                    <textarea name="body" placeholder="Write your review.."
                              class="form-control mx-auto w-40 mb-3 resize-y"></textarea>




                <select class="form-control mx-auto w-40" name="rating">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                {{--<fieldset>--}}
                    {{--<legend class="clipped">Rate this product (required)</legend>--}}


                    {{--<label for="star2" title="Two Stars" data-w-onclick="handleStarsClick|w0-reviewsStarsWidget" id="w0-reviewsStarsWidget-1[0]" class=""><span class="clipped">Two Stars</span></label>--}}
                    {{--<input type="radio" title="It’s okay" id="star3" name="rating" value="3" data-w-onkeyup="handleStarsTabChange|w0-reviewsStarsWidget" class="">--}}

                    {{--<label for="star3" title="Three Stars" data-w-onclick="handleStarsClick|w0-reviewsStarsWidget" id="w0-reviewsStarsWidget-1[0]" class=""><span class="clipped">Three Stars</span></label>--}}
                    {{--<input type="radio" title="It’s okay" id="star2" name="rating" value="3" data-w-onkeyup="handleStarsTabChange|w0-reviewsStarsWidget" class="">--}}

                {{--</fieldset>--}}
            </div>












        </div>

        <div class="w-80 mx-auto has-text-right">




            <button
                    class="btn my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">
                submit
            </button>


        </div>

    </form>
    </div>



    @foreach($product->reviews->sortByDesc('id') as $review)
        <div class="is-flex p-4 mt-3">

            <div class="w-20  has-text-centered">

                <p class="has-text-dodge-blue m-0 p-0">{{$review->user->name}}</p>

            </div>
            <div class="w-80 p-4 ml-4">
                <p title="0 Star item" class="mb-2 mt-2 m-0 w-auto tooltip">
                    <span class="pl-4 has-text-grey text-sm"><i class="far fa-clock"></i> {{$review->created_at->toFormattedDateString()}}</span>
                </p>
                <p class="has-text-dodge-blue m-0">{{__('Rating')}}: {{$review->rating}}</p>

                <h1 class="text-xl has-text-grey-dark">{{$review->title}}</h1>

                <p class="my-1">
                    <strong class="text-2xl italic">" </strong> {!! $review->body !!} <strong class="text-2xl italic">"</strong>

                </p>


            </div>
        </div>
    @endforeach

@endsection
<script>
    import ChatPopUp from "../../js/components/chatPopUp";
    export default {
        components: {ChatPopUp}
    }
</script>