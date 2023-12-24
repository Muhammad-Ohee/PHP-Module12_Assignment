@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Trip</h1>

        <!-- Display the form to edit a trip -->
        <form method="POST" action="{{ route('trips.update', $trip) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="trip_name">Trip Name:</label>
                <input type="text" name="trip_name" class="form-control" value="{{ $trip->trip_name }}" required>
            </div>

            <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" name="trip_date" class="form-control" value="{{ $trip->trip_date }}" required>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-primary">Update Trip</button>
        </form>
    </div>
@endsection
