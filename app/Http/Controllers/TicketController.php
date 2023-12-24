<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\SeatAllocation;
use App\Models\User;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function book(Trip $trip)
    {
        // Display available seats for booking on a specific trip
        $availableSeats = $this->getAvailableSeats($trip);
        return view('tickets.book', compact('trip', 'availableSeats'));
    }

    public function purchase(Request $request, Trip $trip)
    {
        // Validate the request
        $request->validate([
            'seat_number' => 'required|integer',
            // Add other validation rules as needed
        ]);

        // Check seat availability
        if (!$this->isSeatAvailable($trip, $request->input('seat_number'))) {
            return redirect()->back()->with('error', 'Seat is already booked. Please choose another seat.');
        }

        // Create a seat allocation for the user
        $user = User::find(auth()->id()); // Assuming you have authentication in place
        SeatAllocation::create([
            'trip_id' => $trip->id,
            'user_id' => $user->id,
            'seat_number' => $request->input('seat_number'),
            // Add other fields as needed
        ]);

        return redirect()->route('trips.index')->with('success', 'Ticket purchased successfully.');
    }

    public function index()
    {
        // Display a list of user's booked tickets
        $user = User::find(auth()->id()); // Assuming you have authentication in place
        $bookedTickets = $user->seatAllocations;

        return view('tickets.index', compact('bookedTickets'));
    }

    public function cancel(SeatAllocation $seatAllocation)
    {
        // Cancel a booked ticket
        $seatAllocation->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket canceled successfully.');
    }

    public function userTickets(User $user)
    {
        // Display a list of tickets booked by a specific user
        $bookedTickets = $user->seatAllocations;

        return view('tickets.user_tickets', compact('bookedTickets', 'user'));
    }

    private function getAvailableSeats(Trip $trip)
    {
        // Get all seat allocations for the trip
        $allSeatAllocations = SeatAllocation::where('trip_id', $trip->id)->pluck('seat_number')->toArray();

        // Assuming the bus has 36 seats
        $totalSeats = 36;

        // Calculate available seats by finding the difference between all seats and booked seats
        $availableSeats = array_diff(range(1, $totalSeats), $allSeatAllocations);

        return $availableSeats;
    }


    private function isSeatAvailable(Trip $trip, $seatNumber)
    {
        // Check if a seat is available for booking
        $bookedSeats = SeatAllocation::where('trip_id', $trip->id)->pluck('seat_number')->toArray();

        return !in_array($seatNumber, $bookedSeats);
    }

    
}
