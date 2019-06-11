<div class="flex xs:block sm:block bg-white w-100 mb-4 p-3  border-1 border-grey-light border-solid rounded-xlg">
    <div class="w-30 xs:w-100 md:w-60 sm:w-60 mx-auto text-center xl:p-3 xl:py-2">
        <a class="inherit-color no-underline"
           href="{{action('ProductsController@show',[$product->id,$product->stripped_name])}}">
            <img class="w-80 xs:w-100 sm:w-100" src="{{$product->thumbnail()}}">
        </a>
    </div>
    <div class="{{($right_section ?? null) ? 'w-50' : 'w-70'}} p-3">
        <a class="inherit-color no-underline"
           href="{{action('ProductsController@show',[$product->id,$product->stripped_name])}}">
            <h3 class="text-2xl font-primary my-1">{{$product->name}} </h3>
        </a>

        <span class="text-xs my-0 text-grey-darker">by {{$product->affiliate->name}}</span>

        <div class=" pt-1 text-accent text-sm">
           <span class="text-accent">
               @for($j=1;$j<=$product->rating;$j++)
                   <i class="fi flaticon-star-4"></i>
               @endfor
               @for($j=1;$j<=(5- $product->rating);$j++)
                   <i class="fi flaticon-star"></i>
               @endfor
            </span>
        </div>
        {!! $slot !!}
        <div class="my-3">
            <p class="text-lg font-primary font-medium text-accent md:text-sm lg:text-base my-0">{{$product->currency->name}} {{$product->price}}</p>
        </div>
    </div>
    @if($right_section ?? null)
        <div class="w-20 p-3">
            {!! $right_section !!}
        </div>
    @endif

</div>
