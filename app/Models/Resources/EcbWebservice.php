<?php

namespace App\Models\Resources;

use Lib\AObjectSingleton;
use Lib\ICurrencyService;
use Lib\ICurrencyWebservice;

/**
 * ECB Web service returning latest exchange rate taken from European Central Bank public API
 *
 * Demonstration of using xpath query
 *
 */
class EcbWebservice extends AObjectSingleton implements ICurrencyWebservice
{

    /**
     * Base ECB Currency
     *
     * @var string
     */
    public $ecbBaseCurrency = "EUR";

    /**
     * Base Awin GBP Rate
     *
     * @var string
     */
    public $awinBaseRate = 0;

    /**
     * Xml object container
     *
     * @var null
     */
    public $sxe = null;

    /**
     * EcbWebservice constructor
     */
    public function init()
    {
        $xml = file_get_contents(\App\AwindemoIoc::make('yamlconf')['resources']['currency_service_url']);

        $this->sxe = new \SimpleXMLElement($xml);

        if (!$this->sxe) {
            throw new My_Exception('Unable to initialize '.__CLASS__);
        }

        $namespaces = $this->sxe->getDocNamespaces();

        $this->sxe->registerXPathNamespace("ecb", $namespaces['']);

        $gbpRate = $this->sxe->xpath("//ecb:Cube[@currency='GBP']/@rate");

        $this->awinBaseRate = (float) $gbpRate[0];
    }

    /**
     * Get ECB exchange rate
     *
     * @param string $currency
     * @return float|null
     */
    public function getExchangeRate($currency)
    {
        switch ($currency) {
            case $this->ecbBaseCurrency:
                return 1 / $this->awinBaseRate;
                break;
            default:
                $rate = $this->sxe->xpath("//ecb:Cube[@currency='".$currency."']/@rate");
                return (float) $rate[0] / $this->awinBaseRate;
        }
    }
}