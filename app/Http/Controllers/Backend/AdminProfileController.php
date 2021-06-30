<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

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


}
