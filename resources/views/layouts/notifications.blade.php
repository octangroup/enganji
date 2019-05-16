@if(Session::has('failure'))
    @foreach(Session::get('failure') as $failure)
        <notification is_danger="true" v-bind:title="'{{$failure['title'] != null  ? $failure['title'] : 'Oops!'}}'"
                      v-bind:message="'{!! $failure['body']!!}'"></notification>
    @endforeach
@endif
@if(Session::has('error'))
    @foreach(Session::get('error') as $error)
        <notification is_danger="true" v-bind:title="'{{$error['title'] != null  ? $error['title'] : 'Oops!'}}'"
                      v-bind:message="'{!! $error['body']!!}'"></notification>
    @endforeach
@endif
@if(Session::has('info'))
    @foreach(Session::get('info') as $info)
        <notification is_info="true" v-bind:title="'{{$info['title'] != null  ? $info['title'] : 'notification'}}'"
                      v-bind:message="'{!! $info['body'] !!}'"></notification>
    @endforeach
@endif
@if(Session::has('success'))
    @foreach(Session::get('success') as $success)
        <notification is_success="true" auto_hide="true" v-bind:title="'{{$success['title'] != null  ? $success['title'] : 'Success'}}'"
                      v-bind:message="'{!! $success['body']!!}'"></notification>
    @endforeach
@endif