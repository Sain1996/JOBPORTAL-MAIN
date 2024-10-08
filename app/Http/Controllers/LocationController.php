<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Location::create([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
        

       
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $id,
        ]);

        $location = Location::findOrFail($id);
        $location->update(['name' => $request->name]);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location removed successfully.');
    }
}
