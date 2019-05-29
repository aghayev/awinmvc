<?php

require __DIR__ . '/vendor/autoload.php';

$report = new App\Scripts\AwinReport();
echo $report->run();

