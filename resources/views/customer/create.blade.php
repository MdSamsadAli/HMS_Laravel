@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Customer
                <a href="{{ url('admin/customer') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/customer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Full Name</th>
                            <td>
                                <input type="text" class="form-control" name="full_name" />
                                <span class="text-danger">{{ $errors->first('full_name') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" class="form-control" name="email" />
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                <input type="password" class="form-control" name="password" />
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Mobil Number</th>
                            <td>
                                <input type="number" class="form-control" name="mobile_no" />
                                <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>
                                <input type="text" class="form-control" name="address" />
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" class="form-control" name="image" />
                                <span class="text-danger">{{ $errors->first('image') }}</span>
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