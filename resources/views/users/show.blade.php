@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Profile: {{ $user->name }}</h1>

        <!-- Display user details -->
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <!-- Add other user details as needed -->

        <h2>Booked Tickets</h2>

        <!-- Display a table of user's booked tickets -->
        <table class="table">
            <thead>
                <tr>
                    <th>Trip</th>
                    <th>Seat Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookedTickets as $ticket)
                    <tr>
                        <td>{{ $ticket->seatAllocation->trip->trip_name }}</td>
                        <td>{{ $ticket->seatAllocation->seat_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('home') }}" class="btn btn-info">Back to Home</a>
    </div>
@endsection
