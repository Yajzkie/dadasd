<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLocation; // Adjust this if you have a specific model for locations
use App\Models\Location; // Add this line
use Illuminate\Support\Facades\Auth;

class UserLocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('user.index', compact('locations'));
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
            'municipality' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'date_of_sighting' => 'nullable|date', // Validation for date
            'time_of_sighting' => 'nullable|date_format:H:i', // Validation for time
        ]);
        

        $location = new Location();
        $location->name = $request->name ?? null;
        $location->description = $request->description;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->number_of_cots = $request->number_of_cots;
        $location->size_of_cots = $request->size_of_cots;
        $location->activity_type = $request->activity_type;
        $location->observer_category = $request->observer_category;
        $location->municipality = $request->municipality;
        $location->date_of_sighting = $request->date_of_sighting; // Adding date
        $location->time_of_sighting = $request->time_of_sighting; // Adding time
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $location->photo = $photoPath;
        }
        
        $location->save();
        

        return redirect()->route('user.index');
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
