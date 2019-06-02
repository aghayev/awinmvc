<?php

use PHPUnit\Framework\TestCase;
use App\AwindemoIoc;

class EcbWebserviceTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        AwindemoIoc::init();
    }

    public function testExchange()
    {
        $ecb = \App\AwindemoIoc::make('ecbwebservice');
        $this->assertSame(1.0, $ecb->getExchangeRate('GBP'));
    }
}