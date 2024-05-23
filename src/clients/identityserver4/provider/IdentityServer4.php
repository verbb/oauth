<?php
namespace verbb\auth\clients\identityserver4\provider;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

use Psr\Http\Message\ResponseInterface;

use verbb\auth\clients\auth0\provider\Auth0;

class IdentityServer4 extends Auth0
{
    public function getBaseAccessTokenUrl(array $params = [])
    {
        return $this->baseUrl() . '/token';
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if (is_array($data) && isset($data['error'])) {
            throw new IdentityProviderException(
                (isset($data['error']['message']) ? $data['error']['message'] : $response->getReasonPhrase()),
                $response->getStatusCode(),
                $response
            );
        }
    }
}