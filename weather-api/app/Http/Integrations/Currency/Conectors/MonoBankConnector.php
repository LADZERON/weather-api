<?php

namespace App\Http\Integrations\Currency\Conectors;

use Saloon\Http\Connector;

class MonoBankConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('integrations.currency.mono_bank.base_url');
    }
}
