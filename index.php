<?php
/**
 * Autoload with Composer
 */
require_once __DIR__.'/vendor/autoload.php';

use Gorkana\Calculator as Calculator;

/**
 * Run context aware calculator application
 */
$application = new Calculator\App();
$application->run();