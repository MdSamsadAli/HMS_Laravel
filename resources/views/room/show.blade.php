@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details Room
                <a href="{{ url('admin/rooms') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>Room Type</th>
                        <td>
                            {{ $room->roomtype->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>
                            {{ $room->title }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
 
@endsection