<div class="border-1 border-solid border-grey-light rounded-xlg p-4 py-5">
    <div class="row flex flex-wrap ">
        <div class="w-50 px-3">
            <label>Name: </label>
            <input class="form-input {{ $errors->has('name') ? 'is-invalid' : ''}} "
                   name="name" placeholder="Name"
                   value="{{old('name') ?? $product->name ?? null}}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name')}}</strong></span>
            @endif
        </div>
        <div class="w-50 px-3">
            <label>Quantity: </label>
            <input class="form-input {{ $errors->has('quantity') ? 'is-invalid' : ''}} "
                   name="quantity" placeholder="Quantity" type="number"
                   value="{{old('quantity') ?? $product->quantity ?? null}}" required>
            @if ($errors->has('quantity'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('quantity')}}</strong></span>
            @endif
        </div>
        <div class="w-50 px-3  mt-3">
            <label>Sub-category</label>
            <select class="form-input" name="subcategory_id">
                @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}"
                            @if((int)(old('subcategory_id')  ?? $book->subcategory_id ?? null) === $subcategory->id)
                            selected
                        @endif
                    >{{$subcategory->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-50 px-3  mt-3">
            <label>Brand</label>
            <select class="form-input" name="brand_id">
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}"
                            @if((int)(old('category_id')  ?? $product->brand_id ?? null) === $brand->id)
                            selected
                        @endif
                    >{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-50 px-3  mt-3">
            <label>Condition</label>
            <select class="form-input" name="condition_id">
                @foreach($conditions as $condition)
                    <option value="{{$condition->id}}"
                            @if((int)(old('$condition_id')  ?? $product->condition_id ?? null) === $condition->id)
                            selected
                        @endif
                    >{{$condition->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-50 px-3  mt-3">
            <label>Currency</label>
            <select class="form-input" name="currency_id">
                @foreach($currencies as $currency)
                    <option value="{{$currency->id}}"
                            @if((int)(old('$currency_id')  ?? $product->currency_id ?? null) === $currency->id)
                            selected
                        @endif
                    >{{$currency->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-50 px-3">
            <label>Price: </label>
            <input class="form-input {{ $errors->has('price') ? 'is-invalid' : ''}} "
                   name="price" placeholder="Price"
                   value="{{old('price') ?? $product->price ?? null}}" required>
            @if ($errors->has('price'))
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('price') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="w-50 px-3">
            <label>Color: </label>
            <input class="form-input {{ $errors->has('color') ? 'is-invalid' : ''}} "
                   name="color" placeholder="Color"
                   value="{{old('code') ?? $product->color ?? null}}" required>
            @if ($errors->has('color'))
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('color') }}</strong>
                                    </span>
            @endif
        </div>
        <div class="w-50 px-3">
            <label>Size: </label>
            <input class="form-input {{ $errors->has('size') ? 'is-invalid' : ''}} "
                   name="size" placeholder="Size"
                   value="{{old('size') ?? $product->size ?? null}}" required>
            @if ($errors->has('size'))
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('size') }}</strong>
                                    </span>
            @endif
        </div>

        {{--<div class="w-50 px-3  mt-3">--}}
        {{--<label>Product Cover</label>--}}
        {{--@if(($prct ?? null) && $product->cover())--}}
        {{--<div class="w-50 my-3">--}}
        {{--<img class="w-100" src="{{$product->cover()}}">--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--<input type="file" name="fileToUpload" class="w-100" id="fileToUpload">--}}
        {{--</div>--}}

    </div>
    <div class="w-50 px-3">
        <label>Description: </label>
        <input class="form-input {{ $errors->has('description') ? 'is-invalid' : ''}} "
               name="description" placeholder="Description"
               value="{{old('description') ?? $product->description ?? null}}" required>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                    </span>
        @endif
    </div>

    <button class="btn btn-success mt-2 mx-3 rounded-lg">Save</button>
</div>


