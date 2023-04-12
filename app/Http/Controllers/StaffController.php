<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Department;
use App\Models\Staff;
use App\Models\StaffPayment;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view('staff.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffRequest $request)
    {

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '.' . $ext;
        $imgPath = $file->move('upload/imgs', $filename);

        $staff = new Staff();

        $staff->full_name = $request->full_name;
        $staff->department_id = $request->department_id;
        $staff->photo = $imgPath;
        $staff->bio = $request->bio;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->save();
        return redirect('admin/staff')->with('success', 'data has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('staff.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $department = Department::all();
        return view('staff.edit', compact('staff', 'department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staff = Staff::find($id);

        if ($request->hasFile('image')) {

            $destination = $staff->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/imgs/', $filename);
            $request['photo'] = "upload/imgs/$filename";
        }



        Staff::where('id', $staff->id)->update([
            'full_name' => $request['full_name'],
            'department_id' => $request['department_id'],
            'photo' => $request['photo'] ?? $staff->photo,
            'bio' => $request['bio'],
            'salary_type' => $request['salary_type'],
            'salary_amt' => $request['salary_amt'],
        ]);

        return redirect('admin/staff')->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Staff::where('id', $id)->delete();
        return redirect('admin/staff')->with('success', 'Data has been Deleted');
    }


    // All Payments 
    public function all_payments(Request $request, $staff_id)
    {
        $data = StaffPayment::where('staff_id', $staff_id)->get();
        $staff = Staff::find($staff_id);
        return view('staffpayment.index', ['staff_id' => $staff_id, 'data' => $data, 'staff' => $staff]);
    }
    //Add Payment
    public function add_payment($staff_id)
    {
        return view('staffpayment.create', ['staff_id' => $staff_id]);
    }

    // store payment 
    function save_payment(Request $request, $staff_id)
    {
        $data = new StaffPayment();
        $data->staff_id = $staff_id;
        $data->amount = $request->amount;
        $data->payment_date = $request->amount_date;
        $data->save();
        return redirect()->back()->with('success', 'Data has been saved sucessfully.');
    }
    function delete_payment($id)
    {
        StaffPayment::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data has been Deleted');
    }
}