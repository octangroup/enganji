@extends('affiliate.layouts.app')
@section('content')
    <div class="container  xs:w-100">
        <div class="py-4 mb-3 w-100 xs:mx-auto border-0 border-b-1 border-solid border-grey-light">
            <h1 class="font-normal text-2xl font-primary">{{$product->name}}</h1>
        </div>
        <div class="card rounded-lg border-1 border-solid border-grey-light ">
            <div class="card-body">
                <h4>Add Pictures</h4>
                <div>
                    <div class="w-100">
                        <form id="dropzone-form" method="post"
                              action={{action('Affiliate\ProductsController@addPictures',[$product->id])}}
                              class="dropzone"
                        >
                            {{csrf_field()}}
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
            <div>
                <picture-list :pictures="{{$media}}" :product="{{$product}}"></picture-list>
            </div>
            <div class="py-3 px-4 text-right">
                <a class="btn btn-success"
                   href="{{action('Affiliate\ProductsController@edit',[$product->id])}}">Finish</a>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script>

        // "myAwesomeDropzone" is the camelized version of the HTML element's ID
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2
        };
    </script>
@endsection
