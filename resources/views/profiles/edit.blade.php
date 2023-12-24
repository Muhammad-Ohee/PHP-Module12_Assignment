@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        <!-- Display the form to edit the user's profile -->
        <form method="POST" action="{{ route('profiles.update', $user->profile) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <!-- Add other profile fields as needed -->

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
