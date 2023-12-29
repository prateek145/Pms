@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Project</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Project</h5>
                            <form class="row g-3" id="form1" action="{{ route('projects.update', $project->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @method('put')
                                @csrf
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Project Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="inputNanme4" value="{{ $project->name ?? '' }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Client</label>
                                    <select class="form-control @error('client_name') is-invalid @enderror form-select"
                                        name="client_name">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $project->client_name == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Contact Phone</label>
                                    <input type="number" class="form-control @error('client_phone') is-invalid @enderror"
                                        id="phone" name="client_phone" value="{{ $project->client_phone ?? '' }}">
                                    @error('client_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="inputEmail4" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control @error('client_email') is-invalid @enderror"
                                        id="inputEmail4" name="client_email" value="{{ $project->client_email ?? '' }}">
                                    @error('client_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Sales Person</label>
                                    <select class="form-control @error('sales_person') is-invalid @enderror form-select"
                                        name="sales_person">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $project->sales_person == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('sales_person')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Project Cost</label>
                                    <input type="text" class="form-control @error('cost') is-invalid @enderror"
                                        id="phone" name="cost" value="{{ $project->client_email ?? '' }}">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="phone" name="start_date" value="{{ $project->start_date ?? '' }}">
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="phone" name="end_date" value="{{ $project->end_date ?? '' }}">
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Phases</label>
                                    <input type="number" name="phase"
                                        class="form-control @error('phase') is-invalid @enderror" id="phone"
                                        value="{{ $project->phase ?? '' }}">
                                    @error('phase')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Allocate Users</label>
                                    <select class="form-control @error('allocated_user') is-invalid @enderror form-select"
                                        name="allocated_user">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $project->allocated_user == $item->id ? 'selected' : '' }}>
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
                                    <select class="form-control @error('status') is-invalid @enderror form-select"
                                        name="status">
                                        <option value="initate" {{ $project->status == 'initate' ? 'selected' : '' }}>
                                            Initate</option>
                                        <option value="ongoing" {{ $project->status == 'ongoing' ? 'selected' : '' }}>
                                            OnGoing</option>
                                        <option value="pause" {{ $project->status == 'pause' ? 'selected' : '' }}>Pause
                                        </option>
                                        <option value="complete" {{ $project->status == 'complete' ? 'selected' : '' }}>
                                            Complete</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @php
                                    $images = json_decode($project->file);
                                    // dd($images);
                                @endphp

                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Images</label>

                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        name="file[]" multiple>
                                    @foreach ($images as $key => $item)
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ asset('public/uploads/projects/' . $item) }}"
                                                target="_blank">Click
                                                Here</a>

                                            @if (auth()->user()->role == 'admin')
                                                <a href="{{ url('projects/' . $project->id . '/' . $key) }}">
                                                    <input type="button" class="btn btn-danger btn-sm" value="X"
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
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Scope & Comment</label>
                                    <textarea class="form-control @error('comment') is-invalid @enderror form-text" name="comment" id="editor1">{{ $project->comment ?? '' }}</textarea>
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                @if (auth()->user()->role == 'admin')
                                    <div class="text-center">
                                        <input type="submit" onclick="submitform()" class="btn btn-primary"
                                            value="Submit">
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <script>
        function submitform() {
            // console.log('prateek');
            document.getElementById('form1').submit();
        }
    </script>
@endsection