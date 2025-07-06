<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Saved Destinations</h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 text-green-600 dark:text-green-400">{{ session('success') }}</div>
        @endif

        {{-- Save New Destination Form --}}
        <form method="POST" action="{{ route('destinations.save') }}" class="mb-6">
            @csrf
            <div class="flex flex-col md:flex-row gap-4">
                <select name="country" id="country" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="">Select Country</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Japan">Japan</option>
                    <option value="France">France</option>
                </select>

                <select name="city" id="city" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="">Select City</option>
                </select>

                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save Destination
                </button>
            </div>
        </form>

        {{-- Saved Destinations --}}
        @if($saved->count())
            <ul class="space-y-4">
                @foreach($saved as $destination)
                    <li class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                        {{-- Display destination --}}
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <span class="text-gray-800 dark:text-white font-semibold">
                                    {{ $destination->city }}, {{ $destination->country }}
                                </span>
                                <span class="text-sm text-gray-400 block">Saved on {{ $destination->created_at->format('M d, Y') }}</span>
                            </div>

                            {{-- Edit + Delete --}}
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('destinations.destroy', $destination->id) }}" onsubmit="return confirm('Delete this destination?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- Inline Edit --}}
                        <form method="POST" action="{{ route('destinations.update', $destination->id) }}" class="flex gap-4 mt-2">
                            @csrf
                            @method('PUT')

                            <select name="country" class="w-1/3 rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                                <option value="Malaysia" {{ $destination->country === 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                <option value="Japan" {{ $destination->country === 'Japan' ? 'selected' : '' }}>Japan</option>
                                <option value="France" {{ $destination->country === 'France' ? 'selected' : '' }}>France</option>
                            </select>

                            <input type="text" name="city" value="{{ $destination->city }}"
                                   class="w-1/3 rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>

                            <button type="submit"
                                    class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 text-sm">
                                Update
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600 dark:text-gray-300">You haven't saved any destinations yet.</p>
        @endif
    </div>

    {{-- Dynamic City Population Script --}}
    <script>
        const cityMap = {
            Malaysia: ["Kuala Lumpur", "Penang", "Johor Bahru"],
            Japan: ["Tokyo", "Osaka", "Kyoto"],
            France: ["Paris", "Lyon", "Nice"]
        };

        const countrySelect = document.getElementById('country');
        const citySelect = document.getElementById('city');

        countrySelect.addEventListener('change', function () {
            const selectedCountry = this.value;
            citySelect.innerHTML = '<option value="">Select City</option>';

            if (cityMap[selectedCountry]) {
                cityMap[selectedCountry].forEach(city => {
                    const option = document.createElement('option');
                    option.value = city;
                    option.text = city;
                    citySelect.appendChild(option);
                });
            }
        });
    </script>
</x-app-layout>
