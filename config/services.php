<?php

return [

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

    'unidades' => [ 'base_uri' => env('UNIDADES_SERVICE_BASE_URL'), ],
    'sedes' => [ 'base_uri' => env('SEDES_SERVICE_BASE_URL'), ],
    'postulantes' => [ 'base_uri' => env('POSTULANTES_SERVICE_BASE_URL'), ],
    'convocatorias' => [ 'base_uri' => env('CONVOCATORIAS_SERVICE_BASE_URL'), ],
    'vacantes' => [ 'base_uri' => env('VACANTES_SERVICE_BASE_URL'), ],
    'institucionorigen' => [ 'base_uri' => env('INSTITUCIONORIGEN_SERVICE_BASE_URL'), ],

];
