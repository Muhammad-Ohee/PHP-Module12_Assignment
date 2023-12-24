@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Location</h1>

        <!-- Display the form to create a new location -->
        <form method="POST" action="{{ route('locations.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Location Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <!-- Add other form fields as needed -->

            <button type="submit" class="btn btn-success">Create Location</button>
        </form>
    </div>
@endsection
