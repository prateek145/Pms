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
                    @if (auth()->user()->role == 'admin')
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Project</h5>
                            <form class="row g-3" action="{{route('projects.store')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Project Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="inputNanme4">
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
                                        @foreach ($clients as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                            
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
                                        id="phone" name="client_phone">
                                    @error('client_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="inputEmail4" class="form-label">Contact Email</label>
                                    <input type="email" class="form-control @error('client_email') is-invalid @enderror"
                                        id="inputEmail4" name="client_email">
                                    @error('client_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Sales Person</label>
                                    <select class="form-control @error('sales_person') is-invalid @enderror form-select" name="sales_person">
                                        @foreach ($sales_users as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                            
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
                                        id="phone" name="cost">
                                    @error('cost')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Start Date</label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        id="phone" name="start_date">
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">End Date</label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        id="phone" name="end_date">
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Phases</label>
                                    <input type="number" name="phase" class="form-control @error('phase') is-invalid @enderror"
                                        id="phone">
                                    @error('phase')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Allocate Users</label>
                                    <select class="form-control @error('allocated_user') is-invalid @enderror form-select" name="allocated_user">
                                        @foreach ($users as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                            
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
                                    <select class="form-control @error('status') is-invalid @enderror form-select" name="status">
                                        <option>Initate</option>
                                        <option>OnGoing</option>
                                        <option>Pause</option>
                                        <option>Complete</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Project Files</label>
                                    <input type="file" name="file[]" class="form-control @error('file') is-invalid @enderror"
                                        name="file" multiple>

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Scope & Comment</label>
                                    <textarea class="form-control @error('comment') is-invalid @enderror form-text" name="comment"></textarea>
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                    @endif
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Projects</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Project</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">End</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Alocated</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $item)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->start_date}}</td>
                                            <td>{{$item->end_date}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>{{$item->project_allocated_user->name}}</td>
                                            <td><a href="{{route('projects.edit', $item->id)}}" class="btn btn-warning btn-sm">Manage</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
