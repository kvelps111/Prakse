<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'name' => '', 
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        return redirect()->back()->with('success', 'Admin registered successfully!');
    }
}
