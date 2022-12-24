<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'midtrans' => [
        "serverKey" => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-U6cgpaJaFxL0XJxm5xyrP8UD'),
        "clientKey" => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-3f9qVKrA9FXrrE46'),
        "isProduction" => env('ISPRODUCTION', false),
        "isSanitized" => env("ISSANITIZED", true),
        "is3ds" => env("IS3DS", true)
    ]

];
