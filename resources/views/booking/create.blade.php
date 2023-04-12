@extends('layouts.layout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Booking
                <a href="{{ url('admin/booking') }}" class="btn btn-primary btn-sm float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
            <p class="text-success">{{ session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form action="{{ url('admin/booking') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered">
                        <tr>
                            <th>Select Customer</th>
                            <td>
                                <select class="form-control" name="customer_id">
                                    <option>---Select Customer---</option>
                                    @foreach ($customers as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <th>CheckIn Date</th>
                            <td>
                                <input type="date" class="form-control checkin-date" name="check_in" />
                                <span class="text-danger">{{ $errors->first('check_in') }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th>CheckOut Date</th>
                            <td>
                                <input type="date" class="form-control checkout-date" name="check_out" />
                                <span class="text-danger">{{ $errors->first('check_out') }}</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Available Room</th>
                            <td>
                                <select class="form-control room-list" name="room_id">
                                    
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th>Total Adults</th>
                            <td>
                                <input type="number" class="form-control" name="total_adults" />
                                <span class="text-danger">{{ $errors->first('check_out') }}</span>
                            </td>
                        </tr>

                        <tr>
                            <th>Total Children</th>
                            <td>
                                <input type="number" class="form-control" name="total_children" />
                                <span class="text-danger">{{ $errors->first('check_out') }}</span>
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
        $(".checkin-date").on('blur', function (){
            var _checkindate = $(this).val();
            // console.log(_checkindate);

            //Ajax
            $.ajax({
                url:"{{ url("admin/booking") }}/available-rooms/"+_checkindate,
                // type:'post',
                dataType:'json',
                beforeSend:function(){
                    $(".room-list").html('<option>---Loading---</option>');
                },
                success:function(res){
                    // console.log(res);
                    var _html = '';
                    $.each(res.data, function(index, row){
                        _html+='<option value="'+row.id+'">'+row.title+'</option>';
                    });
                    $(".room-list").html(_html);
                }
            });
        });



        // $(".checkout-date").on('blur', function (){
        //     var _checkoutdate = $(this).val();
        //     console.log(_checkoutdate);
        // });
    });
</script>
@endsection


@endsection