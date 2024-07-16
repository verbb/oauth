<?php
namespace verbb\auth\providers;

use verbb\auth\base\ProviderTrait;
use verbb\auth\clients\amazoncognito\provider\AmazonCognito as AmazonCognitoProvider;
use verbb\auth\models\Token;

class AmazonCognito extends AmazonCognitoProvider
{
    // Traits
    // =========================================================================

    use ProviderTrait;


    // Public Methods
    // =========================================================================

    public function getBaseApiUrl(?Token $token): ?string
    {
        return 'https://api.amazon.com/';
    }
}