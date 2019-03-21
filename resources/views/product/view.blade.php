@extends('layouts.app')
@section('content')


<div class="is-flex">

    <div class="flex-75">


    {{$product->name}}<br>
    {{$product->quantity}}<br>
  by{{$product->affiliate->name}}
    <img src="{{asset($product->cover())}}" class="clip-full">

</div>

    <div class="flex-25">
    <select class="form-control" name="rating">

    </select>
    <input class="form-control" name="title">
    <input class="form-control" name="body">
    </div>

</div>

   <div>
    @foreach($reviews as $review)
    {{$review->title}}
    @endforeach
   </div>


@endsection