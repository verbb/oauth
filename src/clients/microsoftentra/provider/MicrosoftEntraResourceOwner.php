<?php
namespace verbb\auth\clients\microsoftentra\provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;
use League\OAuth2\Client\Tool\ArrayAccessorTrait;

class MicrosoftEntraResourceOwner implements ResourceOwnerInterface
{
    use ArrayAccessorTrait;

    protected array $response = [];

    public function __construct(array $response = array())
    {
        $this->response = $response;
    }

    public function getId(): ?string
    {
        return $this->getValueByKey($this->response, 'id');
    }

    public function getFullName(): ?string
    {
        return $this->getValueByKey($this->response, 'displayName');
    }

    public function getFirstName(): ?string
    {
        return $this->getValueByKey($this->response, 'givenName');
    }

    public function getLastName(): ?string
    {
        return $this->getValueByKey($this->response, 'surname');
    }

    public function getEmail(): ?string
    {
        return $this->getValueByKey($this->response, 'mail');
    }

    public function getUpn(): ?string
    {
        return $this->getValueByKey($this->response, 'userPrincipalName');
    }

    public function getJobTitle(): ?string
    {
        return $this->getValueByKey($this->response, 'jobTitle');
    }

    public function getMobilePhone(): ?string
    {
        return $this->getValueByKey($this->response, 'mobilePhone');
    }
    
    public function getBusinessPhone(): ?string
    {
        return $this->getValueByKey($this->response, 'businessPhones.0');
    }

    public function toArray(): array
    {
        return $this->response;
    }
}
