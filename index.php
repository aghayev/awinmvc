<?php

require __DIR__ . '/vendor/autoload.php';

// init Awin app

use App\Scripts\Report;

$report = new Report();
echo $report->run();


