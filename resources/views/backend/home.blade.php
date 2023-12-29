@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div id="layoutSidenav_content">
            <main>
                <div class="calendar">
                    <div class="d-flex justify-content-between m-4">
                        {{-- {{ dd($current_date['formatted']) }} --}}
                        <div>
                            <a href="{{ route('previousmonth.dashboard', $current_date['formatted']) }}"> <button
                                    class="btn btn-primary">previous month</button> </a>
                        </div>
                        <div>
                            <a href="{{ route('nextmonth.dashboard', $current_date['formatted']) }}"> <button
                                    class="btn btn-primary">next month</button> </a>

                        </div>
                    </div>
                    <h3 class="text-center">{{ $currentmonth . ' ' . $current_year }}

                        <ul class="month oct">
                            @for ($i = 1; $i < $daysinmonth + 1; $i++)
                                <li
                                    class="date-{{ $i }} date {{ $current_day == $i && date('m') == $current_month && date('Y') == $current_year ? 'active' : '' }}">
                                    <h5>{{ $i }}</h5>
                                    <a href="{{ route('task.list', $current_year . '-' . $current_month . '-' . $i) }}">
                                        <ul class="remind">
                                        </ul>
                                    </a>
                                </li>
                            @endfor


                        </ul>

                </div>
            </main>

        </div>

    </main><!-- End #main -->
@endsection
