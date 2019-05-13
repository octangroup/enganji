<div class="flex p-4 mb-3 border-1 border-solid border-grey-light w-100 mx-auto rounded-xlg">

    <div class="w-20  text-center">
        @if(($show_product ?? null))
            <div>
                <a href="{{action('ProductsController@show',[$review->product->id,$review->product->stripped_name])}}" class="inherit-color no-underline">
                    <img src="{{$review->product->thumbnail}}" class="m-0 w-80 mt-4">

                    <p class="text-primary my-3">{{$review->product->name}}</p>
                </a>
            </div>

        @else
        <div>
            <img src="{{$review->user->avatar}}" class="rounded-full p-3 m-0 w-55 mt-4">

            <p class="text-dodge-blue m-0 p-0 mt-1">{{$review->user->name}}</p>
        </div>
        @endif
    </div>
    <div class="w-80 p-4 ml-4">
        <p title="0 Star item" class="mb-2 mt-2 m-0 w-auto tooltip">
                                   <span class="text-accent">
                                         @for($j=1;$j<=$review->rating;$j++)
                                           <i class="fi flaticon-star-4"></i>
                                       @endfor
                                       @for($j=1;$j<=(5- $review->rating);$j++)
                                           <i class="fi flaticon-star"></i>
                                       @endfor
                                    </span>
            <span class="pl-4 text-grey text-sm"><i class="far fa-clock"></i> {{$review->created_at->toFormattedDateString()}}</span>
        </p>
        <p class="text-dodge-blue m-0">{{$review->ratingCategory()}}</p>

        <h1 class="text-xl text-grey-dark font-primary">{{$review->title}}</h1>

        <p class="my-1">
            <strong class="text-2xl italic">" </strong> {!! $review->body !!} <strong
                class="text-2xl italic">"</strong>

        </p>


    </div>
</div>
