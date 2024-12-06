<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch all contacts
        $contacts = Contact::all();

        // Pass the contacts to the view
        return view('dashboard', compact('contacts'));
    }
}
