@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details Customer
                <a href="{{ url('admin/customer') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Full Name</th>
                        <td>
                            {{ $customer->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>
                            {{ $customer->email }}
                        </td>
                    </tr>

                    <tr>
                        <th>Password</th>
                        <td>
                            {{ $customer->password }}
                        </td>
                    </tr>

                    <tr>
                        <th>Address</th>
                        <td>
                            {{ $customer->address }}
                        </td>
                    </tr>

                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{ asset($customer->photo) }}" alt="img" width="40%"/>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection