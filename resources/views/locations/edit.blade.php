@extends('super.layout') <!-- Adjust according to your layout file -->

@section('content')
<div class="main-content">
    <h1 class="text-center">Edit Location</h1>

    <div class="form-container">
        <form action="{{ route('locations.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="locationName">Location Name</label>
                <input type="text" class="form-control" id="locationName" name="name" value="{{ $location->name }}" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Location</button>
            </div>
        </form>
    </div>
</div>
@endsection
