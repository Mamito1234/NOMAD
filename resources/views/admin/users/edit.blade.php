<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Edit User: {{ $user->name }}</h2>

        {{-- Update user info --}}
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="mb-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Info
            </button>
        </form>

        {{-- User Trips --}}
        <h3 class="text-xl font-semibold text-gray-700 dark:text-white mt-8 mb-2">Trips</h3>
        <ul class="space-y-3">
            @forelse ($user->trips as $trip)
                <li class="bg-white dark:bg-gray-800 p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <strong class="text-gray-900 dark:text-white">{{ $trip->destination }}</strong><br>
                        <span class="text-sm text-gray-500">From {{ $trip->departure_date }} to {{ $trip->return_date }}</span>
                    </div>
                    <a href="{{ route('admin.trips.edit', $trip) }}"
                       class="text-blue-600 hover:underline text-sm">Edit Trip</a>
                </li>
            @empty
                <p class="text-gray-500 dark:text-gray-300">No trips found.</p>
            @endforelse
        </ul>

        {{-- Saved Destinations --}}
<h3 class="text-xl font-semibold text-gray-700 dark:text-white mt-10 mb-2">Saved Destinations</h3>

<ul class="space-y-3">
    @forelse ($user->savedDestinations as $destination)
        <li class="bg-white dark:bg-gray-800 p-4 rounded shadow">
            <form action="{{ route('destinations.update', $destination->id) }}" method="POST"
                  class="flex flex-col md:flex-row items-center justify-between gap-4">
                @csrf
                @method('PUT')

                <select name="country" class="w-full md:w-1/3 rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="Malaysia" {{ $destination->country === 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                    <option value="Japan" {{ $destination->country === 'Japan' ? 'selected' : '' }}>Japan</option>
                    <option value="France" {{ $destination->country === 'France' ? 'selected' : '' }}>France</option>
                </select>

                <input type="text" name="city" value="{{ $destination->city }}"
                       class="w-full md:w-1/3 rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>

                <button type="submit"
                        class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                    Save
                </button>
            </form>
        </li>
    @empty
        <p class="text-gray-500 dark:text-gray-300">No saved destinations.</p>
    @endforelse
</ul>

    </div>
</x-app-layout>
