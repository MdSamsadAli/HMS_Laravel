@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $roomtype->title }}
                <a href="{{ url('admin/roomtype') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>
                            {{ $roomtype->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>
                            {{ $roomtype->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td>
                            {{ $roomtype->detail }}
                        </td>
                    </tr>
                    <tr>
                        <td>Gallery Image</td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    @foreach ($roomtype->roomtypeimgs as $img)
                                        <td class="imagcol{{ $img->id }}">
                                            <img src="{{ asset($img->img_src) }}" alt="multiple_img" width="100%" height="200px" />
                                            {{-- <p class="mt-2"><button type="button" class="btn btn-sm btn-danger delete-image" data-image-id={{ $img->id }} onclick="return confirm('Are You sure to delete this image ?')"><i class="fa fa-trash"></i></button></p> --}}
                                        </td>
                                    @endforeach
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection