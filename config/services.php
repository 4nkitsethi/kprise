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
    
    'trustedLogos' => [
                    ['src' => '/assets/images/logos/EducatorsRising.png', 'alt' => 'Educators Rising'],
                    ['src' => '/assets/images/logos/adopt.svg', 'alt' => 'Adopt AI'],
                    ['src' => '/assets/images/logos/Contrario.svg', 'alt' => 'Contrario'],
                    ['src' => '/assets/images/logos/DL-Logo.png', 'alt' => 'Development Logics'],
                    ['src' => '/assets/images/logos/equip_behavioral_health_logo.jpeg', 'alt' => 'Equip Behavioral Health'],
                    ['src' => '/assets/images/logos/Era.png', 'alt' => 'Era'],
                    ['src' => '/assets/images/logos/ifp.png', 'alt' => 'IFPO-MENASA'],
                    ['src' => '/assets/images/logos/Logo-happee-learning.png', 'alt' => 'Happee Learning'],
                    ['src' => '/assets/images/logos/OT_purple.svg', 'alt' => 'OT'],
                    ['src' => '/assets/images/logos/PBh.avif', 'alt' => 'PBH'],
                    ['src' => '/assets/images/logos/T howard.jpg', 'alt' => 'THF'],
                    ['src' => '/assets/images/logos/Toothce.png', 'alt' => 'Toothce'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-67.png?fit=199%2C100&amp;ssl=1', 'alt' => 'American Board'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-69.png?fit=197%2C100&amp;ssl=1', 'alt' => 'Youth for Understanding'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-65.png?fit=197%2C100&amp;ssl=1', 'alt' => 'Phi Delta Kappan'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-66.png?fit=198%2C100&amp;ssl=1', 'alt' => 'SBCA'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-68.png?fit=198%2C99&amp;ssl=1', 'alt' => 'PDK International'],
                    ['src' => 'https://i0.wp.com/kprise.com/wp-content/uploads/2024/10/image-72.png?fit=198%2C100&ssl=1', 'alt' => 'ICF'],
                    ['src' => 'https://educatorsrising.org/wp-content/uploads/2025/07/25_slogan.png', 'alt' => 'Educators Rising'],     
                ],

];
