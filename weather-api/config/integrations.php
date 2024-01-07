<?php

return [
    'currency' => [

        'mono_bank' => [
            'base_url' => env('MONO_BANK_BASE_URL'),
            'api_key' => env('MONO_BANK_API_KEY'),
        ],

        'privat_bank' => [
            'base_url' => env('PRIVAT_BANK_BASE_URL'),
            'api_key' => env('PRIVAT_BANK_API_KEY'),
        ],

        'national_bank' => [
            'base_url' => env('NATIONAL_BANK_BASE_URL'),
            'api_key' => env('NATIONAL_BANK_API_KEY'),
        ],

        'default' => env('DEFAULT_EXCHANGER', 'mono_bank'),
    ],
];
