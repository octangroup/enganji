<div id="review-form"
     class="w-100 my-5 border-1 bg-white rounded border-grey border-solid hidden-temp">
    <div class="xl:flex md:flex lg:flex">
        <div class="w-30 xs:w-100 px-3 border-0 border-solid border-grey border-r-1">
            <div class="h-100 py-5"><img
                    src="{{asset($product->getFirstMediaUrl())}}" class="">
                <p class="text-dodge-blue text-xl text-center">{{$product->name}}</p>
            </div>
        </div>
        <div class="w-70 xs:w-100">
            <form action="{{action('ReviewController@store',[$product->id])}}"
                  method="post">
                {{csrf_field()}}
                <div class="flex  p-0 m-0">
                    <p class="w-20">
                        <img src="{{Auth::user()->avatar}}"
                             class="rounded-full p-3 m-0">
                    </p>
                    <div class="w-80 my-auto px-2 text-left w-auto tooltip">
                        <p> Rate this product?
                            <star-rating></star-rating>
                        </p>
                    </div>
                </div>
                <input type="text" name="title" placeholder="Title"
                       class="form-input text-sm mx-auto w-80 mb-3">

                <textarea name="body" placeholder="Write your review.."
                          class="form-input mx-auto text-sm w-80 resize-y"></textarea>

                <div class="w-80 flex mx-auto text-right py-3">
                    <button data-toggle="#review-form"
                            type="button"
                            class="btn toggler my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">
                        cancel
                    </button>
                    &nbsp &nbsp &nbsp


                    <button
                        class="btn my-3 mx-auto bg-transparent border-1 border-solid text-blue-light border-blue-light rounded-full">
                        submit
                    </button>


                </div>
            </form>
        </div>
    </div>
</div>
