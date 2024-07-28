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
            'name' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->description = $request->description;
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $location->photo = $photoPath;
        }

        $location->save();

        return redirect()->route('locations.index');
    }
}