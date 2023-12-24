@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Locations</h1>

        <!-- Display a table of locations -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->name }}</td>
                        <td>
                            <a href="{{ route('locations.edit', $location) }}" class="btn btn-primary">Edit</a>
                            <!-- Add delete functionality if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
