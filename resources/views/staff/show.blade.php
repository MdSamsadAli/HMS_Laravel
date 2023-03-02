@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details Staff
                <a href="{{ url('admin/staff') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Department</th>
                        <td>
                            {{ $staff->department->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>Full Name</th>
                        <td>
                            {{ $staff->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <img src="{{ asset($staff->photo) }}" alt="img" width="200px" height="100px">
                        </td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>
                            {{ $staff->bio }}
                        </td>
                    </tr>
                    <tr>
                        <th>Salary Type</th>
                        <td>
                            {{ $staff->salary_type}}
                        </td>
                    </tr>

                    <tr>
                        <th>Salary Amount</th>
                        <td>
                            {{ $staff->salary_amt}}
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection