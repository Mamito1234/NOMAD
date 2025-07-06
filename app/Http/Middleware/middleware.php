<?php

use App\Http\Middleware\AdminOnly;

return [
    'web' => [
        // Default Laravel web middleware...
    ],

    'api' => [
        // Default Laravel API middleware...
    ],

    'aliases' => [
        'admin' => AdminOnly::class,
    ],
];
