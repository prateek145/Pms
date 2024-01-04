@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

        <span class="d-none d-lg-block">Project Management</span>
        <tr>
            <td>
                {{-- {{dd($body)}} --}}
                <h3>Task Details</h3>
                <h4> Task Name - {{$body['name'] ?? ''}}</h4>
                <h4> Task Start time - {{$body['start_time'] ?? ''}}</h4>
                <h4> Task End time - {{$body['end_time'] ?? ''}}</h4>
                <h4> Task Previous Status - {{$body['previous_status'] ?? ''}}</h4>
                <h4> Task Current Status - {{$body['current_status'] ?? ''}}</h4>
                <h4> Task Description - {!!$body['description'] ?? ''!!}</h4>


                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection