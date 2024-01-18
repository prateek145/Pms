@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <p> Hi {{$body['name'] ?? 'User'}} Have you completed the tasks. </p>
    <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
</td>
@endsection