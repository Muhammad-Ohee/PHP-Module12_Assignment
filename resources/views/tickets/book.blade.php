@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Book Ticket for Trip: {{ $trip->trip_name }}</h1>

        <!-- Display available seats for booking -->
        <form method="POST" action="{{ route('tickets.purchase', $trip) }}">
            @csrf
            <div class="form-group">
                <label for="seat_number">Select Seat Number:</label>
                <select name="seat_number" class="form-control" required>
                    @foreach($availableSeats as $seat)
                        <option value="{{ $seat }}">{{ $seat }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-success">Purchase Ticket</button>
        </form>
    </div>
@endsection
