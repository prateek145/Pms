@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <p> Task Name: {{$body['name'] ?? ''}}. </p><br>
    <p>Timer Running </p> <br />
    <p> Do you need more time to complete the task {{$body['name'] ?? ''}}? Create a new task for the same. Also update the satus of the current task with proper status. </p>
    <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
</td>
@endsection