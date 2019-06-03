@if(Auth::guard('admin')->check())
    <div class="mx-5 my-3 xl:hidden lg:hidden">
        <button data-toggle="#nav-mobile"
                class=" text-black xl:hidden bg-transparent toggler border-0 ">
            <i class="fi flaticon-menu text-black text-2xl md:text-3xl"></i>

        </button>
    </div>
    <div class="w-100 mx-auto flex">
        <div class="bg-transparent  mt-2 my-4 w-80">
            <form name="search_form" method="get" class="w-60 mx-auto text-right text-center ">
                <div
                    class=" mx-auto text-center border-1 border-solid border-grey-light rounded-full  py-2 ">
                    <input name="keyword" type="text" placeholder="Search...."
                           class="bg-white appearance-none  rounded-full px-3 outline-none border-none  m-0 w-100">
                </div>
            </form>
        </div>
        <div class="w-20 flex align-items-center justify-content-end">
            <div class="w-100 flex align-content-end">
                <p class="my-0">{{ \Illuminate\Support\Str::title(Auth::guard('admin')->user()->name) }}</p>
                <div class="my-0 ml-3 cursor-pointer">
                    <a href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fi flaticon-login"></i>
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
