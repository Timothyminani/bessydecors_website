<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminAuthController extends Controller
{
    public function showRegister()
    {
        return Inertia::render('Auth/AdminRegister');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create admin
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin', 
            'password' => Hash::make($request->password),
        ]);

        return redirect('/admin/login')->with('success', 'Admin registered successfully');
    }


    public function showLogin()
    {
        return Inertia::render('Auth/LogIn');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password',
            ]);
        }

        // Check role
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => 'Not allowed to login as admin.',
            ]);
        }

        $request->session()->regenerate();
        return redirect('/admin/dashboard');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('/admin/login'); 
    }
}

