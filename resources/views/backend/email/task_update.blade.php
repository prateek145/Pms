@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                {{-- {{dd($body)}} --}}
                <p> Name - {{$body['name'] ?? ''}}</p>
                <p> Previous Status - {{$body['previous_status'] ?? ''}}</p>
                <p> Current Status - {{$body['current_status'] ?? ''}}</p>
                <p> Description - {!!$body['description'] ?? ''!!}</p>


                <h4><a href="{{route('login')}}" target="_blank">Project Management</a></h4>
            </td>
        </tr>
    </table>
</td>
@endsection