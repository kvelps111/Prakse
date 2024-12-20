<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactStatusHistory; // Import the correct model
use Illuminate\Support\Facades\Auth;

class ContactStatusHistoryController extends Controller
{
    // Method to render the edit form
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    // Method to handle status change
    public function changestatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->status = $request->input('status');
        $contact->save();

        ContactStatusHistory::create([ 
            'contact_id' => $contact->id,  // Assign the contact's id to contact_id
            'status_id' => (string) $contact->status,  // Assuming 'status' is available in $contact
            'user_id' => Auth::id()  // The ID of the currently authenticated user
        ]);
        

        return redirect()->back()->with('success', 'Status updated and history recorded successfully!');
    }
}
