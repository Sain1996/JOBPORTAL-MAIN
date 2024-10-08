@extends('super.layout') <!-- Reference to your base layout -->

@section('content')
<div class="main-content">
    <div class="container mt-5">
        <h1>Locations</h1>

        <!-- Display success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Location Form -->
        <div class="form-container">
            <form action="{{ route('locations.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Location Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter location name" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <h2 class="mt-5">Existing Locations</h2>
        <ul class="list-group mt-3">
            @foreach($locations as $location)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $location->name }}
                    <div>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
