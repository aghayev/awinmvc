<?php

namespace App\Scripts;

use \Lib\AScript;

class Report extends AScript
{

public function run() {

//if ($this->has('m') || $this->has('merchant')) {
if ($this->has('m') || $this->has('merchant')) {
	echo 'here';
}
else {
	echo 'Show help';
}

//foreach ($merchant->getTransactions() as $transaction) {
//    
//}

 }

}

