<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TripController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the user's trips.
     */
    public function index()
    {
        $trips = Trip::where('user_id', Auth::id())->latest()->get();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for booking a new trip.
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created trip in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'departure_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:departure_date',
            'notes' => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        Trip::create($validated);

        return redirect()->route('trips.index')->with('success', 'Trip booked successfully!');
    }

    public function edit(Trip $trip)
{
    $this->authorize('update', $trip);
    return view('trips.edit', compact('trip'));
}

public function update(Request $request, Trip $trip)
{
    $this->authorize('update', $trip);

    $validated = $request->validate([
        'destination' => 'required|string|max:255',
        'departure_date' => 'required|date|after_or_equal:today',
        'return_date' => 'required|date|after_or_equal:departure_date',
        'notes' => 'nullable|string',
    ]);

    $trip->update($validated);

    return redirect()->route('trips.index')->with('success', 'Trip updated successfully!');
}

public function destroy(Trip $trip)
{
    $this->authorize('delete', $trip);
    $trip->delete();

    return redirect()->route('trips.index')->with('success', 'Trip deleted.');
}

}
