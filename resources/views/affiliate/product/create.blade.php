@extends('affiliate.layouts.app',['page_title'=>__('Add Product')])
@section('content')

    <div class="w-95 mx-auto">
        <div class=" w-100 mx-auto px-3">
            <h2 class="py-0 font-primary text-2xl font-bold">Add Product</h2>
        </div>
        <div id="mod-category">
            <form enctype="multipart/form-data" method="POST" action="{{action('Affiliate\ProductsController@store')}}">
                {{ csrf_field() }}
                @include('form.productForm')
            </form>
        </div>
    </div>

@endsection
