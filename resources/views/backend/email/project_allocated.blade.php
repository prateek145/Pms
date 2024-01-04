@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">

        <span class="d-none d-lg-block">Project Management</span>
        <tr>
            <td>
                {{-- {{dd($body)}} --}}
                <h3>Task Details</h3>
                <h4> Project Name - {{$body['name'] ?? ''}}</h4>
                <h4> Project Phone - {{$body['client_phone'] ?? ''}}</h4>
                <h4> Project Name - {{$body['client_email'] ?? ''}}</h4>
                <h4> Project Start Date - {{$body['start_date'] ?? ''}}</h4>
                <h4> Project End Date - {{$body['end_date'] ?? ''}}</h4>
                <h4> Project Status - {{$body['status'] ?? ''}}</h4>
                {{-- <h4> Project Current Status - {{$body['current_status'] ?? ''}}</h4> --}}
                <h4> Project Description - {!!$body['comment'] ?? ''!!}</h4>

                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection