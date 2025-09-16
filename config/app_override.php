<?php
return [
    'App' => [
        'fullBaseUrl' => 'https://your-domain.example.com',
        'authDriver' => 'local',
        'okta' => [
            'issuer' => 'https://your-okta-domain.okta.com/oauth2',
            'clientId' => 'YOUR_CLIENT_ID',
            'clientSecret' => 'YOUR_CLIENT_SECRET',
            'redirectUri' => 'https://your-domain.example.com/auth/callback/',
            'postLogoutRedirectUri' => 'https://your-domain.example.com/logout/complete',
            'scopes' => ['openid', 'profile', 'email'],
            'usePkce' => true,
        ],
    ],
];

