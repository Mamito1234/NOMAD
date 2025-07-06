<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Admin Dashboard</h2>

        @if(session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-700 dark:text-white">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
            <table class="min-w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Email</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Trips</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Destinations</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Role</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900 dark:text-white font-medium">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900 dark:text-white">{{ $user->trips->count() }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-900 dark:text-white">{{ $user->savedDestinations->count() }}</td>
                            <td class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                                {{ $user->role }}
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                {{-- @if($user->role !== 'admin')
                                    <form action="{{ route('admin.promote', $user) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button class="text-sm px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Make Admin</button>
                                    </form>
                                @endif --}}
                                <form action="{{ route('admin.toggleRole', $user) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button class="text-sm px-3 py-1 {{ $user->role === 'admin' ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-blue-600 hover:bg-blue-700' }} text-white rounded">
                                        {{ $user->role === 'admin' ? 'Make User' : 'Make Admin' }}
                                    </button>
                                </form>


                                <form action="{{ route('admin.delete', $user) }}" method="POST" class="inline" onsubmit="return confirm('Delete this user? This cannot be undone!')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                                </form>
                                <a href="{{ route('admin.users.edit', $user) }}"
   class="text-sm px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600 inline-block">
    Edit
</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
