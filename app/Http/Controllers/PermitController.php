<?php

namespace App\Http\Controllers;

use App\Models\Permit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class PermitController extends Controller
{
// ... other methods ...
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'permit_type' => 'required|in:new,renewal,change_info',
            'business_name' => 'required|string|max:255',
            'business_address' => 'required|string',
            'owner_name' => 'required|string|max:255',
            // Add validation rules for all other fields
        ]);

        $permit = new Permit();
        $permit->user_id = Auth::id(); // Associate the request with the logged-in user
        $permit->permit_type = $validatedData['permit_type'];
        $permit->business_name = $validatedData['business_name'];
        $permit->business_address = $validatedData['business_address'];
        $permit->owner_name = $validatedData['owner_name'];
        // Set other fields from $validatedData
        $permit->save();

        return redirect('/dashboard')->with('success', 'Permit request submitted successfully!');
    }

  //add index method
     public function index()
    {
        $permits = Permit::where('user_id', auth()->id())->get();
        return view('permits.index', compact('permits'));
    }

// ... other methods ...
}