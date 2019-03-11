@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
    @if(count($affiliates))
    @foreach($affiliates as $affiliate)
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-9">
                    {!! $affiliate->name !!}
                </div>
                <div>
                    @if($affiliate->status === 1) <form action="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}"
                                                        method="post">{{csrf_field()}}
                        <button class="btn btn-danger ">Disable</button></form> @else
                        <form action="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}"
                              method="post">{{csrf_field()}}
                            <button class="btn btn-success ">Enable</button></form>@endif
                </div>
            </div>
        </div>
    @endforeach
    @endif
        </div>
    </div>
    @endsection
