<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index() {
        return view('home.userpage');
    }


    public function redirect()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the user type
            $usertype = Auth::user()->usertype;

            // Determine the view based on the user type
            if ($usertype == '1') {
                return view('admin.home');
            } else {
                return view('home.userpage');
            }
        }

        // If the user is not authenticated,  might want to redirect them to the login page
        return redirect()->route('login');
    }
}
