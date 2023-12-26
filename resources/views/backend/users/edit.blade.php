@extends('backend.layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Users</h5>
                        <form class="row g-3" action="{{route('users.update', $user->id)}}" method="POST">
                            @method('put')
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label ">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" id="inputNanme4">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" name="email" id="inputEmail4">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" name="phone" id="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Status</label>
                                <select class="form-control form-select @error('status') is-invalid @enderror" name="status">
                                    <option {{$user->status == 1 ? 'selected':""}} value="1">Active</option>
                                    <option {{$user->status == 0 ? 'selected':""}} value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Department</label>
                                <select class="form-control form-select @error('department') is-invalid @enderror" name="department">
                                    <option {{$user->department == 'design' ? 'selected':""}} value="design">Design</option>
                                    <option {{$user->department == 'development' ? 'selected':""}} value="development">Development</option>
                                    <option {{$user->department == 'marketing' ? 'selected':""}} value="marketing">Marketing</option>
                                </select>
                            </div>
                            {{-- <input type="hidden" name="role" value="user"> --}}
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
    
@endsection