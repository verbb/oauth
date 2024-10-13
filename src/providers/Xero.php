<?php
namespace verbb\auth\providers;

use verbb\auth\base\ProviderTrait;
use verbb\auth\clients\xero\provider\Xero as XeroProvider;

class Xero extends XeroProvider
{
    // Traits
    // =========================================================================

    use ProviderTrait;


    // Public Methods
    // =========================================================================

    public function getBaseApiUrl(): ?string
    {
        return 'https://api.xero.com/';
    }
}