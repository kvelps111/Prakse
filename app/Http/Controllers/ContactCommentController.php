<?php
namespace App\Http\Controllers;

use App\Models\ContactComment;
use Illuminate\Http\Request;
use Auth;

class ContactCommentController extends Controller
{
    // Method to display and edit the comment for a contact
    public function edit($contact_id)
    {
        // Fetch the last comment related to the given contact_id
        $comment = ContactComment::where('contact_id', $contact_id)->latest()->first();

        // If no comment exists, create a new instance
        if (!$comment) {
            $comment = new ContactComment();
            $comment->contact_id = $contact_id; // Set the contact_id
            $comment->comment = ''; // Default empty comment
        }

        // Return the view with the contact and the comment
        return view('contacts.edit', compact('contact_id', 'comment'));
    }

    // Method to save the updated comment
    public function update(Request $request, $contact_id)
    {
        // Validate the incoming request data
        $request->validate([
            'comment' => 'required|string',
        ]);

        // Find the last comment related to the given contact_id
        $comment = ContactComment::where('contact_id', $contact_id)->latest()->first();

        if ($comment) {
            // Update the existing comment
            $comment->update([
                'comment' => $request->comment,
                'user_id' => Auth::id(), // Assuming the logged-in user is making the change
            ]);
        } else {
            // If no comment exists, create a new one
            ContactComment::create([
                'contact_id' => $contact_id,
                'comment' => $request->comment,
                'user_id' => Auth::id(),
            ]);
        }

        // Redirect back to the contact's edit page with success message
        return redirect()->route('contact.edit', ['contact_id' => $contact_id])->with('success', 'Comment updated successfully!');
    }
}
