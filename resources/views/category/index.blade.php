@extends('layouts.app')
@section('content')

    <div class="w-90 mx-auto">

        <div class="w-100 mx-auto px-2 mt-2 xl:flex">
            <div class="w-100 font-bold font-primary ml-50">
                {{$categories->count()}} {{__('Categories')}}<br>
            </div>

            <div class="bg-white-smoke w-100 border-1  rounded-xlg mt-3 border-solid border-grey-lighter">
                @foreach($categories as $category)
                    <div class="border-0 border-b-1 py-3 border-solid border-grey-lighter">
                        <div class="mx-4 my-2 font-primary text-white">
                            <a href="{{action('CategoryController@show',[$category->id])}}">
                        {{$category->name}}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection