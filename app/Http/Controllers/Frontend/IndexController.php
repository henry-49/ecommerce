<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;


class IndexController extends Controller
{
    //
    public function index(Type $var = null)
    {
        return view('frontend.index');
    }

    // method to logout user
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }


    // method to view user profile
    public function UserProfile()
    {
        // Retrieve the currently authenticated user's ID...
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    // method to store user profile
    public function UserProfileStore(Request $request)
    {
        // Retrieve the currently authenticated user's ID...
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            // unlink old image
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            //create unique name and get the file extension
            $filename = date('YmdHi').$file->getClientOriginalName();
            // upload image
            $file->move(public_path('upload/user_images'), $filename);
            //save uploaded image in the path
            $data['profile_photo_path'] = $filename;
        }
            // save all data
            $data->save();

          // Using Toastr Js
          $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        // return back to admin profile after update
        return redirect()->route('dashboard')->with($notification);
    }


    // method to change user password
    public function UserChangePassword()
    {
        // Retrieve the currently authenticated user's ID...
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_change_password', compact('user'));
    }


    // method to update user password
    public function UserUpdatePassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ],
        [
            'oldpassword.required' => 'Please Input Your Old Password',
        ]);
        
        // get the hashed password
        $hashedPassword = Auth::user()->password;
        // check if the old password entered is a match with the hashed password
        if(Hash::check($request->oldpassword, $hashedPassword)){
            // find the Authenticated user id
            $user = User::find(Auth::id());
            // hash the new entered password
            $user->password = Hash::make($request->password);
            
            // Save user password
            $user->save();
    
            // logout the user after saving the changed password
            Auth::logout();
    
            return redirect()->route('user.logout');

        }else{
    
            return redirect()->back();
        }
    }


}