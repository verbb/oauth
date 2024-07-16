<?php
namespace verbb\auth\providers;

use verbb\auth\base\ProviderTrait;
use verbb\auth\clients\fedex\provider\Fedex as FedexProvider;
use verbb\auth\models\Token;

class Fedex extends FedexProvider
{
    // Traits
    // =========================================================================

    use ProviderTrait;


    // Public Methods
    // =========================================================================

    public function getBaseApiUrl(?Token $token): ?string
    {
        return 'https://apis.fedex.com/';
    }

    public function getGrant(): string
    {
        return 'client_credentials';
    }
}