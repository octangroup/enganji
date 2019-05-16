@extends('layouts.app')
@section('content')

    <main-slideshow :ads="{{$ads}}"></main-slideshow>
    <product-section title="Trending Products" :products="{{$products}}"></product-section>
    <product-section title="New Products" :products="{{$products}}"></product-section>
@endsection

