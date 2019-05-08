@extends('layouts.app')
@section('content')


    {{--<div class="panel p-0 pb-5 mb-5 min-h-auto h-auto w-100">--}}
    {{--<div class="panel-body w-75 lg:w-85 md:w-90 xs:w-100 mx-auto mb-5 pb-5">--}}
    {{--@foreach($wishLists as $wishList)--}}
    {{--<div class="row">--}}
    {{--<div class="w-50 h-48 p-3">--}}
    {{--<h2 class="text-xl m-0">{{$wishList->product->name}}</h2>--}}
    {{--<p class="text-xl m-0 pt-2">{{$wishList->product->condition->name}}</p>--}}
    {{--<p class="text-xl m-0 pt-2">{{$wishList->product->price}}</p>--}}

    {{--<div class="w-20  h-48 p-3 has-text-right">--}}
    {{--<p class="text text-red-light m-0 ">--}}
    {{--<a href="{{action('WishListController@destroy',[$wishList->id])}}">--}}
    {{--Remove--}}
    {{--</a></p>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div>--}}




    <div class="panel panel-default">
        <div class="w-80 mx-auto my-3">
            <h5 class="text-3xl text-primary">
                My wishlist
            </h5>
        </div>

            <div class=" w-80 mx-auto border mb-3 border-b-1 my-4 border-r-0 border-l-0 border-t-0">
                @foreach($wishLists as $wishList)
                <div class="flex">

                    <div class="w-10 ">
                        <p></p>

                    </div>
                    <div class="w-25  mx-auto text-center py-4">
                        <img src="{{asset('img/51YXG1bDM5L._AC_UL436_.jpg')}}" class="w-20">

                    </div>
                    <div class="w-25 my-auto mx-auto text-center">
                        <p class="text-lg">{!! $wishList->product->name !!}

                        </p>
                    </div>
                    <div class="w-25 my-auto mx-auto text-center">
                        <p class="text-lg">{!! $wishList->product->currency->name !!} {!! $wishList->product->price !!}</p>
                    </div>
                    <div class="w-15 my-auto mx-auto text-center">
                        <button class="btn btn-primary shadow mr-2 px-4   rounded-full uppercase hover:bg-accent-darker">
                            Add to cart
                        </button>
                    </div>

                </div>
                @endforeach


            </div>


    </div>

@endsection