<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Correctly import the Auth facade
use Illuminate\Support\Facades\Session; // Import Session for flash messages (optional but good for errors)

class AuthController extends Controller
{

    // Admin dashboard
    public function dashboard()
    {

        return view('template');
    }

   
    public function loginForm()
    {
        // This will display your login form, which you've set up in 'dashboard.users.login'
        return view('dashboard.users.login');
    }


  // Authentication _ Login
    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',  
        ])->onlyInput('email');
    }
// Authentication _ Logout
  
  // In AuthController.php
// App/Http/Controllers/AuthController.php

public function logout(Request $request)
{
    Auth::guard('web')->logout(); // Logout the user

    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    // This is the line causing the issue:
    return redirect()->route('login.form'); // <-- Change this if your route name is different
}
}
