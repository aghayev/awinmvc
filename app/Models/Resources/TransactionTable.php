<?php
namespace App\Models\Resources;

use Symfony\Component\Yaml\Yaml;
use App\Models\Resources\TransactionRecord;
use App\Helpers\CsvHelper;
use App\Models\Resources\CurrencyWebservice;
use App\Helpers\CurrencyConverter;

use Lib\IResource;

/**
 * Class TransactionTable
 * @package App
 *
 * Source of transactions, can read data.csv directly for simplicty sake, 
 * should behave like a database (read only)
 */
class TransactionTable implements IResource
{
    /**
     * @var array
     */
    private $collection = [];

    /**
     * Concrete implementation of load() method
     *
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function load($key) {

        $conf = Yaml::parse(file_get_contents(__DIR__  . '/../../../config/awin.yaml'));
        $dataSource = __DIR__  . '/' .$conf['resources']['transaction_data_src'];

        if ($dataSource == false) {
            throw new \Exception('Unable to find data_file_path');
        }

        $records = CsvHelper::loadData($dataSource);

        foreach ($records as $record) {
           $transactionRecord = new TransactionRecord();
           $transactionRecord->loadRecord($record);

           if ($transactionRecord->getMerchantId() == $key) {
               $currencyConverter = new CurrencyConverter(new EcbWebservice());
               $newAmount = $currencyConverter->exchange($transactionRecord->getAmount(), $transactionRecord->getCurrency());
               $transactionRecord->setAmount($newAmount);
               $transactionRecord->setCurrency($newAmount);
               $this->collection[] = $transactionRecord;
           }
        }

        return $this->collection;
    }
}
