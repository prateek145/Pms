@extends('backend.layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Department</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Department</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Add Department</h5>
                            <form class="row g-3" action="{{ route('departments.store') }}" method="POST">
                                @csrf
                                <div class="col-6">
                                    <label for="inputNanme4" class="form-label ">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <label for="inputNanme4" class="form-label ">Show in Sales Person</label><br>
                                    <input type="checkbox" {{old('sales_person') == '1' ? 'selected' : ''}} id="vehicle1" name="sales_person" value="1">
                                    <label for="sales_person"> Yes</label><br>

                                </div>


                                <div class="col-6">
                                    <label for="phone" class="form-label">Status</label>
                                    <select class="form-control form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="" selected>Select</option>
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Inactive</option>
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
                            <h5 class="card-title">Manage Users</h5>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Show in Sales Person</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $item)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->sales_person == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td><a href="{{ route('departments.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a></td>
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

    <script>
        function client_details(value) {
            if (value) {
                $.ajax({
                    url: "{{ route('client.details') }}",
                    method: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        "client_id": value
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            var gst_no = document.getElementsByName('gst_no')[0];
                            gst_no.value = response.data.gst_no;

                            var phone = document.getElementsByName('phone')[0];
                            phone.value = response.data.phone;

                            var phone2 = document.getElementsByName('phone2')[0];
                            phone2.value = response.data.phone2;
                            
                        }
    
                    }
                });
                
            }
        }
    </script>
@endsection
