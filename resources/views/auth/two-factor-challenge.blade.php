<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Please confirm access to your account by entering the authentication code from your authenticator application.
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf

        <div>
            <label for="code" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Authentication Code</label>
            <input id="code" class="block mt-1 w-full dark:bg-gray-800 dark:text-white" type="text" name="code" autofocus autocomplete="one-time-code" />
        </div>

        <div class="mt-4">
            <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Login
            </button>
        </div>
    </form>
</x-guest-layout>
