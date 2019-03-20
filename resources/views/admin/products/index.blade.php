@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif

        {{--@if(count($products))--}}
                @foreach($products as $product)
                    <div class="list-group-item">
                        <div class="row">

                            <div class="col-md-10">
                                <h4>{{$product->name}}</h4>
                                <p><strong>Quantity: </strong> {{$product->quantity}}</p>
                                <p><strong>Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}</p>
                            </div>

                            <div>
                                @if($product->isActive())
                                    <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" class="btn btn-danger">
                                        {{__('Deactivate')}}   </a>

                                @else
                                    <a href="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" class="btn btn-primary">

                                        {{__('Activate')}}
                                    </a>

                                @endif


                            </div>



                        </div>
                    </div>
                @endforeach
    </div>
    @endsection
