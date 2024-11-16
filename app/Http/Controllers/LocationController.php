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

    public function dashboard()
    {
        // Get the sum of number_of_cots by municipality
        $municipalityCots = Location::select('municipality', \DB::raw('sum(number_of_cots) as total_cots'))
                                    ->groupBy('municipality')
                                    ->get();
        
        // Calculate the total number of cots
        $totalCots = $municipalityCots->sum('total_cots');
        
        // Prepare data for the chart
        $municipalities = $municipalityCots->pluck('municipality');
        $totalCotsArray = $municipalityCots->pluck('total_cots');
        $percentages = $municipalityCots->map(function ($item) use ($totalCots) {
            return ($item->total_cots / $totalCots) * 100; // Calculate percentage
        });
        
        // Get the total number of users
        $userCount = \App\Models\User::count();
        
        // Pass $totalCots to the view
        return view('admin.index', compact('municipalities', 'totalCotsArray', 'percentages', 'userCount', 'totalCots'));
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
        $location->name = $request->name ?? null;
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

    // Method to generate the report
    public function report()
    {
        $locations = Location::paginate(10);  // Limit to 10 rows per page
        return view('admin.report', compact('locations'));
    }
}
