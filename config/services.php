<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1974138872816965',
        'client_secret' => '7c00b58dc9d3e5dfa4ac8147359b0fee',
        'redirect' => env('APP_URL') . '/login/callback/facebook',
    ],

    'google' => [
        'client_id' => '657181931320-75jtd27tejsbhjhff24rv3fi1t5bl6gv.apps.googleusercontent.com',
        'client_secret' => 'ZPuv4W3WGmu9Ba8d2xOXnYYX',
        'redirect' => env('APP_URL') . '/login/callback/google',
    ],

    'twitter' => [
        'client_id' => 'Csk6MCwWMuwhD6y4nMn1umSG6',
        'client_secret' => 'mELPtPR0GERS7LithLIzoYZXqLv5YnejB2kT1dQ510SKcxlzls',
        'redirect' => env('APP_URL') . '/login/callback/twitter',
    ],

];
