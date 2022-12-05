<?php

namespace verbb\auth\providers\vend\grant;

use League\OAuth2\Client\Grant\AbstractGrant;

class VendExchangeToken extends AbstractGrant
{
    public function __toString()
    {
        return 'vend_exchange_token';
    }

    protected function getRequiredRequestParameters()
    {
        return [
            'vend_exchange_token',
        ];
    }

    protected function getName()
    {
        return 'vend_exchange_token';
    }
}
