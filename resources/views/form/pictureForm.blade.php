@extends('affiliate.layouts.app')
@section('content')

    <div class="container  xs:w-100">
        <div class="py-4 mb-3 w-100 xs:mx-auto border-0 border-b-1 border-solid border-grey-light">
            <h1 class="font-normal text-2xl font-primary">Add Products</h1>
        </div>
        <div class="card rounded-none border-none shadow">
            <div class="card-body">
                <div class="row ">
                    <form method="POST" action={{action('Affiliate\ProductsController@addPictures',[$product->id])}} enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-5">
                            <label>Pictures</label>
                            <input class="mt-2 w-100" type="file" name="files[]" multiple>
                            <button class="btn btn-success">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
