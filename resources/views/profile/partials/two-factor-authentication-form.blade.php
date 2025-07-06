<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        Please confirm access to your account by entering the authentication code from your authenticator application or using one of your emergency recovery codes.
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="mb-4 text-sm text-red-600 dark:text-red-400">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf

        {{-- Code from authenticator app --}}
        <div class="mb-4">
            <label for="code" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Authentication Code</label>
            <input id="code" name="code" type="text" inputmode="numeric" autofocus autocomplete="one-time-code"
                   class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-800 dark:text-white" />
        </div>

        {{-- OR use recovery code --}}
        <div class="mb-4">
            <label for="recovery_code" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Or use a Recovery Code</label>
            <input id="recovery_code" name="recovery_code" type="text" autocomplete="one-time-code"
                   class="block mt-1 w-full rounded border-gray-300 dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Verify & Login
            </button>
        </div>
    </form>
</x-guest-layout>
