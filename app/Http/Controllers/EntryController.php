<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEntryRequest;
use App\Models\Outlet;
use App\Models\Entry;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EntryController extends Controller
{
    // Display paginated entries with filters
    public function index(Request $request)
    {
        $query = Entry::with('outlet')
            ->when($request->filled('search'), fn($q) => $q->where('name', $request->search))
            ->when($request->filled('status'), fn($q) => $q->where('status', $request->status))
            ->when($request->filled('outlet_id'), fn($q) => $q->where('outlet_id', $request->outlet_id));

        $entries = $query->paginate(10);

        $allEntryNames = Entry::distinct()->pluck('name');
        $allOutlets = Outlet::pluck('name', 'id');

        return view('entry.table.entries', compact('entries', 'allEntryNames', 'allOutlets'));
    }

    // Show registration form for a given outlet
    public function showForm($slug)
    {
        $outlet = Outlet::where('slug', $slug)->first();

        if (!$outlet || !$outlet->status) {
            return view('entry.reg_form', ['inactive' => true]);
        }

        return view('entry.reg_form', compact('outlet'))->with('inactive', false);
    }

    // Store a new entry
    public function store(StoreEntryRequest $request)
    {


        $name= $request->name;

        //Check Bill Number Dubilicate 
        $dublicate = Entry::where('bill_number', $request->bill_number)->first();
        if ($dublicate) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bill Number Already Exist',
            ], 402);
        }


        // Handle bill image upload (if provided)
        $billImagePath = null;
        if ($request->hasFile('bill_image')) {
            $billImagePath = $request->file('bill_image')->store('bills', 'public');
        }

        Entry::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile,
            'terms_accepted' => true,
            'outlet_id' => $request->outlet_id,
            'bill_number' => $request->bill_number,
            'bill_image' => $billImagePath,
        ]);

        return response()->json([
            'name'=>$name,
            'status' => 'success',
            'message' => 'Your entry has been submitted successfully.'
        ]);
    }

    // Export entries as CSV (memory-efficient)
    public function exportCsv(Request $request)
    {
        $filename = 'entries_' . now()->format('Ymd_His') . '.csv';

        $response = new StreamedResponse(function () use ($request) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, ['Name', 'Email', 'Mobile', 'Outlet', 'Bill Number', 'Bill Image', 'Terms Accepted', 'Submitted At']);

            Entry::with('outlet')
                ->when($request->filled('outlet_id'), fn($q) => $q->where('outlet_id', $request->outlet_id))
                ->when($request->filled('terms_accepted'), fn($q) => $q->where('terms_accepted', $request->terms_accepted))
                ->chunk(500, function ($entries) use ($handle) {
                    foreach ($entries as $entry) {
                        fputcsv($handle, [
                            $entry->name,
                            $entry->email,
                            $entry->mobile_number,
                            $entry->outlet->name ?? 'N/A',
                            $entry->bill_number ?? 'N/A',
                            $entry->bill_image ? asset('storage/' . $entry->bill_image) : 'N/A',
                            $entry->terms_accepted ? 'Yes' : 'No',
                            $entry->created_at->format('d M Y H:i'),
                        ]);
                    }
                });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

        return $response;
    }
}
