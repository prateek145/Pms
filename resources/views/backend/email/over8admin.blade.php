@extends('backend.email.layout.app')
@section('content')
<td class="wrapper">
    Hi Admin<br />
    <p> List of users who have not end task at 8 pm.</p>
    @foreach ($body as $item)
        {{$item->name}}<br/>
    @endforeach
</td>
@endsection