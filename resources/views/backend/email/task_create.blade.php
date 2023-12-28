@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

        <span class="d-none d-lg-block">Project Management</span>
        <tr>
            <td>
                <h3>Task Details</h3>
                <h3> Task Name - {{$body['name'] ?? ''}}</h3>
                <h3> Task Timing - {{$body['start_time'] ?? '' . '-' . $body['end_time'] ?? ''}}</h3>
                <h4> Task Name - {!!$body['description'] ?? ''!!}</h4>


                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection