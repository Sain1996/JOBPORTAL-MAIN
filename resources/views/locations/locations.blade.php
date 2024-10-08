@extends('super.layout') <!-- Adjust this path according to your folder structure -->

@section('content')
<div class="main-content">
    <h1 class="text-center">Location Management</h1>

    <div class="form-container">
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="locationName">Location Name</label>
                <input type="text" class="form-control" id="locationName" name="name" required>
            </div>
            <div class="form-group">
                <label for="locationAddress">Location Address</label>
                <input type="text" class="form-control" id="locationAddress" name="address" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Location</button>
            </div>
        </form>
    </div>

    <div class="mt-5">
        <h2>Existing Locations</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $location->name }}</td>
                    <td>{{ $location->address }}</td>
                    <td>
                        <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
