<?php

namespace App\Jobs;

use App\DTO\CurrencyExchanges\ExchangerDTO;
use App\Models\CurrencyExchange;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class FillExchangesInTable implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public ExchangerDTO $exchanger)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $currencyCode = Cache::get('currencyCode_' . $this->exchanger->currencyCode);
        $baseCurrencyCode = Cache::get('baseCurrencyCode_' . $this->exchanger->baseCurrencyCode);

        CurrencyExchange::upsert([
            CurrencyExchange::CURRENCY_ID => $currencyCode,
            CurrencyExchange::BASE_CURRENCY_ID => $baseCurrencyCode,
            CurrencyExchange::RATE_BUY => $this->exchanger->rateBuy,
            CurrencyExchange::RATE_SELL => $this->exchanger->rateSell,
        ], [
            CurrencyExchange::CURRENCY_ID,
            CurrencyExchange::BASE_CURRENCY_ID,
        ]);
    }
}
