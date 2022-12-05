<?php

namespace verbb\auth\providers\harvest\provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use GlobalVisionMedia\OAuth2\Client\Provider\Exception\HarvestIdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Harvest extends AbstractProvider {
    use BearerAuthorizationTrait;

    protected $userAgent;

    protected $accountId;


    /**
     * Api domain
     *
     * @var string
     */
    public $apiDomain = 'https://api.harvestapp.com';

    /**
     * Get authorization url to begin OAuth flow
     *
     * @return string
     */
    public function getBaseAuthorizationUrl() {
        return 'https://id.getharvest.com/oauth2/authorize';
    }

    /**
     * Get access token url to retrieve token
     *
     * @param  array $params
     *
     * @return string
     */
    public function getBaseAccessTokenUrl(array $params) {
        return 'https://id.getharvest.com/api/v2/oauth2/token';
    }

    /**
     * Get provider url to fetch user details
     *
     * @param  AccessToken $token
     *
     * @return string
     */
    public function getResourceOwnerDetailsUrl(AccessToken $token) {
        if ($this->domain === 'https://api.harvestapp.com') {
            return $this->apiDomain.'/account/who_am_i';
        }
        return $this->domain.'/account/who_am_i';
    }

    /**
     * Get the default scopes used by this provider.
     *
     * This should not be a complete list of all scopes, but the minimum
     * required for the provider user interface!
     *
     * @return array
     */ protected function getDefaultScopes() {
        return [];
    }

    
  /**
   * Returns the default headers used by this provider.
   *
   * @return array
   */
   protected function getDefaultHeaders($token = null) {

    return ['Harvest-Account-Id' => $this->accountId,
            'User-Agent'         => $this->userAgent ];
    }
    /**
     * Check a provider response for errors.
     *
     * @throws HarvestIdentityProviderException
     * @param  ResponseInterface $response
     * @param  string $data Parsed response data
     * @return void
     */
    protected function checkResponse(ResponseInterface $response, $data) {
        if ($response->getStatusCode() >= 400) {
            throw HarvestIdentityProviderException::clientException($response, $data);
        } elseif (isset($data['error'])) {
            throw HarvestIdentityProviderException::oauthException($response, $data);
        }
    }

    /**
     * Generate a user object from a successful user details request.
     *
     * @param array $response
     * @param AccessToken $token
     * @return League\OAuth2\Client\Provider\ResourceOwnerInterface
     */
    protected function createResourceOwner(array $response, AccessToken $token) {
        $user = new HarvestResourceOwner($response);

        return $user->setDomain($this->domain);
    }

    /**
     * Returns an authenticated PSR-7 request instance.
     *
     * @param  string $method
     * @param  string $url
     * @param  AccessToken|string $token
     * @param  array $options Any of "headers", "body", and "protocolVersion".
     * @return RequestInterface
     */
    public function getAuthenticatedRequest($method, $url, $token, array $options = []) {
        $options['headers'] = array('Content-Type' => 'application/json','Accept' => 'application/json');
        return $this->createRequest($method, $url, $token, $options);
    }
}
