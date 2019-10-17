@extends('affiliate.layouts.app',['page_title'=>__('Edit Product')])
@section('content')

    <div class="w-95 mx-auto">
        <div class="flex w-100">
            <div class="w-60">
                <h2 class="py-0 font-primary text-2xl font-bold">{{__('Product Details')}}</h2>
            </div>
            <div class="w-40 text-right">
                <div class="mt-2 ml-2">
                    <a class="btn btn-success rounded" href="{{action('Affiliate\ProductsController@picturesPage',[$product->id])}}">Edit
                        Pictures</a>
                </div>
            </div>
        </div>
        <div id="mod-category" class="card-body">

            <form enctype="multipart/form-data" method="POST"
                  action="{{action('Affiliate\ProductsController@update',[$product->id])}}">
                {{ csrf_field() }}
                @method('PUT')
                @include('form.productForm')
            </form>
        </div>
    </div>


@endsection
