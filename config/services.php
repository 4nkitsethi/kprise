<?php

/**
 * config/services.php — add these keys to your existing file
 *
 * External service URLs used throughout the theme.
 * Set the corresponding environment variables in your .env file.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | MyPass LMS External URLs
    |--------------------------------------------------------------------------
    */
    'demo_url'         => env('DEMO_URL',         'https://calendly.com/onlinesales-kprise/30min'),
    'lms_login_url'    => env('LMS_LOGIN_URL',    'https://mypasslms.us/login'),
    'lms_register_url' => env('LMS_REGISTER_URL', 'https://mypasslms.us/login#register'),
    'help_center_url'  => env('HELP_CENTER_URL',  'https://help.kprise.com/'),

    /*
    |--------------------------------------------------------------------------
    | Third-party integrations (add your own as needed)
    |--------------------------------------------------------------------------
    */
    'mailgun' => [
        'domain'   => env('MAILGUN_DOMAIN'),
        'secret'   => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme'   => 'https',
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel'              => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
