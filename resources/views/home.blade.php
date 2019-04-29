
{{--@extends('layouts.app')--}}
{{--@section('content')--}}

    {{--<div class="w-60 mx-auto">--}}
        {{--<form method="GET" action="{{action('ProductsController@search')}}">--}}
            {{--<input type="text" name="keyword" class="form-control">--}}
            {{--<button type="submit">search</button>--}}
        {{--</form>--}}
    {{--</div>--}}

    {{--<div class="card-body">--}}
        {{--<form method="GET" action="{{action('ProductsController@filter')}}">--}}
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
                        {{--href="{{action('ProductController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'newest', http_build_query($attributes->only( 'min', 'max', 'brands','conditions'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductController@search',['keyword'=>$attributes->keyword,'sort-by'=>'newest', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif--}}
                {{-->Newest</a>--}}
            {{--</li>--}}

            {{--<li class="mx-2 pr-3 border-solid border-0 border-r-1 border-grey">--}}
                {{--<a--}}
                        {{--@if($category ?? null)--}}
                        {{--href="{{action('ProductController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-asc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-asc', http_build_query($attributes->only('ratings', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif >Price:--}}
                    {{--Low to High</a>--}}
            {{--</li>--}}
            {{--<li class="mx-2">--}}
                {{--<a--}}
                        {{--@if($category ?? null)--}}
                        {{--href="{{action('ProductController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@else--}}
                        {{--href="{{action('ProductController@search',['keyword'=>$attributes->keyword,'sort-by'=>'price-desc', http_build_query($attributes->only('conditions', 'min', 'max', 'brands'))])}}"--}}
                        {{--@endif >Price:--}}
                    {{--High to Low</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--@foreach($products as $product)--}}
        {{--<div class="card-default">--}}

                {{--<a href="{{action('ProductsController@show',[$product->id])}}">{{$product->name}}</a><br>--}}
                {{--{{$product->thumbnail()}}<br>--}}
                {{--{{$product->price}}--}}
        {{--</div><br>--}}
    {{--@endforeach--}}
{{--@endsection--}}

@extends('layouts.app')
@section('content')



    {{--<div class="w-60 mx-auto">--}}
        {{--<form method="GET" action="{{action('ProductsController@index')}}">--}}
            {{--<input type="text" name="keyword" class="form-control">--}}
            {{--<button type="submit">search</button>--}}
        {{--</form>--}}
    {{--</div><br>--}}

    <div class="">
        <div class=" w-100">
            <div class=" w-100  h-px-400 ">
                <img src="{{asset('img/873620de-ee5b-47b8-a411-18aace61543b1552928480621-Mango_DesktopSlider.jpg')}}" class="clip-full">
            </div>
        </div>
            <div class="w-100 bg-white pt-3 pb-3">
                <div class="w-90 xs:w-85 mx-auto">
                    <p class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-bold text-black">Top Deals</p>
                </div>

                <div class="flex w-90 mx-auto border-top border-bottom  p-2 relative whitespace-no-wrap overflow-hidden px-3">
            @foreach($deals as $deal)

                        <div class="w-25  border-right    rounded   ">
                            <div class=" w-100 py-3 relative z-50 bg-white  px-3  ">

                            <a href="{{action('ProductsController@show',[$deal->id,kebab_case($deal->product->name)])}}">
                                <img class="w-70" src="{{$deal->product->thumbnail()}}">
                            </a>
                        </div>
                        <div class=" pt-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                            <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $deal->product->name !!}</h2>
                            <p class="text-lg xs:text-base md:text-sm lg:text-base mt-2 xs:mb-2">Price:{{$deal->product->price}}</p>
                        </div>
                        </div>

            @endforeach
                </div>
            </div>


    @if($products && count($products))
        <div class="w-100 bg-white-smoke pt-3 pb-3">
            <div class="w-90 xs:w-85 mx-auto">
                <p class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-bold text-black">Trending Products</p>
            </div>

            <div class="flex w-90 pb-3 mx-auto pt-2  relative whitespace-no-wrap overflow-hidden px-3">
                @foreach($products as $product)

                    <div class="w-20 bg-white   mx-2 rounded  shadow">
                        <div class=" w-100 text-center relative z-50 bg-white  px-2  ">

                            <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                                <img class="w-70" src="{{$product->thumbnail()}}" >
                            </a>
                        </div>
                        <div class="py-1  my-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                            <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                            <p class="text-lg xs:text-base md:text-sm lg:text-base mt-2 xs:mb-2">{{$product->price}}</p>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        @endif


        @if($products && count($products))
            <div class="w-100 bg-white pt-3 pb-3">
                <div class="w-90 xs:w-85 mx-auto">
                    <p class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-bold text-black">Top Categories</p>
                </div>

                <div class="flex w-90 pb-3 mx-auto pt-3  relative whitespace-no-wrap overflow-hidden px-3">
                    @foreach($products as $product)

                        <div class="w-25  mx-3 rounded p-3 ">
                            <div class=" w-100 py-3 relative z-50 bg-white  px-3  ">

                                <a href="{{action('ProductsController@show',[$product->id,kebab_case($product->name)])}}">
                                    <img class="w-70" src="{{$product->thumbnail()}}">
                                </a>
                            </div>
                            <div class="py-1 pt-3 z-50 relative bg-white  overflow-hidden  px-3 ">
                                <h2 class="text-sm font-bold sm:text-sm md:text-base lg:text-xl xs:text-sm m-0 p-0 whitespace-no-wrap overflow-hidden">{!! $product->name !!}</h2>
                                <p class="text-lg xs:text-base md:text-sm lg:text-base mt-2 xs:mb-2">{{$product->price}}</p>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        @endif

    </div>
@endsection

