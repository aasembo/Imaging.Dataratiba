<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */
return [
    'App' => [
        'fullBaseUrl' => env('APP_FULL_BASE_URL', 'https://demo.imaging.dataratiba.com'),
    ],
    'Auth' => [
        'driver' => env('AUTH_DRIVER', 'okta'),
    ],
    'Okta' => [
        'issuer' => env('OKTA_ISSUER', env('OKTA_DOMAIN', 'https://integrator-1025653.okta.com/oauth2')),
        'clientId' => env('OKTA_CLIENT_ID', '0oav7djsidSNarREk697'),
        'clientSecret' => env('OKTA_CLIENT_SECRET', 'PEDe20l1aDPAJgqCcG78SiEHfMxX5GVbJvAUl4F6H2xB71hShw9qj59OEGPT2Qcl'),
        'redirectUri' => env('OKTA_REDIRECT_URI', 'https://demo.imaging.dataratiba.com/auth/callback/'),
        'postLogoutRedirectUri' => env('OKTA_POST_LOGOUT_REDIRECT_URI', 'https://demo.imaging.dataratiba.com/logout/complete'),
        'scopes' => env('OKTA_SCOPES', 'openid profile email'),
        'usePkce' => env('OKTA_USE_PKCE', '1'),
    ],
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => true,

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', '335dedc80b4fd99184ceccb461c4d5913c50930b3c0088ea5f620bee15db89d9'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'host' => '127.0.0.1',
            /*
             * CakePHP will use the default DB port based on the driver selected
             * MySQL on MAMP uses port 8889, MAMP users will want to uncomment
             * the following line and set the port accordingly
             */
            //'port' => 'non_standard_port_number',

            'username' => 'root',
            'password' => '',

            'database' => 'DemoImaging',
            /*
             * If not using the default 'public' schema with the PostgreSQL driver
             * set it here.
             */
            //'schema' => 'myapp',

            /*
             * You can use a DSN string to set the entire configuration
             */
            'url' => env('DATABASE_URL', null),
        ],

        /*
         * The test connection is used during the test suite.
         */
        'test' => [
            'host' => 'localhost',
            //'port' => 'non_standard_port_number',
            'username' => 'my_app',
            'password' => 'secret',
            'database' => 'test_myapp',
            //'schema' => 'myapp',
            'url' => env('DATABASE_TEST_URL', 'sqlite://127.0.0.1/tmp/tests.sqlite'),
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],


    'Error' => [
        'errorLevel' => E_ALL & ~E_USER_DEPRECATED & ~E_DEPRECATED,
        'exceptionRenderer' => \Cake\Error\Renderer\WebExceptionRenderer::class,
        'ignoredDeprecationPaths' => [
            'vendor/cakephp/cakephp/src/ORM/Table.php',
            'vendor/cakephp/cakephp/src/Core/functions.php',
            'vendor/cakephp/cakephp/src/Http/ResponseEmitter.php',
            'vendor/cakephp/cakephp/src/Cache/Engine/FileEngine.php',
            realpath('vendor/cakephp/cakephp/src/ORM/Table.php'),
        ],
    ],
];
