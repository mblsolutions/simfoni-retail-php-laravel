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

    'endpoint' => env('SIMFONI_RETAIL_ENDPOINT', 'https://staging.simfoni.io'),

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

    'simfoni_api_token' => env('SIMFONI_API_TOKEN', null),


];