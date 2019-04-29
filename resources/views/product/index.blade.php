@extends('layouts.app')
@section('content')
    {{--<div class="card-body">--}}
    {{--<form method="GET" action="{{action('ProductsController@search')}}">--}}
    {{--<div class="my-2">--}}
    {{--<h4>Categories</h4>--}}
    {{--@foreach ($categories as $category)--}}
    {{--<p>--}}
    {{--<input type="checkbox" name="categories[]"--}}
    {{--value="{{$category->id}}"> {{$category->name}}--}}
    {{--</p>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--<div class="my-2">--}}
    {{--<h4>Conditions</h4>--}}
    {{--@foreach ($conditions as $condition)--}}
    {{--<p>--}}
    {{--<input type="checkbox" name="conditions[]" value="{{$condition->id}}"> {{$condition->name}}--}}
    {{--</p>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--<div class="my-2">--}}
    {{--<h4>Brands</h4>--}}
    {{--@foreach ($brands as $brand)--}}
    {{--<p>--}}
    {{--<input type="checkbox" name="brands[]" value="{{$brand->id}}"> {{$brand->name}}--}}
    {{--</p>--}}
    {{--@endforeach--}}
    {{--</div>--}}

    {{--<div class="text-center">--}}
    {{--<button type="submit" class="btn btn-outline-primary">Filter</button>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}

    {{--<div class="pt-3 px-2">Sort By:</div>--}}
    {{--<div>--}}
        {{--<ul class="has-inline-block border-1 rounded-full border-solid border-grey p-3 w-fit">--}}

            {{--<li class="mx-2 pr-3 border-solid border-0 border-r-1 border-grey">--}}
                {{--<a--}}
                        {{--@if($category ?? null)--}}
                        {{--href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'newest', http_build_query($attributes->only( 'min', 'max', 'brands','conditions'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'newest', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif--}}
                {{-->Newest</a>--}}
            {{--</li>--}}

            {{--<li class="mx-2 pr-3 border-solid border-0 border-r-1 border-grey">--}}
                {{--<a--}}
                        {{--@if($category ?? null)--}}
                        {{--href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-asc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-asc', http_build_query($attributes->only('ratings', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif >Price:--}}
                    {{--Low to High</a>--}}
            {{--</li>--}}
            {{--<li class="mx-2">--}}
                {{--<a--}}
                        {{--@if($category ?? null)--}}
                        {{--href="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductsController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif >Price:--}}
                    {{--High to Low</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
        {{--@if($products && count($products))--}}
            {{--@foreach($products as $product)--}}
                {{--<div class="py-4 px-2 bg-white border-1 border-solid border-grey-light rounded-lg">--}}
                    {{--<div class="flex">--}}
                        {{--<div class="w-30">--}}
                            {{--<a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">--}}
                                {{--<img class="w-100" src="{{$product->thumbnail()}}">--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="w-50 pl-3">--}}
                            {{--<h3>{!! $product->name !!}</h3>--}}
                            {{--<p class="my-2"><strong>Price: </strong>{{$product->price}}</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}
        {{--@endif--}}

    {{--</div>--}}


    <div class="panel panel-white-smoke">
        <div class="flex  ">
            <div class="w-20 p-5">

                <h3 class="text-base font-bold font-primary mx-auto "> Categories</h3>
                <div class="py-2 ">
                    @foreach ($categories as $category)
                        <div class="ml-3">
                            <p class="my-2 text-sm">
                                <input type="checkbox" name="categories[]"
                                       value="{{$category->id}}"> {{$category->name}}
                            </p>
                        </div>

                    @endforeach

                </div>
                <form>
                    <div class="py-2 ">
                        <h3 class="text-base font-bold font-primary">Brand</h3>

                    </div>
                    @foreach ($brands as $brand)

                        <div class="ml-3 flex">

                            <p>
                                {{$brand->name}}
                                <input type="checkbox" name="brands[]" value="{{$brand->id}}">
                            </p>

                        </div>
                    @endforeach


                </form>

                <div class="py-2 ">
                    <h3 class="text-base font-bold font-primary">Size</h3>
                    <div class=" w-100 flex py-1 m-0 mx-3">
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                    </div>
                    <div class=" w-100 flex py-1 m-0 mx-3">
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                        <div class="h-8 w-8 rounded-full border-black border-solid border-1 text-center text-sm py-1 mx-1"> 2.4 </div>
                    </div>

                </div>



            </div>
            <div class="w-80 bg-white ">

                    <div class="flex bg-white rounded w-70 mx-5 m-3 mb-4 p-2 border-1 border-solid border-grey-light">
                        <div class="w-30 mx-auto text-center mx-3 my-2">
                            <img src="{{asset('img/51YXG1bDM5L._AC_UL436_.jpg')}}" class="w-40 ">
                        </div>
                        <div class="w-70 my-3">
                            <h3 class="text-sm my-1">Apple iPhone 6 Dual Core IOS Mobile Phone 4.7'   IPS 1GB RAM 16/64/128GB ROM 4G LTE </h3>
                            <span class="text-xs my-0 text-grey">by Apple</span>

                            <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                                <span class="text-orange mt-2">
                                                                ★

                                     </span>
                                <span class=" mt-2">
                                                                ★

                                     </span>

                            </div>

                            <div>
                                <p class="text-base font-semibold text-red  mt-2 ">US $100 - $150</p>
                            </div>
                        </div>



                </div>
                <div class="flex bg-white rounded w-70 mx-5 m-3 mb-4 p-2 border-1 border-solid border-grey-light">
                    <div class="w-30 mx-auto text-center mx-3 my-2">
                        <img src="{{asset('img/51YXG1bDM5L._AC_UL436_.jpg')}}" class="w-40 ">
                    </div>
                    <div class="w-70 my-3">
                        <h3 class="text-sm my-1">Apple iPhone 6 Dual Core IOS Mobile Phone 4.7'   IPS 1GB RAM 16/64/128GB ROM 4G LTE </h3>
                        <span class="text-xs my-0 text-grey">by Apple</span>

                        <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                            <span class="text-orange mt-2">
                                                                ★

                                     </span>
                            <span class=" mt-2">
                                                                ★

                                     </span>

                        </div>

                        <div>
                            <p class="text-base font-semibold text-red  mt-2 ">US $100 - $150</p>
                        </div>
                    </div>



                </div>

                <div class="flex bg-white rounded w-70 mx-5 m-3 mb-4 p-2 border-1 border-solid border-grey-light">
                    <div class="w-30 mx-auto text-center mx-3 my-2">
                        <img src="{{asset('img/51YXG1bDM5L._AC_UL436_.jpg')}}" class="w-40 ">
                    </div>
                    <div class="w-70 my-3">
                        <h3 class="text-sm my-1">Apple iPhone 6 Dual Core IOS Mobile Phone 4.7'   IPS 1GB RAM 16/64/128GB ROM 4G LTE </h3>
                        <span class="text-xs my-0 text-grey">by Apple</span>

                        <div class="flex">
                        <span class="text-orange mt-2">
                                                                ★
                                            ★
                                     </span>

                            <span class="text-orange mt-2">
                                                                ★

                                     </span>
                            <span class=" mt-2">
                                                                ★

                                     </span>

                        </div>

                        <div>
                            <p class="text-base font-semibold text-red  mt-2 ">US $100 - $150</p>
                        </div>
                    </div>



                </div>

            </div>

        </div>

    </div>


@endsection
