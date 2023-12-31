@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tasks</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tasks</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Tasks</h5>
                            <form class="row g-3" action="{{ route('tasks.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Task Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="inputNanme4" name="name" value="{{ old('name') ?? '' }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Task Schedule</label>
                                    <select class="form-control form-select @error('schedule') is-invalid @enderror"
                                        name="schedule" onchange="recurring(this.value)">
                                        <option value="">Select</option>
                                        <option value="recurring" {{ old('schedule') == 'recurring' ? 'selected' : '' }}>
                                            Recurring
                                        </option>

                                        <option value="one_time" {{ old('schedule') == 'one_time' ? 'selected' : '' }}>
                                            One Time</option>



                                    </select>

                                    @error('schedule')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Project</label>
                                    <select class="form-control form-select @error('project') is-invalid @enderror"
                                        name="project">
                                        <option value="">Select</option>
                                        @foreach ($projects as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('project') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('project')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Allocate</label>
                                    <select class="form-control form-select @error('allocated_user') is-invalid @enderror"
                                        name="allocated_user">
                                        <option value="">Select</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('allocated_user') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('allocated_user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Status</label>

                                    <select class="form-control form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="">Select</option>
                                        <option value="cancel" {{ old('status') == 'cancel' ? 'selected' : '' }}>
                                            Cancel
                                        </option>
                                        <option value="confirm" {{ old('status') == 'confirm' ? 'selected' : '' }}>
                                            Confirm
                                        </option>
                                        <option value="pause" {{ old('status') == 'pause' ? 'selected' : '' }}>Pause
                                        </option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-3">
                                    <!--SHOW IF Recurring-->
                                    <label for="inputNanme4" class="form-label">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" min="<?php echo date('Y-m-d'); ?>" value="{{ old('start_date') }}" />

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-3">
                                    <!--SHOW IF Recurring-->
                                    <label for="inputNanme4" class="form-label">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" onblur="datelist(this.value)"
                                        value="{{ old('end_date') ?? '' }}" />

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-3">
                                    <!--SHOW IF Recurring-->
                                    <label for="inputNanme4" class="form-label">Date Selection</label>
                                    <div class="datebox">
                                        <div>
                                            <input type="date" id="date" onchange="adddates(this.value)"
                                                class="form-control" />
                                        </div>

                                        <div style="width:100%">
                                            <select name="dates[]" id="dates" size="5"
                                                class="form-control @error('dates') is-invalid @enderror" multiple>
                                            </select>
                                        </div>
                                        @error('dates')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <!--SHOW IF Recurring-->
                                    <label for="inputNanme4" class="form-label">Start Time</label>
                                    <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                        name="start_time" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" min="10:00:00" max="19:00:00" value="{{ date('h:i') }}" />

                                    @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-3">
                                    <!--SHOW IF Recurring-->
                                    <label for="inputNanme4" class="form-label">End Time</label>
                                    <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                        name="end_time" onchange="check_hours(this.value)" min="10:00:00" max="19:00:00"
                                        value="{{ old('end_time') }}" />

                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Priority</label>
                                    <select class="form-control form-select @error('priority') is-invalid @enderror"
                                        name="priority">
                                        <option value="">Select</option>
                                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High
                                        </option>
                                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low
                                        </option>
                                        <option value="moderate" {{ old('priority') == 'moderate' ? 'selected' : '' }}>
                                            Moderate</option>
                                    </select>
                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Task Type</label>
                                    <select class="form-control form-select @error('task_type') is-invalid @enderror"
                                        name="task_type">
                                        <option value="">Select</option>
                                        <option value="billable" {{ old('task_type') == 'billable' ? 'selected' : '' }}>
                                            Billable</option>
                                        <option value="non_billable"
                                            {{ old('task_type') == 'non_billable' ? 'selected' : '' }}>Non Billable
                                        </option>
                                    </select>
                                    @error('task_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-12 col-lg-4">
                                    <label for="inputEmail4" class="form-label">Files</label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        name="file[]" id="inputEmail4" multiple>
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-12 mb-5">
                                    <label for="phone" class="form-label">Task Description</label>
                                    <!-- Quill Editor Full -->
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor1"
                                        cols="30" rows="5">{{ old('description') ?? '' }}</textarea>

                                </div>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!-- End Quill Editor Full -->
                        </div>
                        <div class="col-12 col-lg-12 mt-5">
                            <div class="text-start">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                        </form>
                    </div>
                </div>
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Tasks</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tasks</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Allocate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Start Date</th>
                                    {{-- <th scope="col">Logged Hrs</th> --}}
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $item)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->task_project->name ?? '' }}</td>
                                        <td>{{ $item->task_user->name ?? '' }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->start_date }}</td>

                                        <td><a href="{{ route('tasks.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Manage</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

    <script>
        function recurring(value) {
            // console.log(value);
            if (value == 'recurring') {
                document.getElementsByName('end_date')[0].style.display = 'block';
                document.getElementsByClassName('datebox')[0].style.display = 'block';

            } else {
                document.getElementsByName('end_date')[0].style.display = 'none';
                document.getElementsByName('end_date')[0].value = "";
                document.getElementsByClassName('datebox')[0].style.display = 'none';
                // console.log(document.getElementsByName('dates[]')[0]);
                document.getElementsByName('dates[]')[0].innerHTML = "";

            }
        }

        var schedule = document.getElementsByName('schedule')[0].value;
        if (schedule == 'recurring') {
            document.getElementsByName('end_date')[0].style.display = 'block';
            document.getElementsByClassName('datebox')[0].style.display = 'block';
        }
        if (schedule == 'one_time') {
            document.getElementsByName('end_date')[0].style.display = 'none';
            document.getElementsByName('end_date')[0].value = "";
            document.getElementsByClassName('datebox')[0].style.display = 'none';
            document.getElementsByName('dates[]')[0].innerHTML = "";

        }

        function datelist(end_date) {
            var start_date = document.getElementsByName('start_date')[0].value;
            var date = document.getElementById('date');
            date.setAttribute('min', start_date);
            date.setAttribute('max', end_date);
        }

        function check_hours(end_time) {
            var start = document.getElementsByName('start_time')[0].value;
            var endtime = document.getElementsByName('end_time')[0].value;
            // console.log(start, end_time);

            let time1 = start;
            let time2 = end_time;

            // given a time value as a string in 24 hour format
            // create a Date object using an arbitrary date part,
            // specified time and UTC timezone

            let date1 = new Date(`2000-01-01T${time1}Z`);
            let date2 = new Date(`2000-01-01T${time2}Z`);

            // the following is to handle cases where the times are on the opposite side of
            // midnight e.g. when you want to get the difference between 9:00 PM and 5:00 AM

            if (date2 < date1) {
                date2.setDate(date2.getDate() + 1);
            }

            let diff = date2 - date1;
            var ms = diff,
                min = Math.floor((ms / 1000 / 60) << 0),
                sec = Math.floor((ms / 1000) % 60);

            console.log(min);
            if (min > 240) {
                alert('Time Duration Exceeded(Duration Limit - 4hrs) ');
                document.getElementsByName('start_time')[0].value = "";
                document.getElementsByName('end_time')[0].value = "";
                // console.log(start, end_time);
            }

        }

        function adddates(value) {
            // console.log(value);
            var box = document.getElementById('dates');
            var option = document.createElement('option');
            option.value = value;
            option.text = value;
            option.selected = true;
            box.appendChild(option);
        }
    </script>
@endsection
