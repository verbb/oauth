<?php
namespace verbb\auth\providers;

use verbb\auth\base\ProviderTrait;
use verbb\auth\clients\mixer\provider\Mixer as MixerProvider;
use verbb\auth\models\Token;

class Mixer extends MixerProvider
{
    // Traits
    // =========================================================================

    use ProviderTrait;


    // Public Methods
    // =========================================================================

    public function getBaseApiUrl(Token $token): ?string
    {
        return null;
    }
}