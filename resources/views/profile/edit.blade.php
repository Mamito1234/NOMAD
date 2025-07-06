<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- ✅ Profile Information --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- ✅ Update Password --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- ✅ Two-Factor Authentication --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl space-y-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">Two-Factor Authentication</h3>

                    @if (! auth()->user()->two_factor_secret)
                        <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Enable Two-Factor Authentication
                            </button>
                        </form>
                    @else
                        <p class="text-sm text-gray-600 dark:text-gray-300">Two-Factor Authentication is <strong>enabled</strong>.</p>

                        {{-- Show QR and Recovery Codes --}}
                        @if (session('status') === 'two-factor-authentication-enabled')
                            <div class="mt-4">
                                <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">
                                    Scan this QR code using your authenticator app:
                                </p>
                                <div>{!! auth()->user()->twoFactorQrCodeSvg() !!}</div>

                                <form method="POST" action="{{ url('/user/confirmed-two-factor-authentication') }}" class="mt-4">
                                    @csrf
                                    <label for="code" class="text-sm text-gray-700 dark:text-gray-300">Enter the 6-digit code</label>
                                    <input type="text" name="code" id="code" class="w-full mt-1 px-3 py-2 border rounded dark:bg-gray-700 dark:text-white" required>
                                    <button type="submit" class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Confirm 2FA</button>
                                </form>

                                <p class="text-sm text-gray-700 dark:text-gray-300 mt-4">
                                    Save these recovery codes in a secure place:
                                </p>
                                <ul class="text-sm text-gray-600 dark:text-gray-400 list-disc pl-6">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                                        <li>{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Disable 2FA --}}
                        <form method="POST" action="{{ url('/user/two-factor-authentication') }}" class="mt-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Disable Two-Factor Authentication
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            {{-- ✅ Delete Account --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
