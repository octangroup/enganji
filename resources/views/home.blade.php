@extends('layouts.app')
@section('content')

    <div class=" w-100">
        <div class=" w-90 mx-auto rounded-xlg overflow-hidden">
            <img src="{{asset('img/cover.png')}}"
                 class="w-100">
        </div>
    </div>

    @component('product.components.listing.section',['products'=>$products,'title'=>'Trending Products'])
    @endcomponent

    @component('product.components.listing.section',['products'=>$products,'title'=>'Top Categories'])
    @endcomponent

@endsection

