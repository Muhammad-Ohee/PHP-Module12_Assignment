@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Trip</h1>

        <!-- Display the form to create a new trip -->
        <form method="POST" action="{{ route('trips.store') }}">
            @csrf
            <div class="form-group">
                <label for="trip_name">Trip Name:</label>
                <input type="text" name="trip_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="trip_date">Trip Date:</label>
                <input type="date" name="trip_date" class="form-control" required>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-success">Create Trip</button>
        </form>
    </div>
@endsection
