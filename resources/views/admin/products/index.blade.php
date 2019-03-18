@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(count($products))
        @foreach($products  as $product)
            <div class="list-group-item">
              <div class="row">
                  <div class="col-md-10">
                      <h4>{{$product->name}}</h4>
                      <p><strong>Quantity: </strong> {{$product->quantity}}</p>
                      <p><strong>Price: </strong> {{$product->currency->name ?? null}} {{$product->price}}</p>
                  </div>
                  <div>
                      @if($product->status === 1)
                          <form action="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" method="post">
                          {{csrf_field()}}
                              <button class="btn btn-danger">Deactivate</button>
                          </form>
                          @else
                          <form action="{{action('Admin\ProductsController@changeStatus',[$product->id])}}" method="post">
                              {{csrf_field()}}
                              <button class="btn btn-primary">Activate</button>
                          </form>
                      @endif
              </div>
            </div>
            @endforeach
            @endif
    </div>
    @endsection
