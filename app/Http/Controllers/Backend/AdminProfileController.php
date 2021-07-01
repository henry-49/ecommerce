<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Auth;

class AdminProfileController extends Controller
{
    // method to show profile
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', compact('adminData'));
    }


    // method to edit profile
    public function AdminProfileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));
        
    }


    public function AdminProfileStore(Request $request)
    {
        // find one data
        $data = Admin::find(1);

        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            // unlink old image
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            //create unique name and get the file extension
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload image
            $file->move(public_path('upload/admin_images'), $filename);
            //save uploaded image in the path
            $data['profile_photo_path'] = $filename;
        }
        // save all data
        $data->save();

          // Using Toastr Js
          $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );


        // return back to admin profile after update
        return redirect()->route('admin.profile')->with($notification);
    }


    // method to change admin password
    public function AdminChangePassword()
    {
        $changeAdminPass = Admin::find(1);
        return view('admin.admin_change_password', compact('changeAdminPass'));
    }


    // method to update admin password
    public function AdminUpdatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'oldpassword.required' => 'Please Input Your Old Password',
        ]);
        
        // get the hashed password
        $hashedPassword = Admin::find(1)->password;
        // check if the old password entered is a match with the hashed password
        if(Hash::check($request->oldpassword, $hashedPassword)){
            // find the Authenticated user id
            $admin = Admin::find(1);
            // hash the new entered password
            $admin->password = Hash::make($request->password);
            
            // Save admin password
            $admin->save();
    
            // logout the admin after saving the changed password
            Auth::logout();
    
            return redirect()->route('admin.logout');

        }else{
    
            return redirect()->back();
        }
    }
}
