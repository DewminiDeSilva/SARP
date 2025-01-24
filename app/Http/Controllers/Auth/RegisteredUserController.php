<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StaffProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View; // Explicitly import the View class

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Check if the email exists in the staff_profiles table
        $staff = StaffProfile::where('email_address', $request->email)->first();
        if (!$staff) {
            return redirect()->back()->withErrors([
                'email' => 'Unauthorized registration attempt. Your email is not found in the staff records.',
            ]);
        }

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Use Hash facade for better readability
            'role' => 'user',
        ]);

        // Redirect to login with a success message
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
}
