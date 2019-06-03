@extends('affiliate.layouts.app',['page_title'=>__('Edit Product')])
@section('content')

    <div class="w-95 mx-auto">
        <div>
            <h2 class="py-0 font-primary text-2xl font-bold">{{__('Product Details')}}</h2>
        </div>
        <div id="mod-category" class="card-body">
            <form enctype="multipart/form-data" method="POST"
                  action="{{action('Affiliate\ProductsController@update',[$product->id])}}">
                {{ csrf_field() }}
                @method('PUT')
                @include('form.productForm')
            </form>
        </div>



@endsection
