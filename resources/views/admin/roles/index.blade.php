@extends('admin.layouts.app',['title'=>'Roles'])
@section('content')
<div class="container">
    {{--<div class="bg-transparent  w-100  ">--}}

        {{--<form name="search_form" method="get"  class="flex my-4">--}}
            {{--<div class="w-50 mx-auto  py-2 ">--}}
                {{--<input name="keyword" type="text" placeholder="Search...."--}}
                       {{--class="bg-white-smoke appearance-none rounded-full px-5 outline-none border-none p-2 m-0 w-100">--}}
            {{--</div>--}}



        {{--</form>--}}
    {{--</div>--}}
    <div class="w-80 mx-auto  pb-4  ">
        <div class="inline-block">
            <h1 class="font-normal text-2xl font-primary">Roles</h1>
        </div>
        <div class="inline-block mx-3">
            <button data-toggle="#add-post-form"
                    class="btn btn-primary text-sm  rounded-full mx-2 border-0 toggler">{{__('ADD NEW')}}</button>
        </div>
    </div>

    <div id="add-post-form" class="card hidden-temp rounded-none border-none shadow">
        <div class="">
            <form action="{{action('Admin\RolesController@store')}}" method="POST flex" >
                {{ csrf_field() }}
                <div class="">
                    <input class="inline-block" name="name" type="text" placeholder="name">
                    <button class="btn inline-block btn-success rounded-full uppercase px-3 text-sm mt-2 mr-1">Save</button>
                </div>





            </form>
        </div>
    </div><br>

    @if(count($roles))
        @foreach($roles as $role)
            <div class=" w-80 xs:w-100 mx-auto xl:mt-3">
            <div class="  xs:mx-0 bg-white border-1 border-solid border-grey-light rounded-xlg w-100 mb-4 p-2 py-5">
                <div class="flex">
                    <div class="w-60 xs:mx-2 font-primary font-bold mx-5">
                        <p class="my-0 capitalize">{{$role->name}}</p>
                    </div>




                    <div class=" w-40 text-right xs:mr-2 mr-3">
                        <button data-toggle="#mod-post-form{{$role->id}}"
                                class="btn btn-outline-success rounded-xlg px-3 text-sm py-2 font-primary toggler">{{__('Modify')}}
                        </button>


                        <a  href="{{action('Admin\RolesController@delete',[$role->id])}}">
                            <button class="btn btn-outline-danger rounded-xlg px-3 text-sm py-2 font-primary ">{{__('Delete')}}</button>
                        </a>
                    </div>
                </div>
                <br>
            </div>
            <div id="mod-post-form{{$role->id}}" class="card hidden-temp rounded-none border-none shadow">
                <div class="card-body">
                    <form action="{{action('Admin\RolesController@update',[$role->id])}}" method="POST" >
                        {{ csrf_field() }}
                        <div class="col-md-8">
                            <input class="form-control" name="name" type="text" value="{{$role->name}}">
                        </div>
                        <button class="btn btn-success rounded-full uppercase px-3 text-sm mt-2 mr-1">Save</button>

                    </form>
                </div>
            </div><br>
            </div>
        @endforeach
    @endif

</div>
    @endsection