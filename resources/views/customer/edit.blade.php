@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Customer
                <a href="{{ url('admin/customer') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/customer', $customer->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>
                                <input type="text" class="form-control" name="full_name" value="{{ $customer->full_name }}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" class="form-control" name="email" value="{{ $customer->email }}"/>
                            </td>
                        </tr>

                        <tr>
                            <th>Mobile Number</th>
                            <td>
                                <input type="text" class="form-control" name="mobile_no" value="{{ $customer->mobile_no }}"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Password</th>
                            <td>
                                <input type="password" class="form-control" name="password" value="{{ $customer->password }}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                <input type="text" class="form-control" name="address" value="{{ $customer->address }}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" class="form-control" name="image" value="{{ $customer->photo }}"/>
                                <input type="hidden" class="form-control" name="old_image" value="{{ $customer->photo }}"/>
                                <img src="{{ asset($customer->photo) }}" alt="img" width="40%"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection