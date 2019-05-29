<?php

namespace App\Models;

use Lib\IResource;

/**
 * Class Merchant
 */
class Merchant
{
    /**
     * @var int|null
     */
    private $merchantId = null;

    /**
     * @var IResource
     */
    private $resource = null;

    /**
     * Assign MerchantId via Constuctor
     *
     * @param array $merchantId
     */
    public function __construct($merchantId) {
        $this->merchantId = $merchantId;
    }

    /**
     * Dependency Injection via setter method
     *
     * @param IResource $resource
     */
    public function setResource(IResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get All Transactions For MerchantId Only
     *
     * @return array
     */
    public function getAll() {
        $transactionRecords = $this->resource->load($this->merchantId);
        return $transactionRecords;
    }
}
