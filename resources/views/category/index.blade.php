@extends('layouts.app')
@section('content')

    <div class="w-90 mx-auto">

        <div class="w-100 mx-auto px-2 mt-2 flex">
            <div class="w-25 ml-50">
                {{$categories->count()}} {{__('Categories')}}<br>
            </div>

            <div class="">
                @foreach($categories as $category)
                    <div class="w-25 xs:w-100 mx-3 bg-blue my-5 xs:my-2 rounded-xlg inline-block ">
                        <div class="text-center text-white">
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