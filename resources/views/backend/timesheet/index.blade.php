@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Timesheet</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Timesheet</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">View Log Hours</h5>
                            <form class="row g-3" action="{{ route('timesheet.store') }}" method="POST">
                                @csrf
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Users</label>
                                    <select class="form-control form-select" name="user_id">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}" {{isset($selected_user) == true ? $selected_user == $item->id ? 'selected' : '' : ''}}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label for="inputNanme4" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="{{$value = $selected_date ?? ""}}" value="" />
                                </div>

                                <div class="col-md-2 mt-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
                            <!-- Column Chart -->
                            @isset($timelagged)
                                <div id="columnChart"></div>
                            @endisset


                            <!-- End Column Chart -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <script>
        var daterange = <?php echo json_encode($daterange_array); ?>;
        var assign_task_time = <?php echo json_encode($assign_task_time); ?>;
        var time_taken = <?php echo json_encode($time_taken); ?>;
        // console.log(assign_task_time, time_taken);
        document.addEventListener("DOMContentLoaded", (convertMinsToHrsMins) => {


            new ApexCharts(document.querySelector("#columnChart"), {
                series: [{
                    name: 'Total Time',
                    data: [840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840,
                        840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840, 840,
                        840, 840
                    ]
                }, {
                    name: 'Assigned Time',
                    data: assign_task_time
                }, {
                    name: 'Time Taken',
                    data: time_taken
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: daterange,
                },
                yaxis: {
                    title: {
                        text: 'minutes'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return +val + " hours";
                            convertMinsToHrsMins(val);
                        }
                    }
                }
            }).render();
        });

        function convertMinsToHrsMins(minutes) {
            var h = Math.floor(minutes / 60);
            var m = minutes % 60;
            h = h < 10 ? '0' + h : h;
            m = m < 10 ? '0' + m : m;
            console.log(h + ':' + m);
            return h + ':' + m;
        }
    </script>
@endsection
