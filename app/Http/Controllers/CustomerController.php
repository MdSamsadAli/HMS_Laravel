<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        $customer = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'upload/imgs/';

            if (file_exists($destinationPath)) {
                @unlink($destinationPath);
            }
            $customerImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $customerImage);
            $customer['photo'] = "$customerImage";
        }   

        if (Customer::create($customer)) {
            return redirect('admin/customer')->with('success', 'data has been added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $customer = Customer::find($id);

        if ($request->hasFile('image')) {

            $destination = $customer->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/imgs/', $filename);
            $request['photo'] = "upload/imgs/$filename";
        }



        Customer::where('id', $customer->id)->update([
            'full_name' => $request['full_name'],
            'email' => $request['email'],
            'mobile_no' => $request['mobile_no'],
            'address' => $request['address'],
            'photo' => $request['photo'] ?? $customer->photo,
        ]);

        return redirect('admin/customer')->with('success', 'data has been updated');

        // $customer = request()->except(['_token']);
        // $img = $request->file('image');
        // $new_name = rand() . '.' . $img->getClientOriginalExtension();
        // $img->move(public_path('upload/imgs'), $new_name);

        // if (file_exists(public_path($new_name))) {
        //     unlink(public_path($new_name));
        // };
        // $customer = array(
        //     'full_name' => $request->full_name,
        //     'email' => $request->email,
        //     'mobile_no' => $request->mobile_no,
        //     'address' => $request->address,
        //     'photo' => $new_name ?? true
        // );

        // Customer::whereId($id)->update($customer);
        // return redirect('admin/customer')->with('success', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::where('id', $id)->delete();
        return redirect('admin/customer')->with('success', 'Data has been Deleted');
    }
}
