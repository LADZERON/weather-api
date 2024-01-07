<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyExchange extends Model
{
    use HasFactory;

    public const CURRENCY_ID = 'currency_id';
    public const BASE_CURRENCY_ID = 'base_currency_id';
    public const RATE_BUY = 'rate_buy';
    public const RATE_SELL = 'rate_sell';

    protected $fillable = [
        self::CURRENCY_ID,
        self::BASE_CURRENCY_ID,
        self::RATE_BUY,
        self::RATE_SELL,
    ];
}
