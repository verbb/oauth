<?php
namespace verbb\auth\clients\microsoftentra\provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class MicrosoftEntra extends AbstractProvider
{
    use BearerAuthorizationTrait;

    public string $tenant = 'common';

    public function baseUrl(): string
    {
        return 'https://login.microsoftonline.com/' . $this->tenant;
    }

    public function getBaseAuthorizationUrl(): string
    {
        return $this->baseUrl() . '/oauth2/v2.0/authorize';
    }

    public function getBaseAccessTokenUrl(array $params): string
    {
        return $this->baseUrl() . '/oauth2/v2.0/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token): string
    {
        return 'https://graph.microsoft.com/v1.0/me';
    }

    protected function getDefaultScopes(): array
    {
        return ['User.Read'];
    }

    protected function getScopeSeparator(): string
    {
        return ' ';
    }

    protected function checkResponse(ResponseInterface $response, $data): void
    {
        if (isset($data['error'])) {
            $statusCode = $response->getStatusCode();
            $error = $data['error'];
            $errorDescription = $data['error_description'];
            $errorLink = ($data['error_uri'] ?? false);
            
            throw new IdentityProviderException(
                $statusCode . ' - ' . $errorDescription . ': ' . $error . ($errorLink ? ' (see: ' . $errorLink . ')' : ''),
                $response->getStatusCode(),
                $response
            );
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token): MicrosoftEntraResourceOwner
    {
        return new MicrosoftEntraResourceOwner($response);
    }

    protected function getAccessTokenRequest(array $params): RequestInterface
    {
        $request = parent::getAccessTokenRequest($params);
        $uri = $request->getUri()->withUserInfo($this->clientId, $this->clientSecret);

        return $request->withUri($uri);
    }
}
