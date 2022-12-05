<?php

namespace verbb\auth\providers\tumblr\provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class TumblrUser implements ResourceOwnerInterface
{
    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    public function getId()
    {
        return $this->response['user']['id'];
    }

    /**
     * Get perferred first name.
     *
     * @return string
     */
    public function getNickname()
    {
        return $this->response['user']['name'];
    }

    /**
     * Get email address.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->response['user']['email'];
    }

    /**
     * Get user data as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->response;
    }
}
