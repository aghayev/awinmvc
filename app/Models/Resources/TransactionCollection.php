<?php
namespace App\Models\Resources;

use App\Helpers\CsvHelper;

use Lib\IResource;

/**
 * Class TransactionCollection
 * @package App
 *
 * Source of transactions, can read data.csv directly for simplicty sake, 
 * should behave like a database (read only)
 */
class TransactionCollection implements IResource
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

        $dataSource = \App\AwindemoIoc::make('yamlconf')['resources']['transaction_data_src'];

        if ($dataSource == false) {
            throw new \Exception('Unable to find data_file_path');
        }

        $records = CsvHelper::loadData($dataSource);

        $currencyConverter = \App\AwindemoIoc::make('currencyconverter');
        if (!$currencyConverter) {
            throw new \Exception('Currency Converter not found');
        }

        foreach ($records as $record) {
           $transactionRecord = new TransactionRecord();
           $transactionRecord->loadRecord($record);

           if ($transactionRecord->getMerchantId() == $key) {
               $newAmount = $currencyConverter->exchange($transactionRecord->getAmount(), $transactionRecord->getCurrency());
               $transactionRecord->setAmount($newAmount);
               $transactionRecord->setCurrency($newAmount);
               $this->collection[] = $transactionRecord;
           }
        }

        return $this->collection;
    }
}
