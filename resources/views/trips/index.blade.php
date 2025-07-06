<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">My Trips</h2>

        @if($trips->count())
            <div class="space-y-6">
                @foreach($trips as $trip)
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                            {{ $trip->destination }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mt-1">
                            {{ \Carbon\Carbon::parse($trip->departure_date)->toFormattedDateString() }} →
                            {{ \Carbon\Carbon::parse($trip->return_date)->toFormattedDateString() }}
                        </p>
                        @if($trip->notes)
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                {{ $trip->notes }}
                            </p>
                        @endif
                        <p class="text-xs text-gray-400 mt-4">Booked on {{ $trip->created_at->format('M j, Y') }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 dark:text-gray-300">You haven't booked any trips yet.</p>
        @endif
    </div>
</x-app-layout>
