@extends('admin.layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-info">
            {{Session::get('message')}}
        </div>
        @endif

        <div class="card">
    @if(count($affiliates))
    @foreach($affiliates as $affiliate)
        <div class="list-group-item">
            <div class="row">
                <div class="col-md-9">
                    {!! $affiliate->name !!}
                </div>
                <div>
                    @if($affiliate->is_Active())
                        <a class="btn btn-danger" href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}">{{__('Disable')}}</a>
                     @else
                        <a class="btn btn-success" href="{{action('Admin\AffiliatesController@changeStatus',[$affiliate->id])}}" >{{__('Enable')}}</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    @endif
        </div>
    </div>
    @endsection
