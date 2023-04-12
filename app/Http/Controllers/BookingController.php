<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $rooms = Room::all();
        return view('booking.create', compact('customers', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Booking();
        $data->customer_id = $request->customer_id;
        $data->room_id = $request->room_id;
        $data->checkin_date = $request->check_in;
        $data->checkout_date = $request->check_out;
        $data->total_adults = $request->total_adults;
        $data->total_children = $request->total_children;
        $data->save();
        return redirect('admin/booking/create')->with('sucess', 'Data has been Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function available_rooms(Request $request, $checkin_date)
    {
        //custom DB queries
        $avail_rooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM
        bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date ) ");
        return response()->json(['data' => $avail_rooms]);
    }
}
