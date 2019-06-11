@extends('layouts.app')
@section('content')
    <div class="w-90 mx-auto xs:block flex">
        <div class="w-30 xs:w-100">
            <div class="bg-white-smoke py-4 rounded-xlg text-center">
                <div class="w-60 py-3 mx-auto">
                    <img src="{{Auth::user()->avatar_original}}" class="w-100 rounded-full">
                </div>
                <h3 class="my-2 font-primary">{{Auth::user()->name}}</h3>
                <a href="{{action('ProfileController@edit',[Auth::user()->id])}}"
                   class="btn bg-grey-light px-5 rounded-full mt-4 mb-2"><i class="fi flaticon-edit "></i> Edit</a>
                <div class="w-80 mx-auto text-center flex mb-4">
                    <div class="w-30 mx-auto ">
                        <h5 class="mb-0 mt-4 font-primary text-2xl">232</h5>
                        <p class="my-1 text-sm leading-none opacity-65">Reviews</p>
                    </div>
                    <div class="w-30 mx-auto ">
                        <h5 class="mb-0 mt-4 font-primary text-2xl">3.2</h5>
                        <p class="my-1 text-sm leading-none opacity-65">Average rating</p>
                    </div>
                    <div class="w-30 mx-auto ">
                        <h5 class="mb-0 mt-4 font-primary text-2xl">32</h5>
                        <p class="my-1 text-sm leading-none opacity-65">Wishlist</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-70 pl-5">
            @foreach(Auth::user()->reviews as $review)
                @component('product.components.reviews.card',['review'=>$review,'show_product'=>true])
                @endcomponent
            @endforeach
        </div>
    </div>
@endsection
