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
     * DI through Setter Webservice. Here I use direct DI for demonstration purpose only. It is not part of AwindemoIoc
     *
     * @param ICurrencyWebservice $currencyWebservice
     */
    public function setWebservice(ICurrencyWebservice $currencyWebservice) {
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
