<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'option' => 'required',
            'priority'=> 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Form submitted successfully!');
        
        
    }
    
}
