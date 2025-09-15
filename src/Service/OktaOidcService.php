<?php
declare(strict_types=1);

namespace App\Service;

use Cake\Core\Configure;
use Cake\Http\ServerRequest;
use Cake\Utility\Hash;

class OktaOidcService
{
    private string $issuer;
    private string $clientId;
    private ?string $clientSecret;
    private string $redirectUri;
    private string $postLogoutRedirectUri;
    private array $scopes;

    public function __construct() {
        $this->issuer = (string)env('OKTA_ISSUER', (string)env('OKTA_DOMAIN', ''));
        $this->clientId = (string)env('OKTA_CLIENT_ID', '');
        $this->clientSecret = env('OKTA_CLIENT_SECRET') !== null ? (string)env('OKTA_CLIENT_SECRET') : null;
        $this->redirectUri = (string)env('OKTA_REDIRECT_URI', RouterUrl('/auth/callback'));
        $this->postLogoutRedirectUri = (string)env('OKTA_POST_LOGOUT_REDIRECT_URI', RouterUrl('/logout/complete'));
        $scopeEnv = (string)env('OKTA_SCOPES', 'openid profile email');
        $this->scopes = preg_split('/\s+/', trim($scopeEnv)) ?: ['openid', 'profile', 'email'];
    }

    public function isConfigured(): bool {
        return $this->issuer !== '' && $this->clientId !== '';
    }

    public function makeClient(): \Jumbojett\OpenIDConnectClient {
        if (!class_exists('Jumbojett\\OpenIDConnectClient')) {
            throw new \RuntimeException('OIDC library missing. Run: composer require jumbojett/openid-connect-php');
        }

        $issuer = rtrim($this->issuer, '/');
        $client = new \Jumbojett\OpenIDConnectClient($issuer, $this->clientId, $this->clientSecret ?? '');
        $client->setRedirectURL($this->redirectUri);

        if (filter_var(env('OKTA_USE_PKCE', '1'), FILTER_VALIDATE_BOOLEAN)) {
            $client->setCodeChallengeMethod('S256');
        }
        $client->setTokenEndpointAuthMethodsSupported(['client_secret_post']);
        $client->providerConfigParam([
            'authorization_endpoint' => $issuer . '/v1/authorize',
            'token_endpoint' => $issuer . '/v1/token',
            'jwks_uri' => $issuer . '/v1/keys',
            'userinfo_endpoint' => $issuer . '/v1/userinfo',
            'token_endpoint_auth_methods_supported' => ['client_secret_post'],
            'code_challenge_methods_supported' => ['S256', 'plain'],
        ]);

        $domainOnly = preg_replace('#/oauth2(/.*)?$#', '', $issuer);
        $client->setIssuerValidator(function (string $iss) use ($issuer, $domainOnly): bool {
            return $iss === $issuer || $iss === $domainOnly || rtrim($iss, '/') === rtrim($issuer, '/');
        });
        foreach ($this->scopes as $scope) {
            $client->addScope($scope);
        }
        return $client;
    }

    public function getAuthorizeUrl(): string {
        $authorizeEndpoint = rtrim($this->issuer, '/') . '/v1/authorize';
        $state = bin2hex(random_bytes(16));
        $nonce = bin2hex(random_bytes(16));

        //Store state/nonce for verification
        $_SESSION['okta_oidc_state'] = $state;
        $_SESSION['okta_oidc_nonce'] = $nonce;

        $params = [
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'code',
            'scope' => implode(' ', $this->scopes),
            'state' => $state,
            'nonce' => $nonce,
        ];

        return $authorizeEndpoint . '?' . http_build_query($params);
    }

    public function verifyState(?string $state): bool {
        return is_string($state) && isset($_SESSION['okta_oidc_state']) && hash_equals($_SESSION['okta_oidc_state'], $state);
    }

    public function buildLogoutUrl(?string $idToken): string {
        $logoutEndpoint = rtrim($this->issuer, '/') . '/v1/logout';
        $params = [
            'post_logout_redirect_uri' => $this->postLogoutRedirectUri,
        ];
        if ($idToken) {
            $params['id_token_hint'] = $idToken;
        }
        return $logoutEndpoint . '?' . http_build_query($params);
    }
}

//Helper to generate absolute URLs
if (!function_exists('RouterUrl')) {
    function RouterUrl(string $path): string {
        $path = '/' . ltrim($path, '/');
        $host = env('APP_FULL_BASE_URL') ?: (env('HTTP_HOST') ? ((env('HTTPS') ? 'https://' : 'http://') . env('HTTP_HOST')) : '');
        return $host ? rtrim($host, '/') . $path : $path;
    }
}