@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Booked Tickets</h1>

        <!-- Display a table of user's booked tickets -->
        <table class="table">
            <thead>
                <tr>
                    <th>Trip</th>
                    <th>Seat Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookedTickets as $ticket)
                    <tr>
                        <td>{{ $ticket->seatAllocation->trip->trip_name }}</td>
                        <td>{{ $ticket->seatAllocation->seat_number }}</td>
                        <td>
                            <form method="POST" action="{{ route('tickets.cancel', $ticket->seatAllocation) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
