<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use Illuminate\Http\Request;

class SeatAllocationController extends Controller
{
    public function index()
    {
        // Display a list of all seat allocations
        $seatAllocations = SeatAllocation::all();
        return view('seat_allocations.index', compact('seatAllocations'));
    }

    public function create()
    {
        // Display the form to create a new seat allocation
        return view('seat_allocations.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'trip_id' => 'required|integer',
            'user_id' => 'required|integer',
            'seat_number' => 'required|integer',
            // Add other validation rules as needed
        ]);

        // Store a newly created seat allocation in the database
        SeatAllocation::create([
            'trip_id' => $request->input('trip_id'),
            'user_id' => $request->input('user_id'),
            'seat_number' => $request->input('seat_number'),
            // Add other fields as needed
        ]);

        return redirect()->route('seat_allocations.index')->with('success', 'Seat allocation created successfully.');
    }

    // Add other CRUD methods as needed
}
