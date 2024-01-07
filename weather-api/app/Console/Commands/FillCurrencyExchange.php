<?php

namespace App\Console\Commands;

use App\Jobs\FillExchangesInTable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Saloon\Http\Request;

class FillCurrencyExchange extends Command
{
    private const CACHE_TIME = 3600;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-exchanges';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Request $Saloonrequest): void
    {

        try {
            $response = $Saloonrequest->send();
            foreach ($response->dtoOrFail() as $item) {

                $currencyCode = Cache::remember('currencyCode_' . $item->currencyCode, self::CACHE_TIME, function () use ($item) {
                    return DB::table('currencies')->where('code', $item->currencyCode)->value('id');
                });

                $baseCurrencyCode = Cache::remember('baseCurrencyCode_' . $item->baseCurrencyCode, self::CACHE_TIME, function () use ($item) {
                    return DB::table('currencies')->where('code', $item->baseCurrencyCode)->value('id');
                });

                if ($currencyCode && $baseCurrencyCode) {
                    FillExchangesInTable::dispatch($item);
                }
            }

        } catch (\Exception $exception) {
            $this->error($exception->getMessage());
        }

        Command::SUCCESS;
    }
}
