<?php
namespace Models\Resources;

use Models\Resources\CurrencyWebservice;
use Helpers\CurrencyConverter;
use Helpers\CsvHelper;

/**
 * Class TransactionTable
 * @package App
 *
 * Source of transactions, can read data.csv directly for simplicty sake, 
 * should behave like a database (read only)
 */
class TransactionTable extends Model
{
    private $collection = array();

    public function getAll() {

        $dataSource = \Config::get('awin.data_file_path');

        if ($dataSource == false) {
            throw new \Exception('Unable to find data_file_path');
        }

        $records = CsvHelper::loadData($dataSource);

        foreach ($records as $record) {
           $transactionRecord = new TransactionRecord();
           $transactionRecord->setRecord($record);
            $currencyConverter = new CurrencyConverter(new CurrencyWebservice());
            $newAmount = $currencyConverter->convert($transactionRecord->getAmount(), $transactionRecord->getCurrency());
            $transactionRecord->setAmount($newAmount);
            $transactionRecord->setCurrency($newAmount);
            $this->collection[] = $transactionRecord;
        }
        return $this->collection;
    }
}
