<?php

namespace App\DTO\CurrencyExchanges;

class ExchangerDTO
{
    public function __construct(
        public readonly ?string $currencyCode,
        public readonly ?string $baseCurrencyCode,
        public readonly float $rateBuy,
        public readonly float $rateSell,
    ) {
    }
}
