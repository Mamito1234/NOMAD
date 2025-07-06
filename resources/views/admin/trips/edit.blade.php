<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Edit Trip</h2>

        <form method="POST" action="{{ route('admin.trips.update', $trip) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-gray-300">Destination</label>
                <input type="text" name="destination" value="{{ old('destination', $trip->destination) }}"
                       class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-gray-300">Departure Date</label>
                <input type="date" name="departure_date" value="{{ old('departure_date', $trip->departure_date) }}"
                       class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-gray-300">Return Date</label>
                <input type="date" name="return_date" value="{{ old('return_date', $trip->return_date) }}"
                       class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 dark:text-gray-300">Notes</label>
                <textarea name="notes" rows="3"
                          class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:text-white">{{ old('notes', $trip->notes) }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update Trip
            </button>
        </form>
    </div>
</x-app-layout>
