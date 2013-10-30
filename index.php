<?php

require_once __DIR__.'/vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

date_default_timezone_set('UTC');
set_time_limit(0);

use Gorkana\Calculator as Calculator;

$application = new Calculator\App();
$application->run();