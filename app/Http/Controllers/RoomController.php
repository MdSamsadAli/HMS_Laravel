<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roomtypes = RoomType::all();
        return view('room.create', compact('roomtypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room();
        $room->room_type_id = $request->rt_id;
        $room->title = $request->title;
        $room->save();
        return redirect('admin/rooms')->with('success', 'data has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = room::find($id);
        $roomtypes = RoomType::all();
        return view('room.show', compact('room', 'roomtypes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomtypes = RoomType::all();
        $room = Room::find($id);
        return view('room.edit', compact('room', 'roomtypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::find($id);
        $room->room_type_id = $request->rt_id;
        $room->title = $request->title;
        $room->save();

        return redirect('admin/room')->with('success', 'data has been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Room::where('id', $id)->delete();
        return redirect('admin/rooms')->with('success', 'Data has been Deleted');
    }
}
