<?php

namespace App\Scripts;

use App\Models\Merchant;
use App\Models\Resources\TransactionTable;
use Lib\AScript;

/**
 * Class AwindemoReport
 *
 * @package App\Scripts
 */
class AwindemoReport extends AScript
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
            echo $this->usageHelp();
            }
        }
        catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * Usage Help
     */
    private function usageHelp()
    {
        return '
Usage:
    php index.php -m mechantId [1|2]

    Options:
        -m    Specify merchant identifier

';
    }
}

