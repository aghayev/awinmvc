<?php

namespace App\Helpers;

use Lib\ICurrencyWebservice;

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
     * @param ICurrencyWebservice $currencyWebservice
     */
    public function __construct(ICurrencyWebservice $currencyWebservice)
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
