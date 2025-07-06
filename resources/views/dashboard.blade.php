{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome to NOMAD, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- My Trips Card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">My Trips</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">View and manage your upcoming trips and bookings.</p>
                    <a href="{{ route('trips.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">View Trips</a>
                </div>

                <!-- Saved Destinations Card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Saved Destinations</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Access your favorite travel spots anytime.</p>
                    <a href="{{ route('destinations.saved') }}" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">View Saved</a>
                </div>

                <!-- Book New Trip -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white">Book a Trip</h3>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Start a new adventure and explore the world.</p>
                    <a href="{{ route('trips.create') }}" class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Book Now</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
