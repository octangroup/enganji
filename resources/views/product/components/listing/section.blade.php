@if($products && count($products))
    <div class="w-100  pt-3 pb-3 px-2">
        @if($title ?? null)
            <div class="w-90 xs:w-85 mx-auto">
                <h3 class="text-2xl font-primary text-left sm:text-base md:text-base xs:text-base  xl:py-1 font-medium text-black">
                    {{$title}}</h3>
            </div>
        @endif
        <div class="w-90 pb-3 mx-auto pt-2  relative whitespace-no-wrap overflow-hidden px-3">
            @foreach($products as $product)
                @component('product.components.listing.card',['product'=>$product])
                @endcomponent
            @endforeach
        </div>
    </div>

@endif
