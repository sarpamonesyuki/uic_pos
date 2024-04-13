<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Added support for Auth.
use Illuminate\Support\Facades\Auth;

// Added directory to Auth.
use App\Models\User;

class HomeController extends Controller
{
    // Added redirect function
    public function redirect(){
        // $user_type=Auth::user()->user_type;

        // if($user_type=='1'){
        //     return view('admin.home');
        // } else{
        //     return view('user.product-display');
        // }
        return view('dashboard');
    }
}
