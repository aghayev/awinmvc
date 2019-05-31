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
            return \App\Models\Resources\EcbWebservice::getInstance();
        });

        self::bind('currencyconverter', function() {
            return \App\Helpers\CurrencyConverter::getInstance(\App\AwindemoIoc::make('ecbwebservice'));
        });

        self::bind('yamldatacsv', function() {
            $confDir =  '/../config/';
            $conf = Yaml::parse(file_get_contents(__DIR__ . $confDir . 'awindemo.yaml'));
            return __DIR__  . $confDir .$conf['resources']['transaction_data_src'];
        });
    }
}