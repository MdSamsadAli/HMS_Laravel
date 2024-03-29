@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff
                <a href="{{ url('admin/staff/create') }}" class="float-right btn btn-success btn-sm">Add New</a>
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
                            <th>Department</th>
                            <th>Photo</th>
                            <th>Bio</th>
                            {{-- <th>Salary Type</th>
                            <th>Salary Amount</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Full Name</th>
                            <th>Department</th>
                            <th>Photo</th>
                            <th>Bio</th>
                            {{-- <th>Salary Type</th>
                            <th>Salary Amount</th> --}}
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($staffs as $data)
                            
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->full_name }}</td>
                            <td>{{ $data->department->title }}</td>
                            <td>
                                <img src="{{ asset($data->photo) }}" alt="img" width="100%" height="100px">
                                
                            </td>
                            <td>{{ $data->bio }}</td>
                            {{-- <td>{{ $data->salary_type }}</td>
                            <td>{{ $data->salary_amt }}</td> --}}
                            <td>
                                <a href="{{ url('admin/staff', $data->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                <a href="{{ url('admin/staff/'.$data->id. '/edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('admin/staff/payments/'.$data->id) }}" class="btn btn-dark btn-sm"><i class="fa fa-credit-card"></i></a>
                                <a onclick="return confirm('Are you Sure to delete this data ?')" href="{{ url('admin/staff/'. $data->id. '/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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