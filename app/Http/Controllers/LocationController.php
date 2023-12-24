<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // Display a list of all locations
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function create()
    {
        // Display the form to create a new location
        return view('locations.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Store a newly created location in the database
        Location::create([
            'name' => $request->input('name'),
            // Add other fields as needed
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    // Add other CRUD methods as needed
}
