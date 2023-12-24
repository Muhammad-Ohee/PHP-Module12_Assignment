@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Trip Details: {{ $trip->trip_name }}</h1>

        <!-- Display details of the trip -->
        <p><strong>Trip Name:</strong> {{ $trip->trip_name }}</p>
        <p><strong>Trip Date:</strong> {{ $trip->trip_date }}</p>

        <!-- Add other details as needed -->

        <a href="{{ route('trips.index') }}" class="btn btn-info">Back to Trips</a>
    </div>
@endsection
