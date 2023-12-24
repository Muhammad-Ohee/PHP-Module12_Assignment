<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        // Display a list of all trips
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        // Display the form to create a new trip
        return view('trips.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'trip_date' => 'required|date',
            'departure_location' => 'required|string',
            'arrival_location' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Store a newly created trip in the database
        Trip::create([
            'trip_date' => $request->input('trip_date'),
            'departure_location' => $request->input('departure_location'),
            'arrival_location' => $request->input('arrival_location'),
            // Add other fields as needed
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully.');
    }

    public function edit(Trip $trip)
    {
        // Display the form to edit a trip
        return view('trips.edit', compact('trip'));
    }

    public function update(Request $request, Trip $trip)
    {
        // Validate the request
        $request->validate([
            'trip_date' => 'required|date',
            'departure_location' => 'required|string',
            'arrival_location' => 'required|string',
            // Add other validation rules as needed
        ]);

        // Update the trip in the database
        $trip->update([
            'trip_date' => $request->input('trip_date'),
            'departure_location' => $request->input('departure_location'),
            'arrival_location' => $request->input('arrival_location'),
            // Add other fields as needed
        ]);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully.');
    }

    public function destroy(Trip $trip)
    {
        // Delete the trip from the database
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully.');
    }

    // Add other CRUD methods as needed


    public function show(Trip $trip)
    {
        // Display details of a specific trip
        return view('trips.show', compact('trip'));
    }


}
