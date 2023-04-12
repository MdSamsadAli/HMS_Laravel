<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = $request->all();
        if (Department::create($department)) {
            return redirect('admin/department')->with('success', 'data has been added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::find($id);
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);

        $department = array(
            'title'        =>   $request->title,
            'detail'        =>   $request->detail,
        );

        Department::whereId($id)->update($department);

        return redirect('admin/department')->with('success', 'data has been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Department::where('id', $id)->delete();
        return redirect('admin/department')->with('success', 'Data has been Deleted');
    }
}
