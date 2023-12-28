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
                        <h5 class="card-title">Add Users</h5>
                        <form class="row g-3" action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label ">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" id="inputNanme4">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="inputEmail4">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" name="phone" id="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Status</label>
                                <select class="form-control form-select @error('status') is-invalid @enderror" name="status">
                                    <option value="">Select</option>
                                    <option {{old('status') == 1 ? 'selected':""}} value="1">Active</option>
                                    <option {{old('status') == 0 ? 'selected':""}} value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">Department</label>
                                <select class="form-control form-select @error('department') is-invalid @enderror" name="department">
                                    <option value="">Select</option>
                                    @foreach ($departments as $item)
                                    <option {{old('department') == $item->id ? 'selected':""}} value="{{$item->id}}">{{$item->name}}</option>
                                        
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="role" value="user">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->user_department->name ?? ""}}</td>
                                    <td>{{$item->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td><a href="{{route('users.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a></td>
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