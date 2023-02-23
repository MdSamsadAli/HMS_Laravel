<?php

namespace App\Http\Controllers;
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
    public function store(Request $request)
    {
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() .'.'.$ext;
        $imgPath = $file->move('upload/imgs', $filename);
        
        $customers = new Customer();

        $customers->full_name = $request->full_name;
        $customers->email = $request->email;
        $customers->password = $request->password;
        $customers->mobile_no = $request->mobile_no;
        $customers->address = $request->address;
        $customers->photo = $imgPath;
        $customers->save();
        return redirect('admin/customer')->with('success', 'data has been added');
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
            
            if($request->hasFile('image')){

                $destination = $customer->image;

            if(File::exists($destination)){
                File::delete($destination);
            }


                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() .'.'.$ext;
                $file->move('uploads/slider/', $filename);
                $request['photo'] = "uploads/slider/$filename";
            }
        
        

         Customer::where('id', $customer->id)->update([
                'full_name'=>$request['full_name'],
                'email'=>$request['email'],
                'password'=>$request['password'],
                'mobile_no'=>$request['mobile_no'],
                'address'=>$request['address'],
                'photo'=>$request['photo'] ?? $customer->photo,
            ]);

        return redirect('admin/customer')->with('success', 'data has been updated');
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
