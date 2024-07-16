<?php
namespace verbb\auth\providers;

use verbb\auth\base\ProviderTrait;
use verbb\auth\clients\identityserver4\provider\IdentityServer4 as IdentityServer4Provider;
use verbb\auth\models\Token;

class IdentityServer4 extends IdentityServer4Provider
{
    // Traits
    // =========================================================================

    use ProviderTrait;


    // Public Methods
    // =========================================================================

    public function getBaseApiUrl(?Token $token): ?string
    {
        return $this->baseUrl();
    }
}