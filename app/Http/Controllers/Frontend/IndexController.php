<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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



}
