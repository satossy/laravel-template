<?php
// slack channel configuration
return [
    'token' => env('SLACK_TOKEN','xoxb-xxxxxxxxxxxxxxxxxxxxxx'),
    'channel' => [
        'notice' => env('SLACK_CHANNEL_NOTICE', '#notice'),
    ],
];
