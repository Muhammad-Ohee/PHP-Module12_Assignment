@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tickets Booked by {{ $user->name }}</h1>

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
    </div>
@endsection
