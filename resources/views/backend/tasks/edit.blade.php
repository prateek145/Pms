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
                            <h5 class="card-title">Manage Task</h5>

                            @if (auth()->user()->role == 'admin')
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label for="inputNanme4" class="form-label">Task Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="inputNanme4" value="{{ $task->name }}">
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="inputNanme4" class="form-label">Task Schedule</label>
                                            <select class="form-control form-select @error('schedule') is-invalid @enderror"
                                                name="schedule" onchange="recurring(this.value)">
                                                <option value="recurring"
                                                    {{ $task->schedule == 'recurring' ? 'selected' : '' }}>
                                                    Recurring</option>
                                                <option value="one_time"
                                                    {{ $task->schedule == 'one_time' ? 'selected' : '' }}>
                                                    One
                                                    Time</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="inputNanme4" class="form-label">Project</label>
                                            <select class="form-control form-select @error('project') is-invalid @enderror"
                                                name="project">
                                                <option value="">Select</option>
                                                @foreach ($projects as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $task->project == $item->id ? 'selected' : '' }}>
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

                                    </div>

                                    <div class="row">

                                        <div class="col-12 col-lg-4">
                                            <label for="phone" class="form-label">Allocate</label>
                                            <select
                                                class="form-control form-select @error('allocated_user') is-invalid @enderror"
                                                name="allocated_user">
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $task->allocated_user == $item->id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="phone" class="form-label">Status</label>
                                            <select class="form-control form-select @error('status') is-invalid @enderror"
                                                name="status">
                                                <option value="cancel" {{ $task->status == 'cancel' ? 'selected' : '' }}>
                                                    Canccel
                                                </option>
                                                <option value="confirm" {{ $task->status == 'confirm' ? 'selected' : '' }}>
                                                    Confirm
                                                </option>
                                                <option value="pause" {{ $task->status == 'pause' ? 'selected' : '' }}>
                                                    Pause
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
                                            <input type="date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                name="start_date" value="{{ $task->start_date ?? '' }}" />

                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-lg-3">
                                            <!--SHOW IF Recurring-->
                                            <label for="inputNanme4" class="form-label">End Date</label>
                                            <input type="date"
                                                class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                                value="{{ $task->end_date ?? '' }}" />

                                            @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3">
                                            <!--SHOW IF Recurring-->
                                            <label for="inputNanme4" class="form-label">Date Selection</label>
                                            @if ($task->schedule == 'recurring')
                                                <div class="datebox">
                                                    <div>
                                                        <input type="date" id="date" onchange="adddates(this.value)"
                                                            class="form-control" />
                                                    </div>

                                                    <div style="width:100%">
                                                        <select name="dates[]" id="dates" size="5"
                                                            class="form-control @error('dates') is-invalid @enderror"
                                                            multiple>
                                                            @foreach (json_decode($task->dates) as $item)
                                                                <option value="{{ $item }}" selected>
                                                                    {{ $item }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('dates')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-12 col-lg-3">
                                            <!--SHOW IF Recurring-->
                                            <label for="inputNanme4" class="form-label">Start Time</label>
                                            <input type="time"
                                                class="form-control @error('start_time') is-invalid @enderror"
                                                name="start_time" min="10:00:00" max="19:00:00"
                                                value="{{ $task->start_time ?? '' }}" />

                                            @error('start_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12 col-lg-3">
                                            <!--SHOW IF Recurring-->
                                            <label for="inputNanme4" class="form-label">End Time</label>
                                            <input type="time"
                                                class="form-control @error('end_time') is-invalid @enderror"
                                                name="end_time" min="10:00:00" max="19:00:00"
                                                value="{{ $task->end_time ?? '' }}" />

                                            @error('end_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 col-lg-4">
                                            <label for="phone" class="form-label">Priority</label>
                                            <select
                                                class="form-control form-select @error('priority') is-invalid @enderror"
                                                name="priority">
                                                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>
                                                    High
                                                </option>
                                                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>
                                                    Low
                                                </option>
                                                <option value="moderate"
                                                    {{ $task->priority == 'moderate' ? 'selected' : '' }}>
                                                    Moderate</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4">
                                            <label for="phone" class="form-label">Task Type</label>
                                            <select
                                                class="form-control form-select @error('task_type') is-invalid @enderror"
                                                name="task_type">
                                                <option value="billable"
                                                    {{ $task->task_type == 'moderate' ? 'selected' : '' }}>
                                                    Billable</option>
                                                <option value="non_billable"
                                                    {{ $task->task_type == 'moderate' ? 'selected' : '' }}>Non Billable
                                                </option>
                                            </select>
                                        </div>

                                        @php
                                            $images = json_decode($task->file);
                                            // dd($images);
                                        @endphp

                                        <div class="col-12 col-lg-4">
                                            <label for="phone" class="form-label">Images</label>
                                            <input type="file"
                                                class="form-control @error('file') is-invalid @enderror" name="file[]"
                                                multiple>
                                            @if ($images != null)
                                                @foreach ($images as $key => $item)
                                                    <div class="d-flex justify-content-between">
                                                        <a href="{{ asset('public/uploads/tasks/' . $item) }}"
                                                            target="_blank">Click
                                                            Here</a>

                                                        @if (auth()->user()->role == 'admin')
                                                            <a href="{{ url('tasks/' . $task->id . '/' . $key) }}">
                                                                <input type="button" class="btn btn-danger btn-sm"
                                                                    value="X"
                                                                    onclick="return confirm('Are You Sure ?')">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <br />
                                                @endforeach

                                                @error('file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-12 col-lg-12">
                                        <label for="phone" class="form-label">Task Description</label>
                                        <!-- Quill Editor Full -->
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="editor1">{!!$task->description!!}</textarea>
                                    </div>
                                    <!-- End Quill Editor Full -->
                                    <input type="submit" value="Submit" class="btn btn-primary mt-5">
                                </form>
                            @endif


                            @if (auth()->user()->role != 'admin')
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="inputNanme4" class="form-label">Task Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="inputNanme4" value="{{ $task->name }}" disabled>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="inputNanme4" class="form-label">Task Schedule</label>
                                        <select class="form-control form-select @error('schedule') is-invalid @enderror"
                                            name="schedule" onchange="recurring(this.value)" disabled>
                                            <option value="recurring"
                                                {{ $task->schedule == 'recurring' ? 'selected' : '' }}>
                                                Recurring</option>
                                            <option value="one_time"
                                                {{ $task->schedule == 'one_time' ? 'selected' : '' }}>
                                                One
                                                Time</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <!--SHOW IF Recurring-->
                                        <label for="inputNanme4" class="form-label">Recurring Type</label>
                                        <select
                                            class="form-control form-select @error('recurring_type') is-invalid @enderror"
                                            name="recurring_type" disabled>
                                            <option value="daily"
                                                {{ $task->recurring_type == 'daily' ? 'selected' : '' }}>
                                                Daily</option>
                                            <option value="alternate_days"
                                                {{ $task->recurring_type == 'alternate_days' ? 'selected' : '' }}>Alternate
                                                Days
                                            </option>
                                            <option value="weeky"
                                                {{ $task->recurring_type == 'weeky' ? 'selected' : '' }}>
                                                Weekly</option>
                                            <option value="twice_a_week"
                                                {{ $task->recurring_type == 'twice_a_week' ? 'selected' : '' }}>Twice a
                                                Week
                                            </option>
                                            <option value="monthly"
                                                {{ $task->recurring_type == 'monthly' ? 'selected' : '' }}>
                                                Monthly</option>
                                            <option value="twice_a_month"
                                                {{ $task->recurring_type == 'twice_a_month' ? 'selected' : '' }}>Twice a
                                                Month
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="inputNanme4" class="form-label">Project</label>
                                        <input type="text" class="form-control @error('project') is-invalid @enderror"
                                            id="inputNanme4" value="{{ $task->project }}" name="project" disabled>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="phone" class="form-label">Allocate</label>
                                        <select
                                            class="form-control form-select @error('allocated_user') is-invalid @enderror"
                                            name="allocated_user" disabled>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $task->allocated_user == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="phone" class="form-label">Status</label>
                                        <select class="form-control form-select @error('status') is-invalid @enderror"
                                            name="status" disabled>
                                            <option value="cancel" {{ $task->status == 'cancel' ? 'selected' : '' }}>
                                                Canccel
                                            </option>
                                            <option value="confirm" {{ $task->status == 'confirm' ? 'selected' : '' }}>
                                                Confirm
                                            </option>
                                            <option value="pause" {{ $task->status == 'pause' ? 'selected' : '' }}>Pause
                                            </option>
                                        </select>

                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg-3">
                                        <!--SHOW IF Recurring-->
                                        <label for="inputNanme4" class="form-label">Start Date</label>
                                        <input type="date"
                                            class="form-control @error('start_date') is-invalid @enderror"
                                            name="start_date" value="{{ $task->start_date ?? '' }}" disabled />

                                        @error('start_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <!--SHOW IF Recurring-->
                                        <label for="inputNanme4" class="form-label">End Date</label>
                                        <input type="date"
                                            class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                            value="{{ $task->end_date ?? '' }}" disabled />

                                        @error('end_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <!--SHOW IF Recurring-->
                                        <label for="inputNanme4" class="form-label">Start Time</label>
                                        <input type="time"
                                            class="form-control @error('start_time') is-invalid @enderror"
                                            name="start_time" value="{{ $task->start_time ?? '' }}" disabled />

                                        @error('start_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-lg-3">
                                        <!--SHOW IF Recurring-->
                                        <label for="inputNanme4" class="form-label">End Time</label>
                                        <input type="time"
                                            class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                                            value="{{ $task->end_time ?? '' }}" disabled />

                                        @error('end_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label for="phone" class="form-label">Priority</label>
                                        <select class="form-control form-select @error('priority') is-invalid @enderror"
                                            name="priority" disabled>
                                            <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High
                                            </option>
                                            <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low
                                            </option>
                                            <option value="moderate"
                                                {{ $task->priority == 'moderate' ? 'selected' : '' }}>
                                                Moderate</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <label for="phone" class="form-label">Task Type</label>
                                        <select class="form-control form-select @error('task_type') is-invalid @enderror"
                                            name="task_type" disabled>
                                            <option value="billable"
                                                {{ $task->task_type == 'moderate' ? 'selected' : '' }}>
                                                Billable</option>
                                            <option value="non_billable"
                                                {{ $task->task_type == 'moderate' ? 'selected' : '' }}>Non Billable
                                            </option>
                                        </select>
                                    </div>

                                    @php
                                        $images = json_decode($task->file);
                                        // dd($images);
                                    @endphp

                                    <div class="col-12 col-lg-4">
                                        <label for="phone" class="form-label">Images</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file[]" multiple disabled>
                                        @if ($images != null)
                                            @foreach ($images as $key => $item)
                                                <div class="d-flex justify-content-between">
                                                    <a href="{{ asset('public/uploads/tasks/' . $item) }}"
                                                        target="_blank">Click
                                                        Here</a>

                                                    @if (auth()->user()->role == 'admin')
                                                        <a href="{{ url('tasks/' . $task->id . '/' . $key) }}">
                                                            <input type="button" class="btn btn-danger btn-sm"
                                                                value="X" onclick="return confirm('Are You Sure ?')">
                                                        </a>
                                                    @endif
                                                </div>
                                                <br />
                                            @endforeach
                                        @endif

                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <label for="phone" class="form-label">Task Description</label>
                                    <!-- Quill Editor Full -->
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" disabled>{!!$task->description!!}</textarea>
                                </div>
                                <form class="row g-3" action="{{ route('tasks.update', $task->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="col-12 col-lg-6">
                                        <label for="phone" class="form-label">Status</label>
                                        <select class="form-control form-select @error('status') is-invalid @enderror"
                                            name="status">
                                            <option {{ $task->status == 'ongoing' ? 'selected' : '' }} value="ongoing">
                                                Ongoing
                                            </option>
                                            <option {{ $task->status == 'cancel' ? 'selected' : '' }} value="cancel">
                                                Cancel
                                            </option>
                                            <option {{ $task->status == 'confirm' ? 'selected' : '' }} value="confirm">
                                                Confirm
                                            </option>
                                            <option {{ $task->status == 'pause' ? 'selected' : '' }} value="pause">Pause
                                            </option>
                                            <option {{ $task->status == 'complete' ? 'selected' : '' }} value="complete">
                                                Complete</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label for="inputEmail4" class="form-label">Files</label>
                                        <input type="file" class="form-control @error('file') is-invalid @enderror"
                                            name="file[]" id="inputEmail4" multiple>

                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <label for="inputEmail4" class="form-label">Task Comments</label>
                                        <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="editor1"></textarea>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="text-start">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                    <div class="container col-12 col-lg-6">
                                        <div id="buttons" class="mt-5 d-flex">
                                            <button type="button" class="btn btn-success start_btn" id="start"><i
                                                    class="bi bi-play-circle"
                                                    onclick="create_logged({{ $task->id }})"></i> Start</button>
                                            </button> <button type="button" id="stop"
                                                class="btn btn-warning stop_btn"><i class="bi bi-pause"
                                                    onclick="update_logged({{ $task->id }})"></i> Stop</button>
                                            {{-- <button type="button" class="btn btn-info" id="reset"><i
                                                    class="bi bi-bootstrap-reboot"></i></button> --}}
                                            <input type="hidden" name="tasklagged_id">
                                        </div>
                                    </div>

                                </form>
                            @endif
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Task Files</h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">File</th>
                                                <th scope="col">Upload Date</th>
                                                <th scope="col">Upload By</th>
                                                <th scope="col">Comment</th>
                                                <th scope="col">Previous Status</th>
                                                <th scope="col">Current Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taskfiles as $item)
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    @if (isset($item->file))
                                                        <td>
                                                            @foreach (json_decode($item->file) as $item1)
                                                                <a href="{{ asset('public/uploads/taskfiles/' . $item1) }}"
                                                                    target="_blank">Attachment</a>
                                                            @endforeach
                                                        </td>
                                                    @else
                                                        <td>No Attachment</td>
                                                    @endif
                                                    <td>{{ $item->created_at->format('d-m-y') }}</td>
                                                    <td>{{ $item->taskfile_user->name }}</td>
                                                    <td>{!! $item->comment !!}</td>
                                                    <td>{{ $item->previous_status }}</td>
                                                    <td>{{ $item->current_status }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Time Logged {{ $totalduration }}</h5>
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Start Time</th>
                                                <th scope="col">End Time</th>
                                                <th scope="col">Duration</th>
                                                <th scope="col">User</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($taskloggeds as $item)
                                                <tr>
                                                    <td>{{ $count1++ }}</td>
                                                    <td>{{ $item->created_at->format('d-m-y') }}</td>
                                                    <td>{{ date('H:i:s', strtotime($item->start_time)) }}</td>
                                                    <td>{{ $item->end_time == '' ? '' : date('H:i:s', strtotime($item->end_time)) }}
                                                    </td>

                                                    <td>{{ $item->duration == '' ? '' : gmdate('H:i:s', $item->duration) }}
                                                    </td>
                                                    <td>{{ $item->timelagged_user->name }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            </div>
        </section>
    </main><!-- End #main -->
    <script>
        var schedule = "{{ $task->schedule }}";
        var authrole = "{{ auth()->user()->role }}";
        var authuser = "{{ auth()->user() }}";
        var taskid = "{{ $task->id }}";
        // console.log(authuser, 'prateek');
        if (authrole != 'admin') {
            $.ajax({
                url: "{{ route('check.timelagged') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "task_id": taskid
                },
                success: function(response) {
                    if (response.result == 'success') {
                        console.log(response.show);
                        if (response.show == false) {
                            document.getElementsByClassName('start_btn')[0].style.display = 'block';
                            document.getElementsByClassName('stop_btn')[0].style.display = 'none';

                        }

                        if (response.show == true) {
                            document.getElementsByClassName('start_btn')[0].style.display = 'none';
                            document.getElementsByClassName('stop_btn')[0].style.display = 'block';


                        }
                    }

                }
            });
        }

        if (schedule == 'recurring' && authrole == 'admin') {
            document.getElementsByName('end_date')[0].style.display = 'block';
            document.getElementsByClassName('datebox')[0].style.display = 'block';
            var dateboxes = document.getElementsByClassName('datebox')[0];

        }
        if (schedule == 'one_time' && authrole == 'admin') {
            document.getElementsByName('end_date')[0].style.display = 'none';
            document.getElementsByName('end_date')[0].value = "";
            // document.getElementsByClassName('datebox')[0].style.display = 'none';
            // document.getElementsByName('dates[]')[0].innerHTML = "";

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


        function recurring(value) {
            console.log(value);
            if (value == 'recurring') {
                document.getElementsByName('recurring_type')[0].disabled = false;
                document.getElementsByName('end_date')[0].disabled = false;

            } else {
                document.getElementsByName('recurring_type')[0].disabled = true;
                document.getElementsByName('end_date')[0].disabled = true;
            }
        }

        function create_logged(id) {
            $.ajax({
                url: "{{ route('timelagged.store') }}",
                method: "POST",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "task_id": id
                },
                success: function(response) {
                    // console.log(response);
                    if (response.result == 'success') {
                        document.getElementsByClassName('start_btn')[0].style.display = 'none';
                        document.getElementsByClassName('stop_btn')[0].style.display = 'block';

                        document.getElementsByName('tasklagged_id')[0].value = response.tasklagged_id
                    }

                }
            });
        }

        function update_logged(id) {
            // alert('alkjndslansd');
            var tasklagged_id = document.getElementsByName('tasklagged_id')[0].value;
            $.ajax({
                url: "{{ route('timelagged.update', 1) }}",
                method: "put",
                data: {
                    '_token': "{{ csrf_token() }}",
                    "task_id": id,
                    "tasklagged_id": tasklagged_id
                },
                success: function(response) {
                    if (response.result == 'success') {
                        document.getElementsByClassName('stop_btn')[0].style.display = 'none';
                        location.reload();
                    }

                }
            });
        }
    </script>
@endsection
