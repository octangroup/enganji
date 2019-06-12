@if(Auth::guard('admin')->check())
    <div class="mx-5 my-3 xl:hidden lg:hidden">
        <button data-toggle="#nav-mobile"
                class=" text-black xl:hidden bg-transparent toggler border-0 ">
            <i class="fi flaticon-menu text-black text-2xl md:text-3xl"></i>

        </button>
    </div>
    <div class="w-100 mx-auto flex">
        <div class="bg-transparent  mt-2 my-4 w-80">
            @if($has_search ?? null)
                <form name="search_form" action="{{$search_url ?? null}}" method="get" class="w-50 mx-auto text-right text-center mt-2">
                    <div
                        class=" mx-auto text-center border-1 border-solid border-grey-light rounded-full flex">
                        <div class="w-10 flex align-items-center justify-content-center">
                            <i class="fi flaticon-search text-xl text-base "></i>
                        </div>
                        <div class="w-90">
                            <input name="keyword" type="text" placeholder="Search...."
                                   class="bg-white appearance-none  rounded-full px-3 outline-none border-none py-2 m-0 w-100">
                        </div>
                    </div>
                </form>
            @endif
        </div>
        <div class="w-20 flex align-items-center justify-content-end py-4">
            <div class="w-100 flex align-content-end">
                <p class="my-0"><i class="fi flaticon-user-2"></i></p>
                <div class="my-0 ml-3 cursor-pointer dropdown z-999">
                    <p class="my-0 font-primary font-medium">{{ \Illuminate\Support\Str::title(Auth::guard('admin')->user()->name) }}
                        <i class="ml-2 -mt-1 fas fa-angle-down"></i></p>
                    <div class="dropdown-content w-rem-74 mx-0 -ml-10 -mt-1 md:-ml-8 text-left font-roboto font-normal shadow
                               border-2 border-solid border-white cursor-pointer z-999 absolute">
                        <div class="w-100 absolute -t-2">
                            <div class="bg-white h-10 w-rem-10 shadow rotate-45deg mx-auto">

                            </div>
                        </div>
                        <div class="relative bg-white">
                            <p class="text-center text-xs bg-grey-lighter py-2">My Account</p>
                            <p><a href="{{ route('admin.logout') }}"
                                  class="hover:bg-grey-lightest px-4 text-sm"
                                  onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();">
                                    <i class="fi flaticon-login mr-2 text-base"></i>
                                    Sign out
                                </a>
                            </p>

                        </div>
                    </div>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="w-90 mx-auto p-4">
        <img src="{{asset('img/logo.svg')}}" class="w-rem-24">
    </div>
@endif

