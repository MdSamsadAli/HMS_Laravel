@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update {{ $roomtype->title }}
                <a href="{{ url('admin/roomtype') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/roomtype', $roomtype->id) }}" method="post" enctype="multipart/form-data">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    @csrf
                    @method('PUT')
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>
                                <input type="text" class="form-control" name="title" value="{{ $roomtype->title }}"/>
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>
                                <input type="number" class="form-control" name="price" value="{{ $roomtype->price }}" />
                            </td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td>
                                <textarea class="form-control" name="detail">{{ $roomtype->detail }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Gallery Image</td>
                            <td>
                                <table class="table table-bordered">
                                    <tr>
                                        <input type="file" multiple name="imgs[]">
                                        @foreach ($roomtype->roomtypeimgs as $img)
                                            <td class="imagcol{{ $img->id }}">
                                                <img src="{{ asset($img->img_src) }}" alt="multiple_img" width="100%" height="200px" />
                                                <p class="mt-2"><button type="button" class="btn btn-sm btn-danger delete-image" data-image-id={{ $img->id }} onclick="return confirm('Are You sure to delete this image ?')"><i class="fa fa-trash"></i></button></p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-image").on('click', function(){
                var _img_id=$(this).attr('data-image-id');
                var _vm=$(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{ url('admin/roomtypeimage/delete/')}}/"+_img_id,
                    dataType:'json',
                    beforeSend:function(){
                        _vm.addClass('disabled');
                    },
                    success:function(res){
                        // console.log(res);
                        if(res.bool ==true) {
                            $(".imgcol"+_img_id).remove();
                        }
                        _vm.removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endsection
 
@endsection