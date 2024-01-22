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

    'endpoint' => env('SIMFONI_RETAIL_ENDPOINT', 'https://simfoni.tech'),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail Verify SSL
    |--------------------------------------------------------------------------
    |
    | Verify SSL certificates via API calls. We do not recommend disabling
    | this for security reasons. This should only be adjusted when developing
    | locally using a self-signed SSL certificate.
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

    'simfoni_api_token' => env('SIMFONI_API_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Simfoni Retail Bulk Order Limit
    |--------------------------------------------------------------------------
    |
    | The bulk order limit imposed by Simfoni Retail when placing bulk orders
    | due to the request size and dynamoDB restrictions.
    |
    */

    'bulk_limit' => (int) env('SIMFONI_RETAIL_BULK_LIMIT', 100),

];