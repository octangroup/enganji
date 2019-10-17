@extends('layouts.app')
@section('content')

    <div class="w-90 mx-auto">

        <div class="w-100 mx-auto px-2 mt-2 xl:flex">
            <div class="w-100 font-bold font-primary ml-50">
                {{$categories->count()}} {{__('Categories')}}<br>
            </div>

            <div class="bg-white-smoke w-100 border-1  rounded-xlg mt-3 border-solid border-grey-lighter">
                <ul class="list w-100 h-100 overflow-scroll p-4 lg:my-3  text-left text-black-dark   text-sm relative">
                    @foreach($categories as $category)
                        <li class="mx-3 w-100 my-3" ><a
                                href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                                class="inherit-color text-sm font-primary font-medium  no-underline font-bold">{{__($category->name)}}</a>
                            <ul>
                                @foreach($category->subcategories as $subcategory)
                                    <li class="mx-3 my-3"><a
                                            href="{{action('ProductsController@index',[$category->stripped_name,$category->id,$subcategory->stripped_name,$subcategory->id])}}"
                                            class="inherit-color text-sm font-primary font-medium  no-underline">{{__($subcategory->name)}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>

@endsection
