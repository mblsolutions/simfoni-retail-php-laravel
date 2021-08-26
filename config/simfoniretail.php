<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail API Endpoint
    |--------------------------------------------------------------------------
    |
    | The Simfoni Retail API endpoint
    |
    */

    'endpoint' => env('ID_ENDPOINT', 'https://development.simfoni.io'),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail Verify SSL
    |--------------------------------------------------------------------------
    |
    | Verify SSL certificates via API calls. We do not recommend disabling
    | this for security reasons. This should only be adjusted when developing
    | locally using a self signed SSL certificate.
    |
    */

    'verify_ssl' => env('ID_VERIFY_SSL', true),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail OAuth Client ID
    |--------------------------------------------------------------------------
    |
    | The OAuth Client ID for the application, the ID for your application
    | will be supplied by MBL Solutions.
    |
    */

    'client_id' => env('ID_CLIENT_ID', null),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail OAuth Secret
    |--------------------------------------------------------------------------
    |
    | The OAuth secret for the application, the secret for your application
    | will be supplied by MBL Solutions.
    |
    */

    'secret' => env('ID_SECRET', null),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Here you can specify the session cookie name used to identify the an
    | Simfoni Retail Authentication session instance.
    |
    */

    'session' => env('ID_SESSION', 'simfoniretail_auth_session'),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail
    |--------------------------------------------------------------------------
    |
    | The Simfoni Retail Roles that are allowed access to the application
    |
    */

    'roles' => [
        'admin',
        'programme_manager',
        'customer_service_manager',
        'customer_service_operator',
        'store_manager',
        'store_operator',
        'report',
    ]

];