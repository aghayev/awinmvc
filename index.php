<?php

require __DIR__ . '/vendor/autoload.php';

App\AwindemoIoc::init();

$report = new App\Scripts\AwindemoReport();
echo $report->run();

