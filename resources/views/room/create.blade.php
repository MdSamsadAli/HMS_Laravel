@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room
                <a href="{{ url('admin/rooms') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/rooms') }}" method="post">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Room Type</th>
                            <td>
                                <select name="rt_id" class="form-control">
                                    <option value="0">---Select----</option>
                                    @foreach ($roomtypes as $rt)
                                        <option value="{{ $rt->id }}">{{ $rt->title }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('rt_id') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>
                                <input type="text" class="form-control" name="title" />
                                <span class="text-danger">{{ $errors->first('title') }}</span>
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