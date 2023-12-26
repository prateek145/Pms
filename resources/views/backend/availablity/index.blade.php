@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Availability</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Availability</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Current Availability</h5>
                            <form class="row g-3" action="{{ route('availablity.store') }}" method="POST">
                                @csrf
                                <div class="col-12 col-lg-3">
                                    <label for="inputNanme4" class="form-label">Users</label>
                                    <select class="form-control form-select" name="user_id">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-2">
                                    <label for="inputNanme4" class="form-label">Date</label>
                                    <input type="date" class="form-control" name="date" required />
                                </div>

                                {{-- <div class="col-12 col-lg-2">
                                    <label for="inputNanme4" class="form-label">Start Time</label>
                                    <input type="time" class="form-control" name="start_time"
                                        required />
                                </div>

                                <div class="col-12 col-lg-2">
                                    <label for="inputNanme4" class="form-label">Start Date</label>
                                    <input type="time" class="form-control" name="end_time"
                                        required />
                                </div> --}}

                                <div class="col-12 col-lg-1 mt-5">
                                    {{-- <label for="inputNanme4" class="form-label">Start Date</label> --}}
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>

                            </form>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <!-- Column Chart -->
                                    @if (isset($data))
                                        <div id="columnChart"></div>
                                    @endif
                                </div>

                                @isset($data)
                                <div class="col-md-6 float-right">
                                    <h3>Reserved Timings</h3> <br>
                                    @foreach ($data1 as $item)
                                        Start Time : {{ $item->start_time }}<br>
                                        End Time : {{ $item->end_time }}<br>
                                    @endforeach
                                </div>
                                    
                                @endisset


                            </div>




                            <!-- End Column Chart -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
    <script>
        var btime = "{{ $busy_time }}";
        var ftime = "{{ $free_time }}";
        // console.log(typeof(btime), typeof(ftime));
        if (btime != null && ftime != null) {
            var options = {
                series: [parseInt(btime), parseInt(ftime)],
                chart: {
                    width: 380,
                    type: 'pie',
                },
                labels: ['Busy', 'Free'],
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#columnChart"), options);
            chart.render();

        }
    </script>
@endsection
