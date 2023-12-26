@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Client</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Client</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Client</h5>
                            <form class="row g-3" method="POST" action="{{ route('clients.store') }}">
                                @csrf
                                <div class="col-12 col-lg-4">
                                    <label for="inputNanme4" class="form-label">Client Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{old('email')}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Other Phone</label>
                                    <input type="number" class="form-control @error('phone2') is-invalid @enderror"
                                        id="phone" name="phone2" value="{{old('phone2')}}">
                                    @error('phone2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Business Name</label>
                                    <input type="text" class="form-control @error('business_name') is-invalid @enderror"
                                        id="phone" name="business_name" value="{{old('business_name')}}">
                                    @error('business_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Business Address</label>
                                    <input type="text"
                                        class="form-control @error('business_address') is-invalid @enderror"
                                        name="business_address" id="phone" value="{{old('business_address')}}">
                                    @error('business_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">GST Number</label>
                                    <input type="text" class="form-control @error('gst_no') is-invalid @enderror"
                                        id="phone" name="gst_no" value="{{old('gst_no')}}">
                                    @error('gst_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Lead Source</label>
                                    <select class="form-control @error('lead_source') is-invalid @enderror form-select"
                                        name="lead_source">
                                        <option value="im" {{ old('lead_source') == 'im' ? 'selected' : '' }}>IM</option>
                                        <option value="jd" {{ old('lead_source') == 'jd' ? 'selected' : '' }}>JD</option>
                                        <option value="google" {{ old('lead_source') == 'google' ? 'selected' : '' }}>Google
                                        </option>
                                        <option value="refrence" {{ old('lead_source') == 'refrence' ? 'selected' : '' }}>
                                            Reference</option>
                                        <option value="other" {{ old('lead_source') == 'other' ? 'selected' : '' }}>Others
                                        </option>
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="phone" class="form-label">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror form-select"
                                        name="status">
                                        <option value="hot" {{ old('status') == 'hot' ? 'selected' : '' }}>Hot
                                        </option>
                                        <option value="cold" {{ old('status') == 'cold' ? 'selected' : '' }}>Cold
                                        </option>
                                        <option value="dormant" {{ old('status') == 'imdormant' ? 'selected' : '' }}>
                                            Dormant</option>
                                        <option value="won" {{ old('status') == 'won' ? 'selected' : '' }}>Won
                                        </option>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Manage Client</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Business</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        {{-- <th scope="col">Projects</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $item)
                                        <tr>
                                            <td>{{$count++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->business_name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->status}}</td>
                                            {{-- <td>{{$item->business_name}}</td> --}}
                                            <td><a href="{{route('clients.edit', $item->id)}}" class="btn btn-warning btn-sm">Manage</a></td>
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
