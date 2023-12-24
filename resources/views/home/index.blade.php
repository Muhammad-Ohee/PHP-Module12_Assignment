@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Online Ticketing System</h1>

        <p>This is the home page of your online ticketing system. Customize this page according to your needs.</p>

        <a href="{{ route('trips.index') }}" class="btn btn-primary">View Trips</a>
    </div>
@endsection
