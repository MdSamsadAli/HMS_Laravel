@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Room Type
                <a href="{{ url('admin/roomtype') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/roomtype') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input type="text" class="form-control" name="title" />
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>
                                <input type="number" class="form-control" name="price" />
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td>
                                <textarea class="form-control" name="detail"></textarea>
                                <span class="text-danger">{{ $errors->first('detail') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td>
                                <input type="file" class="form-control" name="imgs[]" multiple />
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