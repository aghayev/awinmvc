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

    /** TEMPORARY ADDED */

    /**
     * Singleton instance
     *
     * @var
     */
    private static $instance;

    /**
     * AObjectSingleton constructor. No access to it
     */
    private function __construct() {}
    private function __clone() {}

    /**
     * Using of static keyword
     *
     * @return static
     */
    public static function getInstance(ICurrencyWebservice $currencyWebservice) {

        if (empty(self::$instance)) {
            self::$instance = new static();
            self::$instance->currencyWebservice = $currencyWebservice;
        }

        return self::$instance;
    }

    /** TEMPORARY ADDED */

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
