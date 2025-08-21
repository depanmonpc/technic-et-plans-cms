<?php

return [

    'settings' => [
        App\Settings\GeneralSettings::class,
    ],

    'encrypted_keys' => [],

    'autoload_settings' => true,

    'cache' => [
        'enabled' => false,
        'store' => null,
    ],
];
