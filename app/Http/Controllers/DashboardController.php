<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        if ($request->filled('option')) {
            $query->where('option', $request->option);
        }

        if ($request->filled('updated_at')) {
            if ($request->updated_at == 'old') {
                $query->orderBy('updated_at', 'asc');
            } elseif ($request->updated_at == 'new') {
                $query->orderBy('updated_at', 'desc');
            }
        }

        $contacts = $query->simplePaginate(10);

        if ($contacts->isEmpty()) {
            return redirect()->back()->with('error', 'No records matching the search criteria.');
        }

        return view('dashboard', compact('contacts'));
    }

    public function exportCsv()
    {
        $contacts = DB::table('contact')->get();

        $filename = 'contacts.csv';
        $handle = fopen($filename, 'w+');

        fputcsv($handle, ['Email', 'Message', 'Option', 'Priority', 'Uploaded']);

        foreach ($contacts as $contact) {
            fputcsv($handle, [$contact->email, $contact->message, $contact->option, $contact->priority, $contact->updated_at]);
        }

        fclose($handle);

        $headers = [
            'Content-Type' => 'text/csv',
        ];

        return response()->download($filename, $filename, $headers);
    }

    public function changestatus(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|integer',
            'status' => 'required|string'
        ]);

        $contact = Contact::findOrFail($request->input('ticket_id'));
        $contact->status = $request->input('status');
        $contact->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}


