<?php

namespace App\Scripts;

use App\Models\Merchant;
use App\Models\Resources\TransactionCollection;
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
            $merchant->setResource(new TransactionCollection());
            $transactions = $merchant->getAll();

            foreach ($transactions as $transaction) {
                printf("%s;%s%.2f\n",$transaction->getDate(),'£',$transaction->getAmount());
            }
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

