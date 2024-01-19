@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p> Created By - {{$body['user_name'] ?? ''}}</p>
                <p> Created On - {{$body['start_date'] ?? ''}}</p>
                <h4> Project Name - {{$body['project_name'] ?? ''}}</h4>
                <p> Task Name - {{$body['name'] ?? ''}}</p>
                <p> Start time - {{$body['start_time'] ?? ''}}</p>
                <p> Duration  - {{second_hours(strtotime($body['end_time']) - strtotime($body['start_time'])) ?? 'Contact to Developer'}}</p>
                <p> Task Description - {!!$body['description'] ?? ''!!}</p>


                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection