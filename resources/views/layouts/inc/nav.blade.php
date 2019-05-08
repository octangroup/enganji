<nav class="w-90 mx-auto rounded-b-xlg -mt-3  mb-4 py-4 bg-white-smoke ">
    <div class="w-90 mx-auto flex flex-wrap">
        <ul class="w-50 list my-0   text-black-dark">
            <li class=" my-0 ">
                <a href="{{action('HomeController@index')}}"
                   class="font-primary font-medium text-3xl inherit-color no-underline">
                    {{env('APP_NAME')}}
                </a>
            </li>
        </ul>
        <ul class="w-50 list my-0 text-right text-black-dark">
            <li class="text-xl mt-0 pt-0 w-60 mr-4 inline-block font-primary font-medium">
                <form class="flex my-0">
                    <div class="flex-90">
                        <input type="search" name=""
                               class="text-right text-black-dark bg-transparent focus:shadow-none font-medium form-input border-none border-none p-0 m-0"
                               placeholder="Search">
                    </div>
                    <div class="flex-10 text-right p-0">
                        <button type="submit"
                                class="btn bg-transparent shadow-none py-0 m-0 appearance-none -mt-1 hover:text-primary focus:text-primary">
                            <i
                                class="fi flaticon-search  text-xl leading-0"></i></button>
                    </div>
                </form>
            </li>
            <li class="text-xl  mt-0 pt-2 mr-4 inline-block font-primary font-medium">
                <a href="{{action('WishListController@index')}}" class="inherit-color no-underline">
                    <i class="fi flaticon-like-1"></i>
                </a>
            </li>
            <li class="text-xl  mt-0 pt-2 mr-4 inline-block font-primary font-medium">
                <a href="{{action('CartController@index')}}"  class="inherit-color no-underline">
                    <i class="fi flaticon-shopping-cart"></i>
                </a>
            </li>
            <li class="text-xl  mt-0 pt-2  inline-block font-primary font-medium">
                <i class="fi flaticon-user"></i>
            </li>
        </ul>
        <ul class="list w-100 text-center text-black-dark   text-sm">
            @foreach(\App\Category::get()->take(6) as $category)
                <li class="inline-block mx-3"><a
                        href="{{action('ProductsController@index',[$category->stripped_name,$category->id])}}"
                        class="inherit-color text-sm font-primary font-medium  no-underline">{{__($category->name)}}</a>
                </li>
            @endforeach
            <li class="inline-block mx-3"><a

                    class=" text-sm font-primary font-medium text-accent no-underline">Deals</a></li>

        </ul>
    </div>

</nav>
