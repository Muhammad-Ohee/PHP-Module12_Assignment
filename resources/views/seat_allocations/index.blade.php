@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Seat Allocations</h1>

        <!-- Display a table of seat allocations -->
        <table class="table">
            <thead>
                <tr>
                    <th>Trip</th>
                    <th>User</th>
                    <th>Seat Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($seatAllocations as $allocation)
                    <tr>
                        <td>{{ $allocation->trip->trip_name }}</td>
                        <td>{{ $allocation->user->name }}</td>
                        <td>{{ $allocation->seat_number }}</td>
                        <td>
                            <!-- Add any additional actions or buttons as needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
