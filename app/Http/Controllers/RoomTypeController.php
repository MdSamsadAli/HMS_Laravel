<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use App\Models\Roomtypeimage;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roomtypes = RoomType::all();
        return view('roomtype.index', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roomtype = new RoomType();
        $roomtype->title = $request->title;
        $roomtype->price = $request->price;
        $roomtype->detail = $request->detail;
        $roomtype->save();

        foreach ($request->file('imgs') as $img) {
            $imgPath = $img->move('upload/imgs');
            $imgData = new Roomtypeimage;
            $imgData->room_type_id = $roomtype->id;
            $imgData->img_src = $imgPath;
            $imgData->img_alt = $request->title;
            $imgData->save();
        }

        return redirect('admin/roomtype')->with('success', 'data has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roomtype = RoomType::find($id);
        return view('roomtype.show', compact('roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roomtype = RoomType::find($id);
        return view('roomtype.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $roomtype = RoomType::find($id);
        $roomtype->title = $request->title;
        $roomtype->price = $request->price;
        $roomtype->detail = $request->detail;
        $roomtype->save();

        if ($request->hasFile('imgs')) {
            foreach ($request->file('imgs') as $img) {
                $imgPath = $img->move('upload/imgs');
                $imgData = new Roomtypeimage;
                $imgData->room_type_id = $roomtype->id;
                $imgData->img_src = $imgPath;
                $imgData->img_alt = $request->title;
                $imgData->save();
            }
        }

        return redirect('admin/roomtype')->with('success', 'data has been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        RoomType::where('id', $id)->delete();
        return redirect('admin/roomtype')->with('success', 'Data has been Deleted');
    }

    public function destroy_image($img_id)
    {
        $data = Roomtypeimage::where('id', $img_id)->delete();
        Storage::delete($data->img_scr);
        return response()->json(['bool' => true]);
    }
}
