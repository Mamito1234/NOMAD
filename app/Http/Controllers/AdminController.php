<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trip;
use App\Models\SavedDestination;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show all users and their related data in the admin dashboard.
     */
    public function dashboard()
    {
        $users = User::with(['trips', 'savedDestinations'])->get();
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Promote a user to admin role.
     */
    public function promote(User $user)
    {
        $user->update(['role' => 'admin']);
        return redirect()->route('admin.dashboard')->with('success', $user->name . ' is now an admin.');
    }

    /**
     * Delete a user and their related data.
     */
    public function delete(User $user)
    {
        $user->trips()->delete();
        $user->savedDestinations()->delete();
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully.');
    }

    /**
     * Show a user's details (trips + destinations).
     */
    public function showUser(User $user)
    {
        $user->load(['trips', 'savedDestinations']);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Edit a user's trip.
     */
    public function editTrip(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    /**
     * Update a user's trip.
     */
    public function updateTrip(Request $request, Trip $trip)
    {
        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'notes' => 'nullable|string',
        ]);

        $trip->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Trip updated successfully.');
    }

    public function toggleRole(User $user)
{
    $user->role = $user->role === 'admin' ? 'user' : 'admin';
    $user->save();

    return redirect()->route('admin.dashboard')
        ->with('success', "{$user->name} role changed to {$user->role}.");
}

public function editUser(User $user)
{
    $user->load(['trips', 'savedDestinations']);
    return view('admin.users.edit', compact('user'));
}

public function updateUser(Request $request, User $user)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update($validated);

    return redirect()->route('admin.dashboard')->with('success', 'User info updated.');
}


    /**
     * (Optional) Edit and update a saved destination – you can add similar methods here.
     */
}
