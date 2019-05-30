<?php

namespace Lib;

/**
 * Interface ICurrencyWebservice
 *
 * @package Lib
 */
interface ICurrencyWebservice
{
    /**
     * Abstract method getExhangeRate($currency), needs impl. in concrete classes
     */
    public function getExchangeRate($currency);
}