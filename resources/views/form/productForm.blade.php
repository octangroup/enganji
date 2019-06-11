<product-form
    :categories="{{$categories}}"
    :brands="{{$brands}}"
    :product="{{$product ?? new \App\Product()}}"
    :conditions="{{$conditions}}"
    :currencies="{{$currencies}}"
></product-form>
