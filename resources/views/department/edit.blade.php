@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Room
                <a href="{{ url('admin/department') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/department', $department->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input type="text" class="form-control" name="title" value="{{ $department->title }}"/>
                            </td>
                        </tr>

                        <tr>
                            <th>Details</th>
                            <td>
                                <textarea class="form-control" name="detail">{{ $department->detail }}</textarea>
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