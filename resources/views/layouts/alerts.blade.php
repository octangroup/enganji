@if(Session::has('failure'))
    @foreach(Session::get('failure') as $failure)
        <alert is_danger="true" v-bind:title="'{{$failure['title'] != null  ? $failure['title'] : 'Oops!'}}'"
                      v-bind:message="'{!! $failure['body']!!}'"></alert>
    @endforeach
@endif
@if(Session::has('error'))
    @foreach(Session::get('error') as $error)
        <alert is_danger="true" v-bind:title="'{{$error['title'] != null  ? $error['title'] : 'Oops!'}}'"
                      v-bind:message="'{!! $error['body']!!}'"></alert>
    @endforeach
@endif
@if(Session::has('info'))
    @foreach(Session::get('info') as $info)
        <alert is_info="true" v-bind:title="'{{$info['title'] != null  ? $info['title'] : 'Alert'}}'"
                      v-bind:message="'{!! $info['body'] !!}'"></alert>
    @endforeach
@endif
@if(Session::has('success'))
    @foreach(Session::get('success') as $success)
        <alert is_success="true" auto_hide="true" v-bind:title="'{{$success['title'] != null  ? $success['title'] : 'Success'}}'"
                      v-bind:message="'{!! $success['body']!!}'"></alert>
    @endforeach
@endif