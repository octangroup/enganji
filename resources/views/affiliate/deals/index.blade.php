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
     </div>
 </div>
@foreach($products as $product)


@endforeach

         <br>
         @foreach($deals as $deal)
             <div class="mx-4 bg-white border-1 w-80 border-solid border-grey-light rounded mx-auto mb-4 p-2  ">
                 <div class="flex xs:block">
                     <div class="w-40 xs:w-100 px-2 text-base">
                         <h4 class="font-primary">{{$deal->product->name}}</h4>
                         <p><strong class="font-primary">Starting on: </strong> {{$deal->begin_on}}</p>
                         <p><strong class="font-primary">End at: </strong> {{$deal->end_at}}</p>
                         <p><strong class="font-primary">Price: </strong> {{$deal->price}}</p>
                     </div>
                 </div>
                     <div class=" text-right mr-3">
                         <p class="fi flaticon-edit mx-2 text-xl inline-block  toggler" data-toggle="#mod-deal-form{{$deal->id}}"></p>
                         <p class="fi flaticon-trash text-red mx-2 font-bold text-xl inline-block" href="{{action('Affiliate\DealsController@delete',[$deal->id])}}"></p>
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


@endsection
