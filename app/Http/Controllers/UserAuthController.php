<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserAuthController extends Controller
{
    public function showRegister()
    {
        return Inertia::render('Auth/UsersRegister');
    }

    public function register(Request $request)
    {
        // Later we handle user signup
    }

    public function showLogin()
    {
        return Inertia::render('Auth/UserLogin');
    }

    public function login(Request $request)
    {
        // Later we handle user login
    }
}
