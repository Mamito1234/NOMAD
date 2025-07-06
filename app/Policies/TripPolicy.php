<?php

namespace App\Policies;

use App\Models\Trip;
use App\Models\User;

class TripPolicy
{
    /**
     * Allow viewing list of trips (optional).
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Allow viewing a specific trip only if it belongs to the user.
     */
    public function view(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    /**
     * Allow all users to create trips.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Allow only owner to update the trip.
     */
    public function update(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    /**
     * Allow only owner to delete the trip.
     */
    public function delete(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    /**
     * Optional: Allow restoring only if owned.
     */
    public function restore(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }

    /**
     * Optional: Allow force delete only if owned.
     */
    public function forceDelete(User $user, Trip $trip): bool
    {
        return $user->id === $trip->user_id;
    }
}
