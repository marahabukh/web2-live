<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    */

    'paths' => [
        'api/*',
        'login',
        'register',
        'profile',
        'sanctum/csrf-cookie'
    ],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3000',
        'https://localhost:3000',
        'https://web2-frontend-one.vercel.app/',
        'https://web2-frontend-one.vercel.app',
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
