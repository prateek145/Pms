@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <p> Task Name - {{$body['task_name'] ?? ''}}</p>
                @if ($body['end_time'] == '')
                    <p>Running</p> 
                @else
                    <p>Stopped</p>
                @endif

                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection