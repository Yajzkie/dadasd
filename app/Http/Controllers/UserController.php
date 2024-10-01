<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display the user creation form
    public function create()
    {
        return view('users.create'); // Create a view for the user creation form
    }

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirect to users list or any other page
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function index()
{
    $users = User::all(); // Fetch all users
    return view('users.index', compact('users')); // Return the view with users data
}

public function destroy($id)
{
    // Find the user by ID and delete
    $user = User::findOrFail($id);
    $user->delete();

    // Redirect back with a success message
    return redirect()->route('users.index')->with('success', 'User deleted successfully.');
}

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('users.index')->with('success', 'User updated successfully.');
}


}
