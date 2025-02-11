<?php

namespace verbb\auth\clients\slack\provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

/**
 * Class SlackResourceOwner
 *
 * @author Adam Paterson <hello@adampaterson.co.uk>
 *
 * @package AdamPaterson\OAuth2\Client\Provider
 */
class SlackResourceOwner implements ResourceOwnerInterface
{

    /**
     * @var array
     */
    protected array $response = [];

    /**
     * SlackResourceOwner constructor.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Return all of the owner details available as an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->response;
    }

    /**
     * Get user id
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->response['user']['id'] ?: null;
    }


    /**
     * Get user name
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->response['user']['name'] ?: null;
    }

    /**
     * Is user deleted?
     *
     * @return bool|null
     */
    public function isDeleted(): ?bool
    {
        return $this->response['user']['deleted'] ?: null;
    }

    /**
     * Get user color
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->response['user']['color'] ?: null;
    }

    /**
     * Get user profile
     *
     * @return string|null
     */
    public function getProfile(): ?string
    {
        return $this->response['user']['profile'] ?: null;
    }

    /**
     * Get user first name
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->response['user']['profile']['first_name'] ?: null;
    }

    /**
     * Get user last name
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->response['user']['profile']['last_name'] ?: null;
    }

    /**
     * Get user real name
     *
     * @return string|null
     */
    public function getRealName(): ?string
    {
        return $this->response['user']['profile']['real_name'] ?: null;
    }

    /**
     * Get user email
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->response['user']['profile']['email'] ?: null;
    }

    /**
     * Get Skype username
     *
     * @return string|null
     */
    public function getSkype(): ?string
    {
        return $this->response['user']['profile']['skype'] ?: null;
    }

    /**
     * Get phone number
     *
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->response['user']['profile']['phone'] ?: null;
    }

    /**
     * Get 24x24 image url
     *
     * @return string|null
     */
    public function getImage24(): ?string
    {
        return $this->response['user']['profile']['image_24'] ?: null;
    }

    /**
     * Get 32x32 image url
     *
     * @return string|null
     */
    public function getImage32(): ?string
    {
        return $this->response['user']['profile']['image_32'] ?: null;
    }

    /**
     * Get 48x48 image url
     *
     * @return string|null
     */
    public function getImage48(): ?string
    {
        return $this->response['user']['profile']['image_48'] ?: null;
    }

    /**
     * Get 72x72 image url
     *
     * @return string|null
     */
    public function getImage72(): ?string
    {
        return $this->response['user']['profile']['image_72'] ?: null;
    }

    /**
     * Get 192x192 image url
     *
     * @return string|null
     */
    public function getImage192(): ?string
    {
        return $this->response['user']['profile']['image_192'] ?: null;
    }

    /**
     * Is user admin?
     *
     * @return bool|null
     */
    public function isAdmin(): ?bool
    {
        return $this->response['user']['is_admin'] ?: null;
    }

    /**
     * Is user owner?
     *
     * @return string|null
     */
    public function isOwner(): ?string
    {
        return $this->response['user']['is_owner'] ?: null;
    }

    /**
     * Does user have 2FA enabled?
     *
     * @return bool|null
     */
    public function hasTwoFactorAuthentication(): ?bool
    {
        return $this->response['user']['has_2fa'] ?: null;
    }

    /**
     * Does user have files?
     *
     * @return bool|null
     */
    public function hasFiles(): ?bool
    {
        return $this->response['user']['has_files'] ?: null;
    }
}
