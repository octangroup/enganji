@extends('affiliate.layouts.app')
@section('content')

 <div class="container">
     <div class="card">
         <div class="card-header">
             {{__('Deals')}}
             <button class="btn btn-primary toggler" data-toggle="#add-deal-form">{{_('Add')}}</button>
         </div>

         @foreach($products as $product)

         <div id="add-deal-form" class="card-body hidden-temp">
             <form action="{{action('Affiliate\DealsController@store')}}" method="post">
                 {{csrf_field()}}
             <div class="row">
                 <div class="col-md-5">
                     <label>Name</label>
                     <input value="{{$product->name}}" class="form-control" >
                     <input value="{{$product->id}}" type="hidden" name="product_id">
                 </div>

                 <div class="col-md-5">
                     <label>New price</label>
                     <input class="form-control" placeholder="price" name="price">
                 </div>

             </div>

             <div class="row">
                 <div class="col-md-5">
                     <label>Begin</label>
                     <input class="form-control" type="date" name="begin_on">
                 </div>

                 <div class="col-md-5">
                     <label>End</label>
                     <input  class="form-control" type="date" name="end_at">
                 </div>

             </div>
             <div>
                 <button class="btn btn-primary mt-2">Save</button>
             </div>
             </form>
         </div>

             @endforeach
         <br>
         @foreach($deals as $deal)
             <div class="list-group-item">
                 <div class="row">
                     <div class="col-md-10">
                         <h4>{{$deal->product->name}}</h4>
                         <p><strong>Starting on: </strong> {{$deal->begin_on}}</p>
                         <p><strong>End at: </strong> {{$deal->end_at}}</p>
                         <p><strong>Price: </strong> {{$deal->price}}</p>
                     </div>
                 </div>
             </div>
                     @endforeach
     </div>
 </div>

@endsection