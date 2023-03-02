@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Staff
                <a href="{{ url('admin/staff') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/staff', $staff->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">

                        <tr>
                            <th>Full Name</th>
                            <td>
                                <input type="text" class="form-control" name="full_name" value="{{ $staff->full_name }}"/>
                            </td>
                        </tr>


                        <tr>
                            <th>Department</th>
                            <td>
                                <select name="department_id" class="form-control">
                                    <option value="0">---Select----</option>
                                    @foreach ($department as $dprt)
                                        <option @if($staff->id==$dprt->id)
                                            selected
                                        @endif value="{{ $dprt->id }}">{{ $dprt->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        

                        <tr>
                            <th>Photo</th>
                            <td>
                                <input type="file" class="form-control" name="image" value="{{ $staff->photo }}"/>
                                <img src="{{ asset($staff->photo) }}" alt="img" height="100px" width="200px">
                            </td>
                        </tr>

                        <tr>
                            <th>Bio</th>
                            <td>
                                <textarea name="bio" class="form-control">{{ $staff->bio }}</textarea>
                            </td>
                        </tr>

                        <tr>
                            <th>Salary Type</th>
                            <td>

                                <input type="radio" name="salary_type" value="daily" @if ($staff->salary_type == 'daily')
                                    checked
                                @endif /> Daily
                                <input type="radio" name="salary_type" value="monthly" @if ($staff->salary_type == 'monthly')
                                checked
                            @endif /> Monthly
                            </td>
                        </tr>

                        <tr>
                            <th>Salary Amount</th>
                            <td>
                                <input type="text" class="form-control" name="salary_amt" value="{{ $staff->salary_amt }}"/>
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