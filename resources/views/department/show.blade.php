@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details Department
                <a href="{{ url('admin/department') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    
                    <tr>
                        <th>Title</th>
                        <td>
                            {{ $department->title }}
                        </td>
                    </tr>

                    <tr>
                        <th>Details</th>
                        <td>
                            {{ $department->detail }}
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection