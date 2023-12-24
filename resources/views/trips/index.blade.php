@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Trips</h1>

        <!-- Display a table of trips -->
        <table class="table">
            <thead>
                <tr>
                    <th>Trip Name</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                    <tr>
                        <td>{{ $trip->trip_name }}</td>
                        <td>{{ $trip->trip_date }}</td>
                        <td>
                            <a href="{{ route('trips.show', $trip) }}" class="btn btn-info">Details</a>
                            <a href="{{ route('trips.edit', $trip) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete functionality if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
