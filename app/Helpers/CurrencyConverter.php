<?php

namespace Helpers;

use Models\Resources\CurrencyWebservice;

/**
 * Uses CurrencyWebservice
 *
 */
class CurrencyConverter {

    private $currencyWebservice = null;

    public function __construct(CurrencyWebservice $currencyWebservice) 
    {
        $this->currencyWebservice = $currencyWebservice;
    }

    public function convert($amount, $currency)
    {
        $exchangeRate = $this->currencyWebservice->getExchangeRate($currency);
        return $amount/$exchangeRate;
    }
}
