@extends('admin.layouts.app',['title'=>'Roles'])
@section('content')
<div class="container">
    <div class="w-100 flex pb-4 border-0 border-b-1 border-solid border-grey">
        <div class="w-70">
            <h1 class="font-normal text-2xl font-primary">Roles</h1>
        </div>
        <div class="w-30 text-right">
            <button data-toggle="#add-post-form"
                    class="btn btn-outline-dark rounded-full px-3 text-sm py-2 font-primary toggler">{{__('ADD NEW')}}</button>
        </div>
    </div>

    <div id="add-post-form" class="card hidden-temp rounded-none border-none shadow">
        <div class="card-body">
            <form action="{{action('Admin\RolesController@store')}}" method="POST" >
                {{ csrf_field() }}
                <div class="col-md-8">
                    <input class="form-control" name="name" type="text" placeholder="name">
                </div>
                <button class="btn btn-success rounded-full uppercase px-3 text-sm mt-2 mr-1">Save</button>

            </form>
        </div>
    </div><br>

    @if(count($roles))
        @foreach($roles as $role)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-md-2">
                        {{$role->name}}
                    </div>
                    <div class="w-30 text-right">
                        <button data-toggle="#mod-post-form{{$role->id}}"
                                class="btn btn-outline-success rounded-full px-3 text-sm py-2 font-primary toggler">{{__('Modify')}}</button>
                    </div>
                    <div class="w-30 text-right">
                        <form method="get" action="{{action('Admin\RolesController@delete',[$role->id])}}">
                            {{csrf_field()}}
                            <button class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary ">{{__('Delete')}}</button>
                        </form>
                    </div>
                </div><br>
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

        @endforeach
    @endif
</div>
    @endsection