<?php

namespace App\Http\Integrations\Currency\Requests;

use App\DTO\CurrencyExchanges\ExchangerDTO;
use App\Helpers\CurrencyConstans;
use App\Http\Integrations\Currency\Conectors\MonoBankConnector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\HasConnector;

class MonoBankRequest extends Request
{
    use HasConnector;

    protected Method $method = Method::GET;

    protected ?string $connector = MonoBankConnector::class;

    public function resolveEndpoint(): string
    {
        return '/currency';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();

        return array_map(function ($item) {
            return new ExchangerDTO(
                CurrencyConstans::$currencyCodes[$item['currencyCodeA']] ?? null,
                CurrencyConstans::$currencyCodes[$item['currencyCodeB']] ?? null,
                $item['rateBuy'] ?? 0,
                $item['rateSell'] ?? 0,
            );
        }, $data);
    }
}
