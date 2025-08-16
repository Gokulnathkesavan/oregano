<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;



use chillerlan\QRCode\QROptions;

class OutletController extends Controller
{
public function index(Request $request)
{
    $query = Outlet::query();

    // Filter by name (search dropdown)
    if ($request->filled('search')) {
        $query->where('name', $request->search);
    }

    // Filter by status
    if ($request->filled('status')) {
        // status stored as boolean in DB, so convert to boolean
        $status = $request->status == '1' ? true : false;
        $query->where('status', $status);
    }

    // Filter by location
    if ($request->filled('location')) {
        $query->where('location', $request->location);
    }

    $outlets = $query->latest()->paginate(10)->withQueryString();

    // Get distinct names and locations for filter dropdowns
    $allOutletNames = Outlet::select('name')->distinct()->orderBy('name')->pluck('name');
    $allLocations = Outlet::select('location')->distinct()->orderBy('location')->pluck('location');

    return view('outlet.index', compact('outlets', 'allOutletNames', 'allLocations'));
}





    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
        ]);

        // Convert status string to boolean
        $validated['status'] = $validated['status'] === 'active';

        // Generate slug from name + location
        // $slugBase = implode(' ', array_filter([$validated['name'] ?? null, $validated['location'] ?? null]));
        // $validated['slug'] = Str::slug($slugBase);


        Outlet::create($validated);

        return redirect()->back()->with('success', 'Outlet added successfully.');
    }

    public function update(Request $request, Outlet $outlet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'slug'=>'required|string|max:255',
            'status' => 'required|string|in:active,inactive',
            
        ]);

        // Convert status string to boolean
        $validated['status'] = $validated['status'] === 'active';

        // Regenerate slug if name or location changed
        // if ($validated['name'] !== $outlet->name || $validated['location'] !== $outlet->location) {
        //     $slugBase = $validated['name'] . '-' . ($validated['location'] ?? '');
        //     $validated['slug'] = Str::slug($slugBase);
        // }

        $outlet->update($validated);

        return redirect()->back()->with('success', 'Outlet updated successfully.');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();

        return redirect()->back()->with('success', 'Outlet deleted successfully.');
    }





public function generateQr(Outlet $outlet)
{
    try {
        $slug = $outlet->slug;
        if (!$slug) {
            throw new \Exception('Slug is missing from outlet');
        }

        $url = url("/entry/{$slug}");
        \Log::info("Generating QR code for URL: {$url}");

        // Generate QR code
        $qrCode = QrCode::format('png')
            ->size(300)
            ->errorCorrection('H') // High error correction
            ->generate($url);

        // Ensure directory exists
        $directory = 'public/qr_codes';
        Storage::makeDirectory($directory);

        $fileName = "qr_codes/outlet_{$outlet->id}.png";
        
        // Save the file
        Storage::put("{$directory}/outlet_{$outlet->id}.png", $qrCode);

        // Update outlet record
        $outlet->update([
            'qr_code_path' => "{$directory}/outlet_{$outlet->id}.png"
        ]);

        return response()->json([
            'success' => true,
            'qr_code_url' => Storage::url("{$directory}/outlet_{$outlet->id}.png")
        ]);

    } catch (\Exception $e) {
        \Log::error('QR Code generation failed: ' . $e->getMessage());
        \Log::error($e->getTraceAsString());
        
        return response()->json([
            'success' => false,
            'message' => 'QR generation failed: ' . $e->getMessage()
        ], 500);
    }
}





}
