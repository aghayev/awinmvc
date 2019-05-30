<?php

use App\Models\Resources\EcbWebservice;
use PHPUnit\Framework\TestCase;

class EcbWebserviceTest extends TestCase
{
    public function testExchange()
    {
        $ecb = new EcbWebservice();
        $this->assertSame(1, $ecb->getExchangeRate('EUR'));
    }
}