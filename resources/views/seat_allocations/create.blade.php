@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Seat Allocation</h1>

        <!-- Display the form to create a new seat allocation -->
        <form method="POST" action="{{ route('seat_allocations.store') }}">
            @csrf
            <div class="form-group">
                <label for="trip_id">Select Trip:</label>
                <select name="trip_id" class="form-control" required>
                    @foreach($trips as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->trip_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select name="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seat_number">Seat Number:</label>
                <input type="number" name="seat_number" class="form-control" required>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-success">Create Seat Allocation</button>
        </form>
    </div>
@endsection
