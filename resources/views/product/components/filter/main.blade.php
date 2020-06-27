<div class=" w-100  p-0 m-0 my-2 px-3 toggler xl:hidden lg:hidden xs:block">
    <i data-toggle="#filter" class="fi flaticon-menu-4 hidden xs:block text-2xl  toggler text-black"></i>
</div>
<div id="filter" class="px-5 py-4 bg-white-smoke xs:hidden-temp rounded-xlg">
    @if($category ?? null)
        <h3 class="text-base font-bold font-primary mx-auto ">{{$category->name}}</h3>
        <div class="py-2 ">
            <div class="ml-3">
                @foreach($category->subcategories as $subcategory)
                    <p class="my-2 text-sm">
                        <a href="{{action('ProductsController@index',[$category->name,$category->id,$subcategory->name,$subcategory->id, http_build_query($attributes->all())])}}">{{$subcategory->name}}</a>
                    </p>
                @endforeach
            </div>
        </div>
    @endif
    <form
        @if($category ?? null)
        action="{{action('ProductsController@index',[$category->name,$category->id,$selected_subcategory->name ?? null,$selected_subcategory->id ?? null])}}"
        @elseif($keyword ?? null)
        action="{{action('ProductsController@search')}}"
        @endif
        onChange="this.form.submit()"
        method="get">

        @if($keyword ?? null)
            <input type="hidden" name="keyword"
                   value="{{$keyword}}">
        @endif

        <input type="hidden" name="sort-by"
               value="{{$attributes->input('sort-by')}}">
        <div class="py-2 ">
            <h3 class="text-base font-bold font-primary">Brand</h3>

        </div>

        @foreach ($brands as $brand)
            <div class="ml-3 flex">
                <p class="font-medium  my-1">
                    <label class="checkcontainer">
                        <input onChange="this.form.submit()" type="checkbox"
                               name="brands[]" value="{{$brand->id}}"
                               @if($attributes['brands'] ?? '' && count($attributess['brands']) > 0)
                                    @if(in_array($brand['id'], $attributes['brands']))
                                        checked
                                    @endif
                                @endif
                               >{{$brand->name}}<br>
                        <span class="checkmark "></span></label>
                </p>
            </div>
        @endforeach

        <div class="py-2">
            <h3 class="text-base font-bold font-primary">Ratings</h3>
            <div class="ml-3 pt-1">
                @for($i = 5;$i>0;$i--)
                    <p class="font-medium my-3">
                        <label class="checkcontainer">
                            <input onChange="this.form.submit()" type="checkbox"
                                   name="ratings[]" value="{{$i}}"
                                   @if($attributes['ratings'] ?? '' && count($attributess['ratings']) > 0)
                                   @if(in_array($i, $attributes['ratings']))
                                   checked
                                @endif
                                @endif
                            >

                            @for($j = 1;$j<=$i;$j++)
                                <span class="text-accent"><i class="fi flaticon-star-4"></i> </span>

                            @endfor
                            @for($k = 1;$k <= 5 - $i;$k++)
                                <span class="text-grey-dark"><i class="fi flaticon-star"></i> </span>
                            @endfor
                            <span class="checkmark "></span></label>
                    </p>
                @endfor
            </div>
        </div>

    </form>
</div>

