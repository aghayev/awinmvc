<?php

namespace App\Models\Resources;

use App\Helpers\CsvHelper;

/**
 * Class TransactionRecord
 * @package App
 *
 * This class is Transaction Record Data Object. Does Active Record
 */
class TransactionRecord
{
    private $merchantId = null;
    private $date = null;
    private $currency;
    private $amount;

    /**
     * Setup Transaction Record
     */
    public function loadRecord($record) {
        if (!isset($record[0])) {
         throw new \Exception('Merchant Id is not present within record');
        }
        $this->merchantId = $record[0];
        $this->date = $record[1];
        $record[2] = CsvHelper::replaceCurrencySymbol($record[2]);
        $currencyParts = explode('_',$record[2]);
        $this->currency = $currencyParts[0];
        $this->amount = $currencyParts[1];
    }

    /**
     * Get Merchant Id
     *
     * @return int|null
     */
    public function getMerchantId() {
        return $this->merchantId;
    }

    /**
     * Get Date
     *
     * @return null
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Get Currency
     *
     * @return mixed
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Get Amount
     *
     * @return mixed
     */
    public function getAmount() {
        return $this->amount;
    }

    /**
     * Set Amount
     *
     * @param float $amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
    }

    /**
     * Set Currency
     *
     * @param string $currency
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
    }
}
