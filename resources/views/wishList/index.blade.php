@extends('layouts.app')
@section('content')


    <div class="list-group-item">
        @foreach($wishLists as $wishList)
        <div class="row">
            <div class="w-50 h-48 p-3">
                <h2 class="text-xl m-0">{{$wishList->product->name}}</h2>
                {{--<p class="text-xl m-0 pt-2">{{$wishList->product->condition->name}}</p>--}}
                <p class="text-xl m-0 pt-2">{{$wishList->product->price}}</p>

                <div class="w-20  h-48 p-3 has-text-right">
                    <p class="text text-red-light m-0 ">
                        <a href="{{action('WishListController@destroy',[$wishList->id])}}">
                            Remove
                        </a></p>
                </div>

        </div>
    </div>
        @endforeach
    </div>


        {{--<div class="panel panel-default">--}}

        {{--</div>--}}

    @endsection