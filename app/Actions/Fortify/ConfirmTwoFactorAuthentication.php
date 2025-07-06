<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\ConfirmTwoFactorAuthenticationResponse;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;

class ConfirmTwoFactorAuthentication
{
    public function __invoke($user, string $code, TwoFactorAuthenticationProvider $provider): ConfirmTwoFactorAuthenticationResponse
    {
        if ($provider->verify(decrypt($user->two_factor_secret), $code)) {
            $user->forceFill([
                'two_factor_confirmed_at' => now(),
            ])->save();

            return app(ConfirmTwoFactorAuthenticationResponse::class);
        }

        abort(403, 'Invalid two-factor authentication code.');
    }
}
