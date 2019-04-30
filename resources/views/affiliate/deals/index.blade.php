@extends('affiliate.layouts.app')
@section('content')

 <div class="container">
     @if(Session::has('message'))
         <div class="alert alert-info">
             {{Session::get('message')}}
         </div>
     @endif
     <div class="card">
         <div class="card-header">
             {{__('Deals')}}
         </div>

@foreach($products as $product)
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
                     <div>
                         <button class="btn btn-success  toggler" data-toggle="#mod-deal-form{{$deal->id}}">Modify</button>
                         <a class="btn btn-danger" href="{{action('Affiliate\DealsController@delete',[$deal->id])}}">delete</a>
                     </div>


                 </div>
                 <div id="mod-deal-form{{$deal->id}}" class="card-body hidden-temp">
                     <form action="{{action('Affiliate\DealsController@update',[$deal->id])}}" method="post">
                         {{csrf_field()}}
                         <div class="row">
                             <div class="col-md-5">
                                 <label>Name</label>

                                 <input value="{{$product->name}}" class="form-control" >
                                 <input value="{{$product->id}}" type="hidden" name="product_id">
                             </div>

                             <div class="col-md-5">
                                 <label>New price</label>
                                 <input class="form-control" value="{{$deal->price}}"  name="price">
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
                             <button class="btn btn-primary mt-2">update</button>
                         </div>
                     </form>
                 </div>

             </div>
                     @endforeach
     </div>
 </div>

@endsection
