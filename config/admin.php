<?php

return [

    'verifyKey' => env('VERIFY_KEY', false),

    'lockScreen' => env('LOCK_SCREEN', false),

    'multipleLogin' => env('ADMIN_MULTIPLE_LOGIN', false),

    'authMode'  => env('AUTH_MODE', "session"),

    'locale'    =>  'zh-TW',

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
        'api' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
        'dinjApi' => [
            'driver' => 'session',
            'provider' => 'admin_users',
        ],
    ],

    'providers' => [
        'admin_users' => [
            'driver' => 'eloquent',
            'model' => Dinj\Admin\Models\Admin\Users::class,
        ],
    ],
];
