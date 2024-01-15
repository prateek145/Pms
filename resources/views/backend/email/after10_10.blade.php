@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <p> Hi "User" you have not create any task since morning, please create tasks for the day. </p>
    <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
</td>
@endsection