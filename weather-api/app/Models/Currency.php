<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    public const CODE = 'code';
    public const ISO_CODE = 'iso_code';

    protected $fillable = [
        self::CODE,
        self::ISO_CODE,
    ];
}
