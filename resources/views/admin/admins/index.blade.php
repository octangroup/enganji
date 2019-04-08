@extends('admin.layouts.app',['title'=>'Admins'])

@section('content')
<div class="container">
        @if(count($admins))
            @foreach($admins as $admin)
                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>
                                {{$admin->name}}
                            </strong>
                        </div><br>
                        <div class="w-30 text-right">
                            <button data-toggle="#add-post-form{{$admin->id}}"
                                    class="btn btn-outline-dark rounded-full px-3 text-sm py-2 font-primary toggler">{{__('Assign role')}}</button>
                        </div>
                        @if($admin->is_Active())
                            <div class="w-30 text-right">
                                <form action="{{action('Admin\AdminsController@changeStatus',[$admin->id])}}" method="post">
                                    {{csrf_field()}}
                                    <button class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary ">{{__('Deactivate')}}</button>
                                </form>
                            </div>
                        @else
                            <form action="{{action('Admin\AdminsController@changeStatus',[$admin->id])}}" method="post">
                                {{csrf_field()}}
                                <div class="w-30 text-right">
                                    <button class="btn btn-outline-primary rounded-full px-3 text-sm py-2 font-primary ">{{__('Activate')}}</button>
                                </div>
                            </form>
                        @endif
                        <div id="add-post-form{{$admin->id}}" class="card hidden-temp rounded-none border-none shadow">
                            <div class="card-body">
                                <form action="{{action('Admin\AdminsController@addRole',[$admin->id])}}" method="POST" >
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        @if(count($roles))
                                            @foreach($roles as $role)
                                                <p><label class="checkcontainer"> {{$role->name}}
                                                        <input type="checkbox"name="roles[]" value="{{$role->id}}">
                                                        <span class="checkmark"></span>
                                                    </label></p>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button class="btn btn-success rounded-full uppercase px-3 text-sm mt-2 mr-1">Save</button>

                                </form>
                            </div>
                        </div><br>

                    </div><br>
                    @foreach($admin->roles as $role)
                        <div class="row">
                            <div class="col-md-4">
                                {{$role->name}}<br><br>
                            </div>
                            <div class="">
                                <form action="{{action('Admin\AdminsController@deleteRole',['admin_id'=>$admin->id,'role_id'=>$role->id])}}" method="get">
                                    {{csrf_field()}}
                                    <button class="btn btn-outline-danger rounded-full px-3 text-sm py-2 font-primary ">{{__('Delete')}}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
</div>
@endsection