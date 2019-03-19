@extends('affiliate.layouts.app',['page_title'=>__('Edit Product')])
@section('content')

    <div class="container">
        <div>
                    <h6>{{__('Product Details')}}</h6>
                </div>
                <div id="mod-category" class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{action('Affiliate\ProductsController@update',[$product->id])}}">
                        {{ csrf_field() }}
                        @method('PUT')
                        @include('affiliate.components.Form.productForm')
                    </form>
                </div>



@endsection
