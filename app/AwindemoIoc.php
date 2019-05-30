<?php

namespace App;

use Lib\AIoc;
use Symfony\Component\Yaml\Yaml;

/**
 * Class Awindemo Inversion of Control (IoC)
 *
 * @package App
 */
class AwindemoIoc extends AIoc
{

    /**
     * Init Awindemo container configuration
     */
    public static function init()
    {
        self::bind('ecbwebservice', function() {
            return new \App\Models\Resources\EcbWebservice();
        });

        self::bind('currencyconverter', function() {
            return new \App\Helpers\CurrencyConverter(\App\AwindemoIoc::make('ecbwebservice'));
        });

        self::bind('yamldatacsv', function() {
            $conf = Yaml::parse(file_get_contents(__DIR__  . '/../config/awin.yaml'));
            return __DIR__  . '/../config/' .$conf['resources']['transaction_data_src'];
        });
    }
}