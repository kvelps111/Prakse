<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use Carbon\Carbon; // Import Carbon for date and time handling

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'name' => '', // Placeholder value
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->back()->with('success', 'Admin registered successfully!');
    }
}
