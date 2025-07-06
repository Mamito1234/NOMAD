<x-app-layout>
    <div class="max-w-2xl mx-auto py-10 px-6 bg-white dark:bg-gray-800 shadow rounded">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Book a New Trip</h2>

        <form action="{{ route('trips.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Destination</label>
                <input type="text" name="destination" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Departure Date</label>
                <input type="date" name="departure_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Return Date</label>
                <input type="date" name="return_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                <textarea name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white"></textarea>
            </div>

            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Submit
            </button>
        </form>
    </div>
</x-app-layout>
