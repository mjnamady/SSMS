<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } // End method

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Successfully!',
            'alert-type' => 'success'
        );

        return redirect('/admin/login')->with($notification);
    } // End method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    } // End method

    public function AdminProfile()
    {
        $adminInfo = User::find(Auth::user()->id);
        return view('admin.admin_profile', compact('adminInfo'));
    } // End method

    public function AdminProfileEdit()
    {
        $adminInfo = User::find(Auth::user()->id);
        return view('admin.admin_profile_edit', compact('adminInfo'));
    } // End method

    public function AdminProfileUpdate(Request $request)
    {
        $user = User::findOrFail($request->id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_images/'.$user->photo));
            $image = "Admin".date('YmdHi').'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_images'), $image);
            $user['photo'] = $image;
        }

        $user->save();

        $notification = array(
            'message' => 'Profile Updated Successfully!',
            'alert-type' => 'info'
        );

        return back()->with($notification);
    } // End method

    public function AdminChangePassword()
    {
        $adminInfo = User::find(Auth::user()->id);
        return view('admin.admin_change_password', compact('adminInfo'));
    } // End method

    public function AdminUpdatePassword(Request $request)
    {
        // dd($request);
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if(!Hash::check($request->old_password, Auth::user()->password))
        {
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error'
            );
            
            return back()->with($notification);
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully!',
            'alert-type' => 'success'
        );
        
        return back()->with($notification);
    }
}
