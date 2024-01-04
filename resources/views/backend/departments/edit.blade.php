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
                            <h5 class="card-title">Edit Department</h5>
                            <form class="row g-3" action="{{ route('departments.update', $department->id) }}" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-6">
                                    <label for="inputNanme4" class="form-label @error('name') is-invalid @enderror">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$department->name ?? ""}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    {{-- {{dd($department)}} --}}
                                    <label for="inputNanme4" class="form-label  @error('sales_person') is-invalid @enderror">Show in Sales Person</label><br>
                                    <input type="checkbox" {{$department->sales_person == '1' ? 'checked' : ''}} id="vehicle1" name="sales_person" value="1">
                                    <label for="sales_person"> Yes</label><br>


                                </div>

                                <div class="col-6">
                                    <label for="phone" class="form-label">Status</label>
                                    <select class="form-control form-select @error('status') is-invalid @enderror"
                                        name="status">
                                        <option value="" selected>Select</option>
                                        <option {{ $department->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $department->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>

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
