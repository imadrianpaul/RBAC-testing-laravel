<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller {
    
    public function register(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|unique:customers',
        //     'email' => 'required|email|unique:customers',
        //     'mobilenumber' => 'required|numeric|max:11',
        //     'password' => 'required|min:6',
        //     'confirmpassword' => 'required|min:6',
        // ]);
    
        if ($request->password !== $request->confirmpassword) {
            return response()->json(['message' => 'Passwords do not match'], 400);
        }
    
        // Create the customer record
        $customer = Customer::create([
            'username' => $request->username,
            'email' => $request->email,
            'mobilenumber' => $request->mobilenumber,
            'password' => Hash::make($request->password),
            'confirmpassword' => Hash::make($request->confirmpassword),
        ]);
    
        return response()->json(['message' => 'Customer registered successfully'], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Attempt to find the user based on the email
        $user = Customer::where('email', $request->email)->first();
    
        // Check if user exists and verify the password
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication successful, return a success message and user data (if needed)
            return response()->json([
                'message' => 'Login successful',
                'user' => $user, // send the authenticated user data
            ]);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
}