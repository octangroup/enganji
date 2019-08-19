<product-form
    :categories="{{$categories}}"
    :brands="{{$brands}}"
    :product="{{$product ?? new \App\Models\Product()}}"
    :conditions="{{$conditions}}"
    :currencies="{{$currencies}}"
></product-form>
