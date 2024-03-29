<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Booking;
use Cookie;

class AdminController extends Controller
{
    //Login
    //Logout
    public function login()
    {
        return view('login');
    }

    public function check_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = Admin::where([
            'username' => $request->username,
            'password' => sha1($request->password),
        ])->count();

        if ($admin > 0) {
            $adminData = Admin::where([
                'username' => $request->username,
                'password' => sha1($request->password),
            ])->get();
            session([
                'adminData' => $adminData
            ]);

            // for remember me username and password will show without encryption
            // 1440 means cookie will expire after 24hours
            // Cookie:: queue(name of the cookie, value, expiry time)

            if ($request->has('rememberme')) {
                Cookie::queue('adminuser', $request->username, 1440);
                Cookie::queue('adminpwd', $request->password, 1440);
            }


            return redirect('/');
        } else {
            return redirect('admin/login')->with('msg', 'Invalid Username or Password!!!');
        }
    }
    public function logout()
    {
        session()->forget([
            'adminData'
        ]);
        return redirect('admin/login');
    }
    public function dashboard()
    {
        $bookings = Booking::selectRaw('count(id) as total_bookings, checkin_date')->groupBy('checkin_date')->get();
        $labels = [];
        $data = [];
        foreach ($bookings as $booking) {
            $labels[] = $booking['checkin_date'];
            $data[] = $booking['total_bookings'];
        }
        return view('dashboard', compact('bookings', 'labels', 'data'));
    }
}
