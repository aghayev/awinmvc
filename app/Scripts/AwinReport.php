<?php

namespace App\Scripts;

use App\Models\Merchant;
use App\Models\Resources\TransactionTable;
use Lib\AScript;

/**
 * Class AwinReport
 *
 * @package App\Scripts
 */
class AwinReport extends AScript
{

    /**
     * AwinReport Constructor
     */
    public function __construct()
    {
        parent::__construct("m:");
    }

    /**
     * Concrete method run()
     */
    public function run()
    {

        try {
        if ($this->has('m')) {

            $merchant = new Merchant($this->get('m'));
            $merchant->setResource(new TransactionTable());
            $transactions = $merchant->getAll();

            var_dump($transactions);

        } else {
            throw new \Exception('No arguments specified');
            }
        }
        catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

