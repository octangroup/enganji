@extends('affiliate.layouts.app',['page_title'=>__('Add Product')])
@section('content')

    <div class="container">
        <div>
                    <h6>{{__('Product Details')}}</h6>
                </div>
                <div id="mod-category" class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{action('Affiliate\ProductsController@store')}}">
                        {{ csrf_field() }}
                        @include('affiliate.components.Form.productForm')
                    </form>
                </div>


@endsection
