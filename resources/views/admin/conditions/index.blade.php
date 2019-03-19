@extends('admin.layouts.app')
@section('content')

    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-info">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{__('Add Condition')}}
                <button data-toggle="#add-post-form" class="btn btn-primary toggler">{{__('Add')}}</button>
            </div>

            <div id="add-post-form" class="card-body hidden-temp">
                <form id="condition-root" action="{{action('Admin\ConditionsController@store')}}" method="POST" >

                    {{ csrf_field() }}
                    <div class="row">

                        <div class="col-md-5">
                            <div>

                                <label>Name</label>

                                <input type="text" name="name" class="form-control">

                            </div>

                        </div>

                    </div>
                    <button class="btn btn-success"> save</button>

                </form>
            </div>

            @foreach($conditions as $condition)

                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-10">
                            {{__($condition->name)}}
                        </div>
                        <div>
                            <button data-toggle="#mod-condition-{{$condition->id}}" class="btn btn-success toggler">Modify</button>
                            <a class="btn btn-danger " href="{{action('Admin\ConditionsController@destroy',[$condition->id])}}">Delete</a>
                        </div>

                    </div>



                    <div id="mod-condition-{{$condition->id}}" class="hidden-temp">
                        <form  action="{{action('Admin\ConditionsController@update',[$condition->id])}}" method="POST" >
                            {{ csrf_field() }}
                            @method('put')



                            <div class="row">


                                <div class="col-md-5">
                                    <div>

                                        <input type="text" name="name" value="{{$condition->name}}" class="form-control">

                                    </div>

                                </div>
                                <button class="btn btn-primary">save</button>
                            </div>



                        </form>
                    </div>


                </div>

            @endforeach

        </div>

    </div>
@endsection
