<?php

use App\Helpers\CurrencyConstans;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('code', 3)->unique();
            $table->enum('iso_code', array_keys(CurrencyConstans::$currencyCodes))->unique();
            $table->timestamps();

            $table->index('code');
        });

        Schema::create('currency_exchanges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('currency_id')->index()->constrained('currencies');
            $table->foreignId('base_currency_id')->index()->constrained('currencies');
            $table->decimal('rate_buy', 10, 5);
            $table->decimal('rate_sell', 10, 5);
            $table->timestamps();

            $table->index(['currency_id', 'base_currency_id']);
            $table->unique(['currency_id', 'base_currency_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_exchanges');
        Schema::dropIfExists('currencies');

    }
};
