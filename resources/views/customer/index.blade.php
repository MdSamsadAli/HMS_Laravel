@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer
                <a href="{{ url('admin/customer/create') }}" class="float-right btn btn-success btn-sm">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Mobile Number</th>
                            <th>Address</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($customers as $data)
                            
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->full_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->password }}</td>
                            <td>{{ $data->mobile_no }}</td>
                            <td>{{ $data->address }}</td>
                            <td>
                                <img src="{{ asset("upload/imgs/" . $data->photo) }}" alt="img" width="200px" height="200px" />
                            </td>
                            <td>
                                <a href="{{ url('admin/customer', $data->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('admin/customer/'.$data->id. '/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Are you Sure to delete this data ?')" href="{{ url('admin/customer/'. $data->id. '/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 <!-- Page level plugins -->
    @section('scripts')
    <link href="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('style/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('style/js/demo/datatables-demo.js') }}"></script>
    @endsection
@endsection