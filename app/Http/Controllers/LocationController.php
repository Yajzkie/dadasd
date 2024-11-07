<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.location', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'description' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'number_of_cots' => 'nullable|string',
            'size_of_cots' => 'nullable|string',
            'activity_type' => 'nullable|string',
            'observer_category' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->description = $request->description;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->number_of_cots = $request->number_of_cots;
        $location->size_of_cots = $request->size_of_cots;
        $location->activity_type = $request->activity_type;
        $location->observer_category = $request->observer_category;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $location->photo = $photoPath;
        }

        $location->save();

        return redirect()->route('admin.location')->with('success', 'Location saved successfully.');
    }

    public function destroy($id)
    {
        $location = Location::find($id);

        if ($location) {
            $location->delete();
            return response()->json(['message' => 'Location deleted successfully.']);
        } else {
            return response()->json(['message' => 'Location not found.'], 404);
        }
    }
}
