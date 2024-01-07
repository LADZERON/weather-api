<?php

namespace App\Http\Integrations\Currency\Requests;

use App\DTO\CurrencyExchanges\ExchangerDTO;
use App\Http\Integrations\Currency\Conectors\MonoBankConnector;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Request\HasConnector;

class PrivateRequest extends Request
{
    use HasConnector;

    protected Method $method = Method::GET;

    protected ?string $connector = MonoBankConnector::class;

    public function resolveEndpoint(): string
    {
        return '?exchange&coursid=12';
    }

    public function createDtoFromResponse(Response $response)
    {
        $data = $response->json();

        return array_map(function ($item) {
            return new ExchangerDTO(
                $item['ccy'] ?? null,
                $item['base_ccy'] ?? null,
                $item['buy'] ?? 0,
                $item['sale'] ?? 0,
            );
        }, $data);
    }
}
