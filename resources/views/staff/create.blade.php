@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Staff
                <a href="{{ url('admin/staff') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/staff') }}" method="post" enctype="multipart/form-data">
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
                            <th>Select Department Type</th>
                            <td>
                                <select name="department_id" class="form-control">
                                    <option value="0">---Select----</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->title }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('department') }}</span>
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
                            <th>Bio</th>
                            <td>
                                <textarea name="bio" class="form-control"></textarea>
                                <span class="text-danger">{{ $errors->first('bio') }}</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Salary Type</th>
                            <td>
                                <input type="radio" name="salary_type" value="daily"/> Daily
                                <input type="radio" name="salary_type" value="monthly"/> Monthly
                                <span class="text-danger">{{ $errors->first('salary_type') }}</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Salary Amount</th>
                            <td>
                                <input type="number" class="form-control" name="salary_amt" />
                                <span class="text-danger">{{ $errors->first('salary_amt') }}</span>
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