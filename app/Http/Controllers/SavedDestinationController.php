<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavedDestination;
use Illuminate\Support\Facades\Auth;

class SavedDestinationController extends Controller
{
    public function index()
    {
        $saved = SavedDestination::where('user_id', Auth::id())->latest()->get();
        return view('destinations.saved', compact('saved'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        SavedDestination::create([
            'user_id' => Auth::id(),
            'country' => $request->country,
            'city' => $request->city,
        ]);

        return back()->with('success', 'Destination saved!');
    }

    public function update(Request $request, SavedDestination $destination)
    {
        // Only the owner or an admin can update
        if ($destination->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $request->validate([
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        $destination->update([
            'country' => $request->country,
            'city' => $request->city,
        ]);

        return back()->with('success', 'Destination updated.');
    }

    public function destroy(SavedDestination $destination)
    {
        if ($destination->user_id !== Auth::id() && !Auth::user()->isAdmin()) {
            abort(403);
        }

        $destination->delete();

        return back()->with('success', 'Destination deleted.');
    }
}
