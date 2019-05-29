<?php

namespace App\Helpers;

use App\Models\Resources\CurrencyWebservice;

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter {

    /**
     * @var CurrencyWebservice|null
     */
    private $currencyWebservice = null;

    /**
     * CurrencyConverter constructor.
     *
     * @param CurrencyWebservice $currencyWebservice
     */
    public function __construct(CurrencyWebservice $currencyWebservice)
    {
        $this->currencyWebservice = $currencyWebservice;
    }

    /**
     * Exchange method
     *
     * @param int $amount
     * @param string $currency
     * @return float|int
     */
    public function exchange($amount, $currency)
    {
        $exchangeRate = $this->currencyWebservice->getExchangeRate($currency);
        return $amount/$exchangeRate;
    }
}
