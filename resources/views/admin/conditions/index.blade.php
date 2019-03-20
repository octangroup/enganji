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
            </div><br>

            @foreach($conditions as $condition)

                <div class="list-group-item">
                    <div class="row">
                        <div class="col-md-10">
                            {{__($condition->name)}}
                        </div>
                        <div>
                            <button data-toggle="#mod-condition-{{$condition->id}}" class="btn btn-success toggler">Modify</button>
                            <button class="btn btn-danger " data-toggle="modal" data-target="#delete-Modal-{{$condition->id}}">Delete</button>
                        </div>

                    </div>
                    <div class="modal fade" id="delete-Modal-{{$condition->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a  href="{{action('Admin\ConditionsController@destroy',[$condition->id])}}" class="btn btn-primary">yes</a>
                                </div>
                            </div>
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
